<?php

/**
 * Description of login.php
 * Esta funcion maneja todas la acciones correspondientes al manejo de 
 * los empleados, como son las Altas, Bajas, los cambios y las consultas
 * de estos.
 * 
 * @author Irwin Jhosafat
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empleado extends CI_Controller {

    var $lista_id_empleado_despedir;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('medoo');
        $this->load->model('empleado_model');
        $this->load->library('session');
        $this->load->helper('form');
    }

    /*
     * aquí mandamos llamar la vista html principal de los empleados, donde se 
     * muestra la tabla de los empleados asi como su busqueda.
     */

    public function index() {
        /*
         * validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /* si existe, lo colocamos dentro de un array y lo mandamos a la vista */
        $data['nombre_usuario'] = $this->session->userdata('nombre_de_usuario');


        /*
         * obtenemos los empleados que estan en la base de datos 
         * para mostrarlos en la tabla
         */
        $empleados = $this->empleado_model->obtener_empleados();

        /* guardamos los datos en el data de la vista */
        $data['empleados'] = $empleados;

        /* cargamos las vistas correspondiente */
        $this->load->view('empleado/encabezado_empleado');
        $this->load->view('comun/menu_superior', $data);
        $this->load->view('comun/menu');

        /* Esta es la vista que cambia el cuerpo de la pagina */
        $this->load->view('empleado/admin_empleado', $data);
        $this->load->view('empleado/pie_pagina'); //--> checar aqui 
    }

    /*
     * Funcion que se actualiza los datos en la BD y obtiene el ID del empleado de la lista
     * para mandarlo como parametro al modelo y actualizar la BD
     */

    function despedir_empleado() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /* obtemos el id del Empleado */
        $id_empleado = $_POST["idEmpleado"];

        /* obtenemos el motivo del empleado que fue despedido */
        $motivo_empleado = $_POST["motivoEmpleado"];

        /* modificamos los datos en la base de datos para el empleado */
        $result = $this->empleado_model->despedir_empleado($id_empleado, $motivo_empleado);

        echo $result;
    }

    /*
     * Funcion que valida los datos para ingresarlos a la base de datos,
     * como el archivo de la imagen  de la foto del empleado.
     */

    function alta_empleado() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }


        /* validamos el archivo de la foto de empleado que corresponda a un 
         * archivo de imagen, antes de subirlo
         */

        /* mensaje que se muestra si la imagen no pasa las pruebas */
        $msg = "";

        $archivo_subido = true;

        /* obtenemos el archivo que viene del post */
        $tamaño_archivo = $_FILES['archivo_imagen']['size'];

        /* Validamos el tamaño del la imagen */
        if ($tamaño_archivo > 200000) {
            $msg = $msg . "El archivo es mayor que 200KB, debes reducirlo antes de subirlo";
            $archivo_subido = false;
        }

        /* Validamos el tipo de archivo, que sea JPG o PNG */
        if (!($_FILES['archivo_imagen']['type'] == "image/jpeg" OR $_FILES['archivo_imagen']['type'] == "image/png")) {
            $msg = $msg . " Tu archivo tiene que ser JPG o PNG. Otros archivos no son permitidos";
            $archivo_subido = false;
        }


        $file_name = $_POST['num_empleado'] . "-" . $_FILES['archivo_imagen']['name'];
        /* direccion para mover el archivo al servidor */
        $url_imagen = "./resources/img/employes/$file_name";
        /* Direccion que se guarda en la base de datos */
        $url_imagen_db = "/fg.com.mxCI/resources/img/employes/$file_name";


        if ($archivo_subido == true) {
            /* no hay errores en el formato y tamaño */
            if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $url_imagen)) {
                /* si se subio bien el archivo al servidor ahora insetamos el empleado con los datos que vienen el post */

                $this->empleado_model->insertar_empleado($_POST['num_empleado'], $_POST['rfc'], $_POST['nombre'], $_POST['ap_pat'], $_POST['ap_mat'], $_POST['edad'], $_POST['calle'], $_POST['num_int'], $_POST['num_ext'], $_POST['col'], $_POST['municipio'], $_POST['estado'], $_POST['puesto'], $_POST['sucursal'], $_POST['horario'], $url_imagen_db);
                //--> checar aqui la validacion del modelo que se ingreso correctamente

                /* cargamos las vistas correspondiente */
                $this->load->view('empleado/encabezado_empleado');
                $this->load->view('comun/menu_superior');
                $this->load->view('comun/menu');

                /* Esta es la vista que cambia el cuerpo de la pagina */
                $this->load->view('empleado/agregar_empleado_correcto');
                $this->load->view('empleado/pie_pagina');
            } else {
                echo "<h1>Un error Ocurrio al subir la foto del empleado<h2>";
            }
        } else {
            echo "<h1>El siguiente error ocurrio con la foto del empleado<h1><br><br><br><h2>" . $msg . "</h2>";
        }
    }

    /*
     * funcion que actualiza los datos del empleado, validando los datos en la base
     * de datos. obtiene los datos del POST de la forma.
     * 
     */

    function actualizar_empleado() {

        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }


        /* variable que indica si el usuario cambio la imagen del empleado */
        if ($_POST['img_igual'] == "") {

            /* validamos el archivo de imagen antes de subirlo */
            $msg = "";
            $archivo_subido = true;

            /* validacion del tamaño */
            if ($_FILES['archivo_imagen']['size'] > 200000) {
                $msg = $msg . "El archivo es mayor que 200KB, debes reducirlo antes de subirlo";
                $archivo_subido = false;
            }

            /* validacion del tipo de imagen. Solo acepta JPG y PNG */
            if (!($_FILES['archivo_imagen']['type'] == "image/jpeg" OR $_FILES['archivo_imagen']['type'] == "image/png")) {
                $msg = $msg . " Tu archivo tiene que ser JPG o PNG. Otros archivos no son permitidos";
                $archivo_subido = false;
            }


            $file_name = $_POST['num_empleado'] . "-" . $_FILES['archivo_imagen']['name'];

            /* ruta para mover al servidor */
            $url_imagen = "./resources/img/employes/$file_name";

            /* ruta que se guarda en la base de datos */
            $url_imagen_db = "/fg.com.mxCI/resources/img/employes/$file_name";

            /* si se subio la imagen */
            if ($archivo_subido == true) {
                /* si el archivo se movio bien */
                if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $url_imagen)) {
                    /* actualizamos los datos del empleado en la base de datos */
                    $this->empleado_model->actualizar_empleado($_POST['num_empleado'], $_POST['rfc'], $_POST['nombre'], $_POST['ap_pat'], $_POST['ap_mat'], $_POST['edad'], $_POST['calle'], $_POST['num_int'], $_POST['num_ext'], $_POST['col'], $_POST['municipio'], $_POST['estado'], $_POST['puesto'], $_POST['sucursal'], $_POST['horario'], $url_imagen_db);


                    /* cargamos las vistas correspondiente */
                    $this->load->view('empleado/encabezado_empleado');
                    $this->load->view('comun/menu_superior');
                    $this->load->view('comun/menu');

                    /* Esta es la vista que cambia el cuerpo de la pagina */
                    $this->load->view('empleado/actualizar_empleado_correcto');
                    $this->load->view('empleado/pie_pagina');
                } else {
                    echo "Error al subir el archivo";
                }
            } else {
                echo $msg;
            }
            /* si no modifico el archivo de la imagen */
        } else {
            $this->empleado_model->actualizar_empleado($_POST['num_empleado'], $_POST['rfc'], $_POST['nombre'], $_POST['ap_pat'], $_POST['ap_mat'], $_POST['edad'], $_POST['calle'], $_POST['num_int'], $_POST['num_ext'], $_POST['col'], $_POST['municipio'], $_POST['estado'], $_POST['puesto'], $_POST['sucursal'], $_POST['horario'], $_POST['img_igual']);

            /* cargamos las vistas correspondiente */
            $this->load->view('empleado/encabezado_empleado');
            $this->load->view('comun/menu_superior');
            $this->load->view('comun/menu');

            /* Esta es la vista que cambia el cuerpo de la pagina */
            $this->load->view('empleado/actualizar_empleado_correcto');
            $this->load->view('empleado/pie_pagina');
        }
        
    }

//#################################################################################################################
//######################### Funciones para mostrar Pantallas ######################################################
//#################################################################################################################


    function mostrar_actualizar_empleado() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /* obtener los id's de los Empleados */
        $lista_empleados = $_POST["lstEmpleado"];


        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_empleado_actualizar = explode(",", $lista_empleados);

        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $empleado = $this->empleado_model->obtener_editar_datos_empleado($this->lista_id_empleado_actualizar[0]);

        //echo print_r($empleado);

        $data['datos_empleado'] = $empleado;


        /* vistas */
        /* obtenemos los datos predefinidos para mostrar en la pantalla */

        $data['arr_estado'] = $this->empleado_model->obtener_estados();
        $data['arr_puesto'] = $this->empleado_model->obtener_puestos();
        $data['arr_sucursal'] = $this->empleado_model->obtener_sucursales();
        $data['arr_horario'] = $this->empleado_model->obtener_horarios();
        $data['arr_municipio'] = $this->empleado_model->obtener_municipio($empleado[0]['estado_nombre']);


        /* cargamos las vistas correspondiente */
        $this->load->view('empleado/encabezado_empleado');
        $this->load->view('comun/menu_superior');
        $this->load->view('comun/menu');

        /* Esta es la vista que cambia el cuerpo de la pagina */
        $this->load->view('empleado/editar_empleado', $data);
        $this->load->view('empleado/pie_pagina');
    }

    /*
     * función que muestra el formulario para agregar un nuevo empleado a la 
     * base de datos
     */

    function mostrar_empleado_agregar() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /*
         * obtenemos los datos predefinidos para mostrar en los campos que son 
         * autollenados.
         */
        $data['arr_estado'] = $this->empleado_model->obtener_estados();
        $data['arr_puesto'] = $this->empleado_model->obtener_puestos();
        $data['arr_sucursal'] = $this->empleado_model->obtener_sucursales();
        $data['arr_horario'] = $this->empleado_model->obtener_horarios();
        //$data['mensaje_correcto']="";

        /* cargamos las vistas correspondiente */
        $this->load->view('empleado/encabezado_empleado');
        $this->load->view('comun/menu_superior'); //aqui va data
        $this->load->view('comun/menu');

        /* Esta es la vista que cambia el cuerpo de la pagina */
        $this->load->view('empleado/agregar_empleado', $data);
        $this->load->view('empleado/pie_pagina');
    }

    function mostrar_municipio() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }
        /* obtener el id's del Empleado */
        $estado_seleccionado = $_POST["estado"];


        $arr_municipio = $this->empleado_model->obtener_municipio($estado_seleccionado);

        $resp = "";
        if ($arr_municipio != null) {
            foreach ($arr_municipio as $municipio) {
                $resp = $resp . "<option>" . $municipio . "</option>";
            }
        }

        echo $resp;
    }

    /*
     * Funcion que valida y muestra los datos en el modal cuando se despide un empleado
     */

    function mostrar_empleado_despedir() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /* obtener los id's de los Empleados */
        $lista_empleados = $_POST["lstEmpleado"];

        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_empleado_despedir = explode(",", $lista_empleados);

        /* obtener los id's de los Empleados */
        $numero_empleado = $_POST["numEmpleado"];

        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $empleado = $this->empleado_model->obtener_datos_empleado($this->lista_id_empleado_despedir[$numero_empleado]);

        /* cargamos los datos que necesitamos para mostrar en el modal */
        $data['datos_empleado'] = $empleado;
        /*
         * maxEmpleado => Entero que guarda el total de los empleados.
         */
        $data['maxEmpledos'] = count($this->lista_id_empleado_despedir);
        //Index de la lista de los empleados que se esta obteniendo
        $data['numEmpleado'] = $numero_empleado;


        //cargamos la vista para el empleado
        $this->load->view('empleado/despedir_modal', $data);
    }

    /*
     * Esta función llena el modal incrustado en la vista para mostrar
     * los campos correspondientes para la seccion de despido.
     */

    function mostrar_despedir() {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
        if ($this->session->userdata('nombre_de_usuario') == FALSE) {
            redirect(base_url() . 'Index.php/');
        }

        /* obtener los id's de los Empleados */
        $lista_empleados = $_POST["lstEmpleado"];

        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_empleado_despedir = explode(",", $lista_empleados);

        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $empleado = $this->empleado_model->obtener_datos_empleado($this->lista_id_empleado_despedir[0]);

        //echo print_r($empleado);

        $data['datos_empleado'] = $empleado;
        $data['maxEmpledos'] = count($this->lista_id_empleado_despedir);
        $data['numEmpleado'] = 0;
        $this->load->view('empleado/despedir_modal', $data);
    }

}

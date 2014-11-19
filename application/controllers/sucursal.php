<?php

/**
 * Esta funcion maneja todas la acciones correspondientes al manejo de 
 * las sucursales, como son las Altas, Bajas, los cambios y las consultas
 * de estos.
 * 
 * @author Raúl  Preciado
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Sucursal extends CI_Controller {
    
    var $lista_id_sucursal_eliminar;
    function __construct() {
        parent::__construct();
          $this->load->helper('url');
        $this->load->library('medoo');
        $this->load->model('sucursal_model');
        $this->load->model('empleado_model');
        $this->load->library('session');
        $this->load->helper('form');
        
    }

    /*
     * aquí mandamos llamar la vista html principal de las sucursales, donde se 
     * muestra la tabla de los empleados asi como su busqueda.
     */
    public function index() {
         /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        /*si existe, lo colocamos dentro de un array y lo mandamos a la vista*/
        $data['nombre_usuario'] = $this->session->userdata('nombre_de_usuario');
        
        
        /*obtenemos las sucursales para mostrarlos en la tabla*/
        $sucursales = $this->sucursal_model->obtener_sucursal();
        
        $data['sucursales'] = $sucursales;

       /*cargamos las vistas correspondiente*/
        $this->load->view('sucursal/encabezado_sucursal');
        $this->load->view('comun/menu_superior',$data);
        $this->load->view('comun/menu');
        
        /*Esta es la vista que cambia el cuerpo de la pagina*/
       $this->load->view('sucursal/admin_sucursal',$data);        
       $this->load->view('sucursal/pie_pagina');
       
    }


    function mostrar_sucursal_agregar()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        /*obtenemos los datos predefinidos para mostrar en la pantalla. Cargamos los estados disponibles.*/
        $data['arr_estado'] = $this->empleado_model->obtener_estados();
        
        /*cargamos las vistas correspondiente*/
        $this->load->view('sucursal/encabezado_sucursal');
        $this->load->view('comun/menu_superior');//aqui va data
        $this->load->view('comun/menu');
        
        /*Esta es la vista que cambia el cuerpo de la pagina*/
        $this->load->view('sucursal/agregar_sucursal',$data);
        $this->load->view('sucursal/pie_pagina');

        
            
    }

    function alta_sucursal() {
     
        /*validamos el archivo antes de subirlo, archivo correspondiente a la imagen de la sucursal*/
        $msg="";
        $ext="";
        $archivo_subido = true;
        $tamaño_archivo = $_FILES['archivo_imagen']['size'];
        if ($tamaño_archivo > 200000) {
            $msg = $msg . "El archivo es mayor que 200KB, debes reducirlo antes de subirlo";
            $archivo_subido = false;
        }

        if (!($_FILES['archivo_imagen']['type'] == "image/jpeg" OR $_FILES['archivo_imagen']['type'] == "image/png")) {
            $msg = $msg . " Tu archivo tiene que ser JPG o PNG. Otros archivos no son permitidos";
            $archivo_subido = false;
        }

        switch ($_FILES['archivo_imagen']['type']) {
            case 'image/jpeg':
                $ext=".jpeg";
                break;
             case 'image/png':
                $ext=".png";
                break;
        }

        $file_name = $_POST['num_sucursal']."-sucursal".$ext;
        $url_imagen = "./resources/img/sucursales/$file_name";
        
        /*------------------------------------------------------------------------------------------*/
        /*Insertar nueva sucursal*/
        $mensaje= $this->sucursal_model->insertar_sucursal(
        $_POST['num_sucursal'], 
        $_POST['nombre'], 
        $_POST['num_empleados'], 
        $_POST['calle'], 
        $_POST['num_int'], 
        $_POST['num_ext'], 
        $_POST['col'], 
        $_POST['cp'],
        $_POST['municipio'], 
        $_POST['estado'], 
        $url_imagen);

        if ($archivo_subido == true) {

            if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $url_imagen)) {
             //   echo " Ha sido subido satisfactoriamente";
            } else {
                echo "Error al subir el archivo";
            }
        } else {
            echo $msg;
        }  

        header('Location:/fg.com.mxCI/Index.php/sucursal/');
     }

    function mostrar_eliminar()
    {
        /*validamos el archivo antes de subirlo, archivo correspondiente a la imagen de la sucursal*/
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de los Empleados */
        $lista_sucursales = $_POST["lstSucursal"];
        
        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_sucursal_eliminar = explode(",", $lista_sucursales);
        
        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $sucursal = $this->sucursal_model->obtener_datos_sucursal($this->lista_id_sucursal_eliminar[0]);
        
        //echo print_r($empleado);
        
        $data['datos_sucursal'] = $sucursal;
        $data['maxSucursales'] = count($this->lista_id_sucursal_eliminar);
        $data['numSucursal'] = 0;
        $this->load->view('sucursal/eliminar_modal',$data);
    }
    function eliminar_sucursal()
    {
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener el id's del Empleado */
        $id_sucursal = $_POST["idSucursal"];
        
        $result = $this->sucursal_model->eliminar_sucursal($id_sucursal);
        
       // echo print_r($result);
        echo $result;
    }
    
    function mostrar_sucursal_eliminar()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de los Empleados */
        $lista_sucursales = $_POST["lstSucursal"];
        
        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_sucursal_eliminar = explode(",", $lista_sucursales);
        
        /* obtener los id's de los Empleados */
        $numero_sucursal = $_POST["numSucursal"];
        
        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $sucursal = $this->sucursal_model->obtener_datos_sucursal($this->lista_id_sucursal_eliminar[$numero_sucursal]);
        
        //echo print_r($empleado);
        
        $data['datos_sucursal'] = $sucursal;
        $data['maxSucursales'] = count($this->lista_id_sucursal_eliminar);
        $data['numSucursal'] = $numero_sucursal;
        $this->load->view('sucursal/eliminar_modal',$data);
        
    }

    function mostrar_info()
    {
        
      if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de los Empleados */
        $lista_sucursales = $_POST["lstSucursal"];
        
        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_sucursal_eliminar = explode(",", $lista_sucursales);
        
        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $sucursal = $this->sucursal_model->obtener_datos_sucursal($this->lista_id_sucursal_eliminar[0]);
        
        //echo print_r($empleado);
        
        $data['datos_sucursal'] = $sucursal;
        $data['maxSucursales'] = count($this->lista_id_sucursal_eliminar);
        $data['numSucursal'] = 0;
        $this->load->view('sucursal/info_modal',$data);
    }

     function mostrar_sucursal_informacion()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de las Sucursales */
        $lista_sucursales = $_POST["lstSucursal"];
        
        /* separamos el string de las sucursales separados por ',' */
        $this->lista_id_sucursal_eliminar = explode(",", $lista_sucursales);
        
        /* obtener los id's de las sucursales*/
        $numero_sucursal = $_POST["numSucursal"];
        
        /* obtenemos los datos de la primer sucursal para mostrarlo en el modal */
        $sucursal = $this->sucursal_model->obtener_datos_sucursal($this->lista_id_sucursal_eliminar[$numero_sucursal]);
        
        $data['datos_sucursal'] = $sucursal;
        $data['maxSucursales'] = count($this->lista_id_sucursal_eliminar);
        $data['numSucursal'] = $numero_sucursal;
        $this->load->view('sucursal/info_modal',$data);
        
    }

    function actualizar_tabla(){
        if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        /*si existe, lo colocamos dentro de un array y lo mandamos a la vista*/
        $data['nombre_usuario'] = $this->session->userdata('nombre_de_usuario');
            
        /*obtenemos los empleados para mostrarlos en la tabla*/
        $sucursales = $this->sucursal_model->buscar($_POST['buscar']);
        $resultado="";
       if ($sucursales != null) {
            foreach ($sucursales as $sucursal) {
                $inte='';
                if($sucursal['num_int']==null)
                    $sucursal['num_int']='';
                else
                    $inte='  Int : '.$sucursal['num_int'];
                $resultado= $resultado."<tr class='odd gradeX'>"
                . "<td><input type='radio' name='sucursal' value=" . $sucursal['id'] . "></td>"
                . "<td>" . $sucursal['nombre_suc'] . "</td>"
                . "<td> " . $sucursal['calle']." #".$sucursal['num_ext']." ".$inte. ", Col. ".$sucursal['colonia'].", C.P: ".$sucursal['cp']."</td>"
                . "<td>" . $sucursal['municipio'] . "</td>"
                ."<td>" . $sucursal['estado'] . "</td>"
                ."<td><center>" . $sucursal['num_emp'] . "</center></td>"
                . "";
            }
        }

        echo $resultado;
    }

    function mostrar_editar()
    {
        
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de las Sucursales*/
        $lista_sucursales = $_POST["lstSucursal"];
        /* separamos el string de las sucursales separados por ',' */
        $this->lista_id_sucursal_eliminar = explode(",", $lista_sucursales);
        
        /* obtenemos los datos de la primer sucursal para mostrarlo en el modal */
        $sucursal = $this->sucursal_model->obtener_datos_sucursal($this->lista_id_sucursal_eliminar[0]);
        
        $data['arr_estado'] = $this->empleado_model->obtener_estados();

        $data['datos_sucursal'] = $sucursal;
        $data['maxSucursales'] = count($this->lista_id_sucursal_eliminar);
        $data['numSucursal'] = 0;
        $this->load->view('sucursal/editar_modal',$data);
    }

    function editar_sucursal() {
        /*Validamos la sesión*/
        if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
           
        /*Actualizamos la información de la tabla sucursales*/
        $mensaje= $this->sucursal_model->actualizar_sucursal(
        $_POST['num_sucursal'], 
        $_POST['nombre'], 
        $_POST['num_empleados'], 
        $_POST['calle'], 
        $_POST['num_int'], 
        $_POST['num_ext'], 
        $_POST['col'], 
        $_POST['cp'],
        $_POST['id_dir']
        );

        echo $mensaje;
     }

}

    
    
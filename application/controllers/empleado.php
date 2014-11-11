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
        
    }

    /*
     * aquí mandamos llamar la vista html principal de los empleados, donde se 
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
        
        
        /*obtenemos los empleados para mostrarlos en la tabla*/
        $empleados = $this->empleado_model->obtener_empleados();
        
        $data['empleados'] = $empleados;

        /*cargamos las vistas correspondiente*/
        $this->load->view('empleado/encabezado_empleado');
        $this->load->view('comun/menu_superior',$data);
        $this->load->view('comun/menu');
        
        /*Esta es la vista que cambia el cuerpo de la pagina*/
        $this->load->view('empleado/admin_empleado',$data);        
       $this->load->view('empleado/pie_pagina');
        
    }

    
    /*
     * Esta función llena el modal incrustado en la vista para mostrar
     * los campos correspondientes para la seccion de despido.
     */
    function mostrar_despedir()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
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
        $this->load->view('empleado/despedir_modal',$data);
    }
    
    
    function mostrar_empleado_despedir()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener los id's de los Empleados */
        $lista_empleados = $_POST["lstEmpleado"];
        
        /* separamos el string de los empleados separados por ',' */
        $this->lista_id_empleado_despedir = explode(",", $lista_empleados);
        
        /* obtener los id's de los Empleados */
        $numero_empleado = $_POST["numEmpleado"];
        
        /* obtenemos los datos del primer empleado para mostrarlo en el modal */
        $empleado = $this->empleado_model->obtener_datos_empleado($this->lista_id_empleado_despedir[$numero_empleado]);
        
        //echo print_r($empleado);
        
        $data['datos_empleado'] = $empleado;
        $data['maxEmpledos'] = count($this->lista_id_empleado_despedir);
        $data['numEmpleado'] = $numero_empleado;
        $this->load->view('empleado/despedir_modal',$data);
        
    }
    
    function despedir_empleado()
    {
        /* validamos si la sesion fue inciada anteriormente verificando si el nombre del usuario esta
         * en sesion.
         */
       if($this->session->userdata('nombre_de_usuario') == FALSE)
        {
            redirect(base_url().'Index.php/');
        }
        
        /* obtener el id's del Empleado */
        $id_empleado = $_POST["idEmpleado"];
        
        /* obtener los id's de los Empleados */
        $motivo_empleado = $_POST["motivoEmpleado"];
        
        /* modificamos los datos en la base de datos para el empleado */
        $result = $this->empleado_model->despedir_empleado($id_empleado, $motivo_empleado);
        
        
    }
}
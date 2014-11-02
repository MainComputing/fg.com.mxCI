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

}
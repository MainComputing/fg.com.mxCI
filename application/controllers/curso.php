<?php

/**
 * Description of login.php
 * Esta funcion maneja todas la acciones correspondientes al manejo de 
 * los empleados, como son las Altas, Bajas, los cambios y las consultas
 * de estos.
 * 
 * @author Mike Angel
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso extends CI_Controller {
    
    function __construct() {
        parent::__construct();
          $this->load->helper('url');
        $this->load->library('medoo');
        $this->load->model('curso_model');
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
        $cursos = $this->curso_model->obtener_cursos();
        
        $data['cursos'] = $cursos;

        /*cargamos las vistas correspondiente*/
        $this->load->view('curso/encabezado_curso');
        $this->load->view('comun/menu_superior',$data);
        $this->load->view('comun/menu');
        
        /*Esta es la vista que cambia el cuerpo de la pagina*/
        $this->load->view('curso/admin_cursos',$data);        
       $this->load->view('curso/pie_pagina');
        
    }
}

    
    
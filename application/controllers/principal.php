<?php

/**
 * Description of principal.php
 * Esta funcion es la incial y es con la cual se cuenta para la primera pantalla
 * como principal. donde se van a realizar las graficas.
 * 
 * @author Irwin Jhosafat
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('medoo');
        $this->load->model('login_model');
        /*valores de sesion*/
        $this->load->library('session');
        
    }

    /*
     * Aquí mandamos llamar la vista html donde se encuentra la ventana principal
     * es la primera vista que se manda llamar despues del login, ademas de que 
     * se valida que la sesion este completa e iniciada.
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
        
        /*cargamos las vistas correspondiente*/
        $this->load->view('comun/encabezado',$data);
        $this->load->view('comun/menu',$data);
        $this->load->view('principal/inicio',$data);
        $this->load->view('comun/pie_pagina',$data);
    }
}
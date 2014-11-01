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
    }

    /*
     * Aquí mandamos llamar la vista html donde se encuentra la ventana principal
     * es la primera vista que se manda llamar despues del login
     */
    public function index() {
        $this->load->view('principal/inicio');
    }
}
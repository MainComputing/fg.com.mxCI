<?php

/**
 * Description of login.php
 * Esta funcion maneja todas la acciones correspondientes al login,
 * como son las validaciones de resultados y asi como el manejo de
 * los resultados de las llamadas a la base de datos.
 * 
 * @author Irwin Jhosafat
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('medoo');
        $this->load->model('login_model');
        $this->load->library('session');
    }

    /*
     * aquí mandamos llamar la vista html donde se encuentra el login
     * es la primera vista que se manda llamar
     */
    public function index() {
        $this->load->view('login');
    }

    /*
     * Función que valida el usuario y la password del usuario, ademas de 
     * que sube como variable de sesion el nombre del usuario.
     * 
     * @return $ruta si existe el usuario y null si no existe.
     * 
     */
    public function validar_login() {
        
        /* Variables para validar login */
        $id_usuario = $_POST["idEmpleado"];
        $pass_usuario = $_POST["password"];
        
        $ruta = "null";
        
        /*Mandamos llamar al modelo para realizar la consulta a base de datos*/
        $result = $this->login_model->validar($id_usuario, $pass_usuario);
        
        /*validamos el resultado obtenido*/
        if(!empty($result))
        {
            $ruta = "Index.php/principal/";
        }
        
        /*Mandamos la ruta a la vista*/
        echo $ruta;
    }

}
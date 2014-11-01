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
        $this->load->model('login_model');
    }

    /*
     * aquí mandamos llamar la vista html principal de los empleados, donde se 
     * muestra la tabla de los empleados asi como su busqueda.
     */
    public function index() {
        $this->load->view('empleado/admin_empleado');
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
            $ruta = "Ruta Siguiente";
        }
        
        /*Mandamos la ruta a la vista*/
        echo $ruta;
    }

}
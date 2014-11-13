<?php

/**
 * Description of login
 * Esta clase maneja las llamadas a la base de datos correspondientes al login,
 * como son las validaciones y la obtencion de nombres de usuarios.
 * 
 * @author Mike Angel
 */
class Curso_model extends CI_Model {

    /*Datos de usuario*/
    var $id_usuario   = '';
    var $pas_usuairo  = '';
    var $nom_usuario  = '';
    
    /*Conexión con la base de datos*/
    var $base_datos;
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->base_datos = new medoo();
    }
    
    function obtener_cursos() {
        /* obtenemos los cursos */
        /* aqui generamos in inner join para obtener el nombre del empleado y la sucursal a la que pernetenece */
        $resultado = $this->base_datos->select("cursos","*");
        /* Validamos si la variable viene vacia */
        /*$result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }*/
        //echo count($resultado);
        return $resultado;
    }

}
<?php

/**
 * Description of login
 * Esta clase maneja las llamadas a la base de datos correspondientes al login,
 * como son las validaciones y la obtencion de nombres de usuarios.
 * 
 * @author Irwin Jhosafat
 */
class Empleado_model extends CI_Model {

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
    
    function obtener_empleados() {
        /* obtenemos los empleados */
        /* aqui generamos in inner join para obtener el nombre del empleado y la sucursal a la que pernetenece */
        $resultado = $this->base_datos->query("SELECT e.id,e.nombre,e.apellido_pat,e.apellido_mat,s.nombre_suc FROM empleado e,sucursal s WHERE e.sucursal_id = s.id;")->fetchAll();
       // $resultado = $this->base_datos->query("select * from usuario where idusuario=10;")->fetchAll();
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }
        //echo count($resultado);
        return $result;
    }

}
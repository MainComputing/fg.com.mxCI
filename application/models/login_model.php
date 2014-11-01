<?php

/**
 * Description of login
 * Esta clase maneja las llamadas a la base de datos correspondientes al login,
 * como son las validaciones y la obtencion de nombres de usuarios.
 * 
 * @author Irwin Jhosafat
 */
class Login_model extends CI_Model {

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
    
    function validar($id_usuario, $pass_usuario)
    {
        /* El resultado es una matriz de [fila][columna] */
        $encry_password = $this->base_datos->query("SELECT SHA('".$pass_usuario."');")->fetchAll();
        
        /*obtenemos el nombre del usuario*/
        $rows = $this->base_datos->select("usuario", "nombre", [
	"AND" => [
		"idusuario" => $id_usuario,
		"password" => $encry_password[0]
	]
        ]);
       
        
        /*Validamos si la variable viene vacia*/ 
        $result = null;
        if(!empty($rows))
        {
            $result = $rows[0];
        } 
       return $result;
    }
}
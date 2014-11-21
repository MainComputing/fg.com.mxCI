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
    
    
    /*Funcion para insertar Empleados*/
    function insertar_empleado($id_empleado, $rfc, $nombre, $ap_pat, $ap_mat, $edad, $calle, $num_int, $num_ext, $col, $municipio, $estado, $puesto, $sucursal, $horario,$foto_url) {

        /* Primero obtenemos el id del estado */
        $dato = $this->base_datos->select("estado", "id", [
            "nombre" => $estado]);
        $id_estado = $dato[0];
        
        /* Despues obtenemos el id del municipio */
        $dato = $this->base_datos->select("municipio", "id", [
            "nombre" => $municipio]);

        $id_municipio = $dato[0];
       // echo $id_municipio;
        /* Insertamos la dirección */
        $id_dir = $this->base_datos->insert("direccion", [
            "calle" => $calle,
            "num_int" => $num_int,
            "num_ext" => $num_ext,
            "colonia" => $col,
            "municipio_id" => $id_municipio,
            "estado_id" => $id_estado
        ]);

        /* obtenemos el id del puesto */
        $dato = $this->base_datos->select("puesto", "id", [
            "nombre" => $puesto]);

        $id_puesto = $dato[0];
        
        /* obtenemos el id del sucursal */
        $dato = $this->base_datos->select("sucursal", "id", [
            "nombre_suc" => $sucursal]);

        $id_sucursal = $dato[0];
        
        /*obtenemos el id del Horario */
        $dato = $this->base_datos->select("horario", "id", [
            "tipo" => $horario]);

        $id_horario = $dato[0];
        
        /*Insermos el estado*/
        $fecha = getdate();
        $id_estado = $this->base_datos->insert("estadoempleado", [
            "estado" => 1,
            "fecha_ingreso" => $fecha
        ]);
        
        $last_user_id = $this->base_datos->insert("empleado", [
            "id" => $id_empleado,
            "rfc" => $rfc,
            "nombre" => $nombre,
            "apellido_pat" => $ap_pat,
            "apellido_mat" => $ap_mat,
            "edad" => $edad,
            "foto" => $foto_url,
            "direccion_id" => $id_dir,
            "puesto_id" => $id_puesto,
            "sucursal_id" => $id_sucursal,
            "horario_id" => $id_horario,
            "puesto_id" => $id_puesto,
            "estadoempleado_id" =>$id_estado
        ]);
   }
   
   
   
   
   
   
   
   
   /*Funcion para actualizar los datos del empleado*/
 function actualizar_empleado($id_empleado, $rfc, $nombre, $ap_pat, $ap_mat, $edad, $calle, $num_int, $num_ext, $col, $municipio, $estado, $puesto, $sucursal, $horario,$foto_url) {



        /* Primero obtenemos el id del estado utilizando el estado seleccionado*/
        $dato = $this->base_datos->select("estado", "id", [
            "nombre" => $estado]);
        $id_estado = $dato[0];
        
        /* Despues obtenemos el id del municipio */
        $dato = $this->base_datos->select("municipio", "id", [
            "nombre" => $municipio]);
        
        $id_municipio = $dato[0];
        
        
        
        $dato = $this->base_datos->select("empleado", "direccion_id", [
            "id" => $id_empleado]);
        
        $id_direccion = $dato[0];
        
        /* Insertamos la dirección */
         $this->base_datos->update("direccion", [
            "calle" => $calle,
            "num_int" => $num_int,
            "num_ext" => $num_ext,
            "colonia" => $col,
            "municipio_id" => $id_municipio,
            "estado_id" => $id_estado
        ],["id" => $id_direccion]);
         

        /* obtenemos el id del puesto */
        $dato = $this->base_datos->select("puesto", "id", [
            "nombre" => $puesto]);

        $id_puesto = $dato[0];
        
        /* obtenemos el id del sucursal */
        $dato = $this->base_datos->select("sucursal", "id", [
            "nombre_suc" => $sucursal]);

        $id_sucursal = $dato[0];
        
        /*obtenemos el id del Horario */
        $dato = $this->base_datos->select("horario", "id", [
            "tipo" => $horario]);

        $id_horario = $dato[0];
        
                
        $this->base_datos->update("empleado", [
            //"id" => $id_empleado,
            "rfc" => $rfc,
            "nombre" => $nombre,
            "apellido_pat" => $ap_pat,
            "apellido_mat" => $ap_mat,
            "edad" => $edad,
            "foto" => $foto_url,
            "sucursal_id" => $id_sucursal,
            "horario_id" => $id_horario,
            "puesto_id" => $id_puesto,
        ],["id" => $id_empleado]);
   }
   
   
   
//############################################################################################################   
//###########################  Funciones para Obtener ########################################################   
//############################################################################################################
   
   /*funcion que obtiene todos los datos del empleado*/
   function obtener_editar_datos_empleado($id_empleado)
   {
       /*Obtenemos TODOS los datos del empleado*/
        $resultado = $this->base_datos->query("SELECT e.id, e.rfc, e.nombre AS e_nombre, e.apellido_pat, e.apellido_mat, e.edad, e.foto, d.calle, d.colonia, d.num_ext, d.num_int, m.nombre as mun_nombre, ee.nombre as estado_nombre, p.nombre as puesto_nombre, s.nombre_suc, h.tipo FROM empleado e JOIN direccion d on e.direccion_id = d.id join municipio m on d.municipio_id = m.id join estado ee on m.id_estado = ee.id join puesto p on e.puesto_id = p.id join sucursal s on e.sucursal_id = s.id join horario h on e.horario_id= h.id where e.id =".$id_empleado.";")->fetchAll();
        
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }
        return $result;
   }
  
   
   /*Funcion que obtiene los datos de todos los empleados para mostrarlos en una tabla*/
     function obtener_empleados() {
        /* obtenemos los empleados */
        /* aqui generamos in inner join para obtener el nombre del empleado y la sucursal a la que pernetenece */
        $resultado = $this->base_datos->query("SELECT e.id,e.nombre,e.apellido_pat,e.apellido_mat,s.nombre_suc,ee.estado FROM empleado e,sucursal s, estadoempleado ee WHERE e.sucursal_id = s.id and ee.id = e.estadoempleado_id;")->fetchAll();
        /* Validamos si la variable viene vacia */
        $result = null;
        
        if (count($resultado)>0) {
            $result = $resultado;
        }
        
        return $result;
    }
    
    
    
    
    /*Esta funcion obtiene los datos para mostrarlos en el modal cuando se van a despedir empleados*/
    function obtener_datos_empleado($id_empleado)
    {
        /*
         * $id_empleado = id empleado a despedir
         */
        
        /* aqui generamos un inner join para obtener el nombre del empleado y la sucursal a la que pernetenece */
        $resultado = $this->base_datos->query("SELECT e.id,e.nombre,e.apellido_pat,e.apellido_mat,s.nombre_suc,p.nombre as nombre_puesto, h.tipo,ee.estado,ee.motivo_despido FROM empleado e JOIN sucursal s on e.sucursal_id = s.id join puesto p on e.puesto_id=p.id join horario h on e.horario_id= h.id join estadoempleado ee on ee.id = e.estadoempleado_id where e.id =".$id_empleado.";")->fetchAll();
        
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }

        return $result;
    }

    
    
   /*Funcion que acutaliza las tablas para mostrar al empleado como despedido*/
    function despedir_empleado($id_empleado, $motivo)
    {
        /*obtenemos el id del estado_empleado*/
        $id_estado_empleado = $this->base_datos->select("empleado", "estadoempleado_id", ["id" => $id_empleado]);
        
        /*Actualizamos los datos de la tabla para indicar que esta desempleado*/
        $filas = $this->base_datos->update("estadoempleado", ["estado" => 0,"motivo_despido" => $motivo],["id" =>$id_estado_empleado[0]]);
        /*retornamos las filas que fueron afectadas*/
        return $filas;
        
    }
    
    
    
    /*funcion que obtiene los estados del pais en la base de datos*/
    function obtener_estados()
    {
        $array_estados = $this->base_datos->select("estado", "nombre");
        
        return $array_estados;
    }
    
    
    
    /*funcion que obtiene los puestos en la base de datos*/
    function obtener_puestos()
    {
        $array_puestos = $this->base_datos->select("puesto", "nombre");
        
        return $array_puestos;
    }
    
    
    /*funcion que obtiene los sucursales en la base de datos*/
    function obtener_sucursales()
    {
        $array_sucursal = $this->base_datos->select("sucursal", "nombre_suc");
        
        return $array_sucursal;
    }
    
    
    /*funcion que obtiene los horarios en la base de datos*/
    function obtener_horarios()
    {
        $array_horario = $this->base_datos->select("horario", "tipo");
        
        return $array_horario;
    }
    
    
    /*funcion que obtiene los munucipio en la base de datos*/
    /*
     * $estado_seleccionado = nombre del estado que esta seleccionado en el select
     */
    function obtener_municipio($estado_seleccionado)
    {
        $id_estado = $this->base_datos->select("estado", "id", ["nombre" => $estado_seleccionado]);
        $array_municipio = $this->base_datos->select("municipio", "nombre", ["id_estado" => $id_estado]);

        return $array_municipio;
    }
    
    
   
}
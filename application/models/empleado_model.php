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
        $resultado = $this->base_datos->query("SELECT e.id,e.nombre,e.apellido_pat,e.apellido_mat,s.nombre_suc,ee.estado FROM empleado e,sucursal s, estadoempleado ee WHERE e.sucursal_id = s.id and ee.id = e.estadoempleado_id;")->fetchAll();
       // $resultado = $this->base_datos->query("select * from usuario where idusuario=10;")->fetchAll();
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }
        
        return $result;
    }
    
    function obtener_datos_empleado($id_empleado)
    {
        /* obtenemos los empleados */
        /* aqui generamos un inner join para obtener el nombre del empleado y la sucursal a la que pernetenece */
        $resultado = $this->base_datos->query("SELECT e.id,e.nombre,e.apellido_pat,e.apellido_mat,s.nombre_suc,p.nombre as nombre_puesto, h.tipo,ee.estado,ee.motivo_despido FROM empleado e JOIN sucursal s on e.sucursal_id = s.id join puesto p on e.puesto_id=p.id join horario h on e.horario_id= h.id join estadoempleado ee on ee.id = e.estadoempleado_id where e.id =".$id_empleado.";")->fetchAll();
        
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }
        //echo count($resultado);
        return $result;
    }

    function despedir_empleado($id_empleado, $motivo)
    {
        
        $id_estado_empleado = $this->base_datos->select("empleado", "estadoempleado_id", ["id" => $id_empleado]);
        $filas = $this->base_datos->update("estadoempleado", ["estado" => 0,"motivo_despido" => $motivo],["id" =>$id_estado_empleado[0]]);
          //  $resultado = $this->base_datos->query("update estadoempleado set estado=0,motivo_despido='".$motivo."'where id in(select estadoempleado_id from empleado where id=".$id_empleado.");");
            //return $id_estado_empleado[0];
        return $filas;
    }
    
    function obtener_estados()
    {
        $array_estados = $this->base_datos->select("estado", "nombre");
        //echo print_r($array_estados);
        return $array_estados;
    }
    
    function obtener_puestos()
    {
        $array_puestos = $this->base_datos->select("puesto", "nombre");
        //echo print_r($array_estados);
        return $array_puestos;
    }
    
    function obtener_sucursales()
    {
        $array_sucursal = $this->base_datos->select("sucursal", "nombre_suc");
        //echo print_r($array_estados);
        return $array_sucursal;
    }
    
    function obtener_horarios()
    {
        $array_horario = $this->base_datos->select("horario", "tipo");
        //echo print_r($array_estados);
        return $array_horario;
    }
    
    function obtener_municipio($estado_seleccionado)
    {
        $id_estado = $this->base_datos->select("estado", "id", ["nombre" => $estado_seleccionado]);
        
        $array_municipio = $this->base_datos->select("municipio", "nombre", ["id_estado" => $id_estado[0]]);
        
        return $array_municipio;
    }
    
    
    function insertar_empleado($id_empleado, $rfc, $nombre, $ap_pat, $ap_mat, $edad, $calle, $num_int, $num_ext, $col, $municipio, $estado, $puesto, $sucursal, $horario,$foto_url) {

        /* Primero obtenemos el id del estado */
        $dato = $this->base_datos->select("estado", "id", [
            "nombre" => $estado]);
        $id_estado = $dato[0];
        
        /* Despues obtenemos el id del municipio */
        $dato = $this->base_datos->select("municipio", "id", [
            "nombre" => $municipio]);

        $id_municipio = $dato[0];

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
}
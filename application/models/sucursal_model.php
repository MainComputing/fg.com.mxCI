<?php

/**
 * Description of login
 * Esta clase maneja las llamadas a la base de datos correspondientes a funciones de altas, bajas y cambios
 * de lo que hace referencia a las sucursales
 * @author Raúl Preciado
 */
class Sucursal_model extends CI_Model {
 

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
    
    function obtener_sucursal() {
        /* obtenemos las sucursales */
        /* aqui realizamos la consulta a la vista correspondiente de las sucursales*/
        $resultado = $this->base_datos->select("sucursal_v","*");
        return $resultado;
    }

    function buscar($buscar) {
        /* Consultamos la vista para devolver al usuario la información requerida por el usuario */
        $resultado = $this->base_datos->select("sucursal_v","*", [
                'LIKE' =>[
                    'OR'=>[
                            'nombre_suc'=>$buscar,
                            'calle'=>$buscar,
                            'colonia'=>$buscar,
                            'municipio'=>$buscar,
                            'estado'=>$buscar

                        ]
                ]
            ]);
        return $resultado;
    }

    function insertar_sucursal($id_sucursal, $nombre, $num_empleados, $calle, $num_int, $num_ext, $col, $municipio, $estado, $foto_url) {
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
            "id"=>$id_sucursal,
            "calle" => $calle,
            "num_int" => $num_int,
            "num_ext" => $num_ext,
            "colonia" => $col,
            "municipio_id" => $id_municipio,
            "estado_id" => $id_estado
        ]);

        /*Insertamos la información general de la sucursal*/
        $last_user_id = $this->base_datos->insert("sucursal", [
            "id" => $id_sucursal,
            "nombre_suc" => $nombre,
            "num_emp" => $num_empleados,
            "foto"=>$foto_url,
            "direccion_id" => $id_sucursal
        ]);
        
   }

   function obtener_datos_sucursal($id_sucursal)
    {
        /* obtenemos las sucursales  a partir de su id*/
        $resultado = $this->base_datos->query("SELECT * FROM sucursal_v where id= ".$id_sucursal.";")->fetchAll();
        
        /* Validamos si la variable viene vacia */
        $result = null;
        if (count($resultado)>0) {
            $result = $resultado;
        }
        return $result;
    }

    function eliminar_sucursal($id_sucursal)
    {
         /*Eliminamos la sucursal a partir del identificador de la misma*/
        $dato = $this->base_datos->select("sucursal", "direccion_id", [
            "id" => $id_sucursal]);

        $filas = $this->base_datos->delete("sucursal", ["id"=>$id_sucursal]);
        $filas = $this->base_datos->delete("direccion", ["id"=>$dato[0]]);
        return $filas;
    }

    function actualizar_sucursal($id_sucursal, $nombre, $num_empleados, $calle, $num_int, $num_ext, $col,$cp)
    {   
        /*Actualizamos primero la información de la dirección correspondiente*/
        $dom = $this->base_datos->update("direccion",[
                "calle"=>$calle,
                "num_int"=>$num_int,
                "num_ext"=>$num_ext,
                "colonia"=>$col,
                "cp"=>$cp
            ], ["id"=>$id_sucursal]);

        /*actualizamos la información en la tabla sucursal*/
        $filas = $this->base_datos->update("sucursal",[
                "nombre_suc"=>$nombre,
                "num_emp"=>$num_empleados
            ], ["id"=>$id_sucursal]);

       
    }


}
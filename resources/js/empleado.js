/*
 * @Ubicacion: resources\js\empleado.js
 * @autor:     Irwin Flores
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para la
 *             funcionalidad de la seccion de empleados.
 *             
 */
 $(document).ready(function() {
        $('#dataTables-example').dataTable();
        /*Eliminamos el sorting de las accion*/
        $('#th_action').removeClass("sorting");
    });
    $("#button_editar").click(function(){
        //window.location.replace("/fg.com.mx/view/empleado/modificar_empleado.php");
        alert("editar");
	});
    $("#button_agregar").click(function(){
        window.location.replace("/fg.com.mx/view/empleado/insertar_empleado.php");
	});
    $("#button_info").click(function(){
        window.open("/fg.com.mx/view/empleado/consultar_empleado.php","","width=500,height=600");
	});
    $("#button_despedir").click(function(){
        //window.open();
        window.open("/fg.com.mx/view/empleado/despedir_empleado.php","","width=400,height=305","_blank","toolbar=no, scrollbars=no, resizable=no, top=700, left=700, width=700, height=700");
	});
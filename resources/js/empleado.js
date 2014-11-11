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
    $("#button_info").click(function(){
        window.open("/fg.com.mx/view/empleado/consultar_empleado.php","","width=500,height=600");
	});
        
    /*
     * Funcion que se dispara cuando mandamos el clic de despedir. mostramos el
     * modal y mandamos a consulta los checkbox que estan seleccionados. 
     */
    
    $("#btn_despedir").click(function () {
    //window.open();
    // window.open("/fg.com.mx/view/empleado/despedir_empleado.php","","width=400,height=305","_blank","toolbar=no, scrollbars=no, resizable=no, top=700, left=700, width=700, height=700");

    /* Recorremos los checkbox y los guardmos en una lista */
    var listaEmpleados ="";
    $("input:checkbox:checked").each(function ()
    {
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
        //alert($(this).val());
    });
    if(listaEmpleados != "")
    {
    /*autoclic para mostrar el modal*/
    $("#modal").click();
    
    /*Mostramos mensaje de carga*/
    $("#tituloModal").text("Cargando...");
    $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
    
    $.ajax("/fg.com.mxCI/Index.php/empleado/mostrar_despedir", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModal").text("Despedir Empleado");
              $("#cuerpo_modal").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {lstEmpleado:listaEmpleados},
        async: true,
    });
    }
    else
    {
        alert("Seleccione al menos un Empleado");
    }
});


  $("#btn_guardar").click(function () {
      var numEmpleado= $("#num_empleado").text();
      var motivo = $("#txt_motivo").val();
      if(motivo === "")
      {
          alert("Debes ingresar un motivo");
      }
      else
      {
          /*Mostramos mensaje de carga*/
          $("#tituloModal").text("Cargando...");
          $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
          $.ajax("/fg.com.mxCI/Index.php/empleado/despedir_empleado", {
            type: "post",   // usualmente post o get
            success: function(result) {
                refrescar_pantalla_despedir();
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {idEmpleado:numEmpleado,motivoEmpleado:motivo},
        async: true
        });
      }
  });



function mostrarEmpleado(numeroEmpleado){
    //alert(numEmpleado);
    /*Mostramos mensaje de carga*/
    $("#tituloModal").text("Cargando...");
    $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaEmpleados ="";
    $("input:checkbox:checked").each(function ()
    {
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
        //alert($(this).val());
    });
    
    $.ajax("/fg.com.mxCI/Index.php/empleado/mostrar_empleado_despedir", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModal").text("Despedir Empleado");
              $("#cuerpo_modal").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {numEmpleado:numeroEmpleado,lstEmpleado:listaEmpleados},
        async: true
    });
    }
    
    
function refrescar_pantalla_despedir() {
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaEmpleados ="";
    $("input:checkbox:checked").each(function ()
    {
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
        //alert($(this).val());
    });
    
    /*Mostramos mensaje de carga*/
    $("#tituloModal").text("Cargando...");
    $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
    
    $.ajax("/fg.com.mxCI/Index.php/empleado/mostrar_despedir", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModal").text("Despedir Empleado");
              $("#cuerpo_modal").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {lstEmpleado:listaEmpleados},
        async: true,
    });        
}
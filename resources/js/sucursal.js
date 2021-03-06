/*
 * @Ubicacion: resources\js\sucursal.js
 * @autor:     Raúl Preciado
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para la
 *             funcionalidad de la seccion de sucursales.
 *             
 */
 $(document).ready(function() {
        $('#dataTables-example').dataTable();
        
});

$("input:radio").click(function(){
  $('#alerta').hide("slide");
});
 /*Método para habilitar la edición de una sucursal seleccionada*/
 $("#btn_editar").click(function(){
    var listaSucursal ="";
    $("input:radio:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
    });
    if(listaSucursal != "")
    {
      
        /*autoclic para mostrar el modal*/
        $("#modal_editar").click();
        /*Mostramos mensaje de carga*/
        $("#tituloModalEditar").text("Cargando...");
        $("#cuerpo_modal_editar").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
        
        $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_editar", {
                type: "post",   // usualmente post o get
                success: function(result) {
                  $("#tituloModalEditar").text("Editar Sucursal");
                  $("#cuerpo_modal_editar").html(result);
                },
                error: function(result) {
                    alert("Error en la conexión!");
                },
            data: {lstSucursal:listaSucursal},
            async: true,
        });
        }
        else
        {
            $("#alerta").show("swing");
        }
 });

/*Realizar la busqueda de las sucursales*/
 $("#buscar").keyup(function(){
      $.ajax("/fg.com.mxCI/Index.php/sucursal/actualizar_tabla", {
                type: "post",   // usualmente post o get
                success: function(result) {
                    $('tbody').html(result);
                },
                error: function(result) {
                    alert("Error en la conexión!");
                },
            data: {buscar:$(this).val()},
            async: true,
        });
 });

/*Permite mostrar la información de la sucursal seleccionada*/
 $("#btn_info").click(function(){
    var listaSucursal ="";
     $("input:radio:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
    });
    if(listaSucursal != "")
    {
    /*autoclic para mostrar el modal*/
        $("#modal_info").click();
        
        /*Mostramos mensaje de carga*/
        $("#tituloModal").text("Cargando...");
        $("#cuerpo_modal_info").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
        
        $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_info", {
                type: "post",   // usualmente post o get
                success: function(result) {
                  $("#tituloModal").text("Informacion Sucursal");
                  $("#cuerpo_modal_info").html(result);
                },
                error: function(result) {
                    alert("Error en la conexión!");
                },
            data: {lstSucursal:listaSucursal},
            async: true,  
        });
        }
        else
        {
           $("#alerta").show("swing");
        }

 });

 /*Permite mostrar la información de la sucursal a eliminar*/
 $("#btn_eliminar").click(function () {
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaSucursal ="";
     $("input:radio:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
    });
    if(listaSucursal != "")
    {
    /*autoclic para mostrar el modal*/
        $("#modal").click();
        
        /*Mostramos mensaje de carga*/
        $("#tituloModal").text("Cargando...");
        $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
        
        $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_eliminar", {
                type: "post",   // usualmente post o get
                success: function(result) {
                  $("#tituloModal").text("Eliminar Sucursal");
                  $("#cuerpo_modal").html(result);

                },
                error: function(result) {
                    alert("Error en la conexión!");
                },
            data: {lstSucursal:listaSucursal},
            async: true,
        });
        }
        else
        {
            $("#alerta").show("swing");
        }
});

/*Función que activa la eliminación de la sucursal*/
  $("#btn_guardar").click(function () {
        var numSucursal= $("#num_sucursal").text();
          /*Mostramos mensaje de carga*/
          $("#tituloModal").text("Eliminando...");
          $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
          $.ajax("/fg.com.mxCI/Index.php/sucursal/eliminar_sucursal", {
            type: "post",   // usualmente post o get
            success: function(result) {
                $("#cuerpo_modal").html("<font color='green' size=10>Sucursal eliminida <img src='/fg.com.mxCI/resources/img/correcto.gif'/>");
                  location.reload(); 
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {idSucursal:numSucursal},
        async: true
        });

      
  });

/*Función que activa la actualización de la información de la sucursal*/
  $("#btn_actualizar").click(function(){
          var numSucursal= $("#num_sucursal").text();
          var nombre = $("#nombre").val();
          var numEmp = $("#numEmp").val();
          var calle =$("#calle").val();
          var ext = $("#ext").val();
          var inte= $("#int").val();
          var col = $("#col").val();
          var cp =  $("#cp").val();
          var id_dir= $("#id_dir").text();
          if($("#nombre").val().length<1)
          {   
            $("#nombre").addClass("alert alert-warning");
            //$("#nombre").attr("placeholder","Ingresar el nombre de la sucursal");
          }
        else
        { 
            if(!$("#nombre").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
            {
                $('#nombre').click();
                $('#nombre').popover();
            }                                
            else
            {
                if($("#numEmp").val().length<1)
                {   
                  $("#numEmp").addClass("alert alert-warning");
                  //$("#num_empleados").attr("placeholder","Ingresar número de empleados");
                }
              else
               { 
                   if(isNaN($("#numEmp").val()))
                   {
                        $('#numEmp').click();
                        $('#numEmp').popover();
                   }
                   else
                   {
                        if($("#calle").val().length<1)
                        { 
                          $("#calle").addClass("alert alert-warning");
                          //$("#calle").attr("placeholder","Ingresar nombre de la calle");
                        }
                        else
                        { 
                          if($("#ext").val().length<1)
                          {   
                              $("#ext").addClass("alert alert-warning");
                              //$("#num_ext").attr("placeholder","Ingresar número exterior");
                          }
                          else
                          {   
                              if(isNaN($("#ext").val()))
                              {
                                $('#ext').click();
                                $('#ext').popover();
                              }
                              else
                              {
                                  if($("#col").val().length<1)
                                  {   
                                    $("#col").addClass("alert alert-warning");
                                    //$("#col").attr("placeholder","Ingresar número de sucursal");
                                  }
                                  else
                                  {
                                    if(isNaN($("#cp").val())){
                                        $('#cp').click();
                                        $('#cp').popover();
                                    }
                                    else{
           
                                        if($("#cp").val().length<1){
                                           $("#cp").addClass("alert alert-warning");
                                        }else{


                                          $("#tituloModalEditar").text("Actualizando...");
                                          $("#cuerpo_modal_editar").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
                                          $("#btn_actualizar").hide();
                                          $.ajax("/fg.com.mxCI/Index.php/sucursal/editar_sucursal", {
                                                  type: "post",   // usualmente post o get
                                                  success: function(result) {
                                                    $("#cuerpo_modal_editar").html("<font color='green' size=10>Sucursal actualizada <img src='/fg.com.mxCI/resources/img/correcto.gif'/>");
                                                    location.reload();                                                                                                    
                                                  },
                                                  error: function(result) {
                                                      alert("Error en la conexión!");
                                                  },
                                                  data: {
                                                    num_sucursal:numSucursal,
                                                    nombre:nombre, num_empleados:numEmp,
                                                    calle:calle,num_int:inte,num_ext:ext,
                                                    col:col, cp:cp,id_dir:id_dir
                                                  },
                                                  async: true
                                              });
                                          
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }


  });



function mostrarSucursal(numeroSucursal){
    /*Mostramos mensaje de carga*/
    $("#tituloModal").text("Cargando...");
    $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaSucursal ="";
    $("input:checkbox:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
        //alert($(this).val());
    });
    
    $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_sucursal_eliminar", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModal").text("Eliminar Sucursal");
              $("#cuerpo_modal").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {numSucursal:numeroSucursal,lstSucursal:listaSucursal},
        async: true
    });
    }


/*Boton para cerrar las ventanas modales*/
$("#btn_cerrar").click(function () {
   location.reload(); 
});
    
    
    
function refrescar_pantalla_eliminar() {
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaSucursal ="";
    $("input:radio:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
    });
    /*Mostramos mensaje de carga*/
    $("#tituloModal").text("Cargando...");
    $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_eliminar", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModal").text("Eliminar Sucursal");
              $("#cuerpo_modal").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {lstSucursal:listaSucursal},
        async: true,
    });    
   // location.reload();
    
}

// VALIDACIONES 
/*Validación antes de crear una nueva sucursal*/
 $("#btn_submit").click(function()
                    {
  /*Expresiones regulares para validar los campos de la forma*/                      
  /*
   * Expresion para nombre: /^[a-zA-Z]\s*[a-zA-Z]+/ 
   * 
   */
                       if($("#num_sucursal").val().length<1)
                        {  $("#num_sucursal").addClass("alert alert-warning");
                           //$("#num_sucursal").attr("placeholder","Ingresar número de sucursal");
                        }
                        else
                        {

                            if(isNaN($("#num_sucursal").val()))
                            {
                                $('#num_sucursal').click();
                                $('#num_sucursal').popover();
                            }                          
                            else
                            { 
                              if($("#nombre").val().length<1)
                              {   
                                $("#nombre").addClass("alert alert-warning");
                                //$("#nombre").attr("placeholder","Ingresar el nombre de la sucursal");
                              }
                            else
                            { 
                                if(!$("#nombre").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
                                {
                                    $('#nombre').click();
                                    $('#nombre').popover();
                                }                                
                                else
                                {
                                    if($("#num_empleados").val().length<1)
                                    {   
                                      $("#num_empleados").addClass("alert alert-warning");
                                      //$("#num_empleados").attr("placeholder","Ingresar número de empleados");
                                    }
                                  else
                                   { 
                                       if(isNaN($("#num_empleados").val()))
                                       {
                                            $('#num_empleados').click();
                                            $('#num_empleados').popover();
                                       }
                                       else
                                       {
                                            if($("#calle").val().length<1)
                                            { 
                                              $("#calle").addClass("alert alert-warning");
                                              //$("#calle").attr("placeholder","Ingresar nombre de la calle");
                                            }
                                            else
                                            { 
                                              if($("#num_ext").val().length<1)
                                              {   
                                                  $("#num_ext").addClass("alert alert-warning");
                                                  //$("#num_ext").attr("placeholder","Ingresar número exterior");
                                              }
                                              else
                                              {   
                                                  if(isNaN($("#num_ext").val()))
                                                  {
                                                    $('#num_ext').click();
                                                    $('#num_ext').popover();
                                                  }
                                                  else
                                                  {
                                                      if($("#col").val().length<1)
                                                      {   
                                                        $("#col").addClass("alert alert-warning");
                                                        //$("#col").attr("placeholder","Ingresar número de sucursal");
                                                      }
                                                      else
                                                      {
                                                        if(isNaN($("#cp").val())){
                                                            $('#cp').click();
                                                            $('#cp').popover();
                                                        }
                                                        else{
                                                           if($("#cp").val().length<1 ){
                                                              $('#cp').addClass("aler alert-warning");
                                                           }
                                                           else{
                                                                if($("#estado").val()=="--")
                                                                {
                                                                    $('#estado').click();
                                                                    $('#estado').popover();
                                                                }
                                                                else
                                                                {
                                                                    if($("#imagen_sucursal").val()=="")
                                                                    {
                                                                        $('#imagen_sucursal').click();
                                                                        $('#imagen_sucursal').popover();
                                                                    }else{
                                                                       $("#forma_sucursal").attr("action", "/fg.com.mxCI/Index.php/sucursal/alta_sucursal");
                                                                       $("#subir_forma").click(); 

                                                                    }
                                                        
                                                                }
                                                           }   
                                                        } 
                                                    }
                                                 }
                                              }
                                            }
                                          }
                                         }
                                      }  
                                    }
                                  }   
                              }   
                }); 

$("input").focus(function(){
    $(this).removeClass("alert alert-warning");
});   
                               
//-------------------------------------------------------------------------------------------------------------------
function readURL(input) 
{
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#previewimage').attr('src', e.target.result)
            //.width(150);     // ACA ESPECIFICAN QUE TAMANO DE ANCHO QUIEREN
            //.height(150);   //  ACA ESPECIFICAN QUE TAMANO DE ALTO QUIEREN
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('#estado').on('change', function() {
  var estadoSelecccionado = this.value;
  $.ajax("/fg.com.mxCI/Index.php/empleado/mostrar_municipio", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $('#municipio').html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {estado:estadoSelecccionado},
        async: true
    });        
});

/*Carga la página que permite la creación de una nueva sucursal*/
$("#btn_agregar").click(function () {
    window.location="/fg.com.mxCI/Index.php/sucursal/mostrar_sucursal_agregar";
});

/*Carga la página principal al cancelar una nueva sucursal*/
$("#btn_cancelar").click(function () {
    window.location="/fg.com.mxCI/Index.php/sucursal/";
});


/*Muestra información de las sucursales*/
function mostrarInformacion(numeroSucursal){
    /*Mostramos mensaje de carga*/
    $("#tituloModalInfo").text("Cargando...");
    $("#cuerpo_modal_info").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaSucursal ="";
    $("input:checkbox:checked").each(function ()
    {
        listaSucursal = listaSucursal+$(this).val()+ ",";
        //alert($(this).val());
    });
    
    $.ajax("/fg.com.mxCI/Index.php/sucursal/mostrar_sucursal_informacion", {
            type: "post",   // usualmente post o get
            success: function(result) {
              $("#tituloModalInfo").text("Informacion Sucursal");
              $("#cuerpo_modal_info").html(result);
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {numSucursal:numeroSucursal,lstSucursal:listaSucursal},
        async: true
    });
    }

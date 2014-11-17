/*
 * @Ubicacion: resources\js\sucursal.js
 * @autor:     Raúl Preciado
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para la
 *             funcionalidad de la seccion de sucursales.
 *             
 */
 $("#btn_editar").click(function(){
    var listaSucursal ="";
    $("input:radio:checked").each(function ()
    {

        listaSucursal = listaSucursal+$(this).val()+ ",";
        alert($(this).val());
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
            alert("Seleccione al menos una Sucursal");
        }
 });

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

 $("#btn_info").click(function(){
    var listaSucursal ="";
     $("input:radio:checked").each(function ()
    {

        listaSucursal = listaSucursal+$(this).val()+ ",";
        alert($(this).val());
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
            alert("Seleccione al menos una Sucursal");
        }

 });

 $("#btn_eliminar").click(function () {
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaSucursal ="";
     $("input:radio:checked").each(function ()
    {

        listaSucursal = listaSucursal+$(this).val()+ ",";
        alert($(this).val());
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
            alert("Seleccione al menos una Sucursal");
        }
});


  $("#btn_guardar").click(function () {
        var numSucursal= $("#num_sucursal").text();
          /*Mostramos mensaje de carga*/
          $("#tituloModal").text("Eliminando...");
          $("#cuerpo_modal").html("<center><img src='/fg.com.mxCI/resources/img/cargando.gif' alt='cargando' style='width:100px;height:100px'/></center>");
    
          $.ajax("/fg.com.mxCI/Index.php/sucursal/eliminar_sucursal", {
            type: "post",   // usualmente post o get
            success: function(result) {
//                refrescar_pantalla_eliminar();
                  location.reload(); 
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {idSucursal:numSucursal},
        async: true
        });
      
  });

  $("#btn_actualizar").click(function(){
          var numSucursal= $("#num_sucursal").text();
          var nombre = $("#nombre").val();
          var numEmp = $("#numEmp").val();
          var calle =$("#calle").val();
          var ext = $("#ext").val();
          var inte= $("#int").val();
          var col = $("#col").val();
          var cp =  $("#cp").val();

          alert(numSucursal+nombre+numEmp+calle+ext+inte+col+cp);
          /*Mostramos mensaje de carga*/
                 
          $.ajax("/fg.com.mxCI/Index.php/sucursal/editar_sucursal", {
            type: "post",   // usualmente post o get
            success: function(result) {
              location.reload(); 
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
            data: {
              num_sucursal:numSucursal,
              nombre:nombre, num_empleados:numEmp,
              calle:calle,num_int:inte,num_ext:ext,
              col:col, cp:cp
            },
            async: true
        });
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


 $("#btn_submit").click(function()
                    {
  /*Expresiones regulares para validar los campos de la forma*/                      
  /*
   * Expresion para nombre: /^[a-zA-Z]\s*[a-zA-Z]+/
   * 
   */
                       if($("#num_sucursal").val().length<1)
                        {   alert("Ingresa numero de Sucursal");}
                        else
                        {
                            if(isNaN($("#num_sucursal").val()))
                            {
                                alert("El numero del empleado no es valido.");
                            }                          
                          else
                          { if($("#nombre").val().length<1)
                            {   alert("Ingresa el Nombre.");}
                            else
                            { 
                                if(!$("#nombre").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
                                {
                                    alert("El nombre de la Sucursal es Invalido");
                                }                                
                                else
                                {
                                    if($("#num_empleados").val().length<1)
                                  {   alert("Ingresa el numero de empleados.");}
                                  else
                                   { 
                                       if(isNaN($("#num_empleados").val()))
                                       {
                                           alert("Numero de empleados no es valido");
                                       }
                                       else
                                       {
                                       if($("#calle").val().length<1)
                                     {   alert("Ingresa la Calle");}
                                     else
                                      { if($("#num_ext").val().length<1)
                                        {   alert("Ingresa el Número Exterior.");}
                                        else
                                        {   
                                           if(isNaN($("#num_ext").val()))
                                           {
                                               alert("El numero exterior no es valido.");
                                           }
                                           else
                                           {
                                            if($("#col").val().length<1)
                                            {   alert("Ingresa la Colonia.");}
                                            else
                                            {
                                                if($("#estado").val()=="--")
                                                {
                                                    alert("Selecciona un Estado")
                                                }
                                                else
                                                {
                                                    if($("#imagen_sucursal").val()=="")
                                                    {
                                                        alert("selecciona una Imagen de Sucursal");
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
  alert( this.value );
  
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


$("#btn_agregar").click(function () {
    window.location="/fg.com.mxCI/Index.php/sucursal/mostrar_sucursal_agregar";
});

$("#btn_cancelar").click(function () {
    window.location="/fg.com.mxCI/Index.php/sucursal/";
});


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

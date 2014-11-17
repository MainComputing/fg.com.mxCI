/*
 * @Ubicacion: resources\js\empleado.js
 * @autor:     Irwin Flores
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para la
 *             funcionalidad de la seccion de empleados.
 *             
 */
/*
 $(document).ready(function() {
        $('#dataTables-example').dataTable();
        /*Eliminamos el sorting de las accion
        $('#th_action').removeClass("sorting");
    });
    $("#button_info").click(function(){
        window.open("/fg.com.mx/view/empleado/consultar_empleado.php","","width=500,height=600");
	});
        */
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


$("#btn_cerrar").click(function () {
   location.reload(); 
});
    
    
    
function refrescar_pantalla_despedir() {
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaEmpleados ="";
    $("input:checkbox:checked").each(function ()
    {
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
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


 $("#btn_submit").click(function()
                    {
  /*Expresiones regulares para validar los campos de la forma*/                      
  /*
   * Expresion para nombre: /^[a-zA-Z]\s*[a-zA-Z]+/
   * 
   */

                       if($("#num_empleado").val().length<1)
                        {   alert("Ingresa un el de Empleado");}
                        else
                        {
                            if(isNaN($("#num_empleado").val()))
                            {
                                alert("El numero del empleado no es valido.");
                            }
                            else
                            {
                            if($("#rfc").val().length<1)
                          {   
                              alert("Ingresa el RFC.");
                          }
                          else
                          { if($("#nombre").val().length<1)
                            {   alert("Ingresa el Nombre.");}
                            else
                            { 
                                if(!$("#nombre").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
                                {
                                    alert("El nombre del Empleado es Invalido");
                                }
                                else
                                {
                                if($("#ap_pat").val().length<1)
                              {   alert("Ingresa el Apellido Paterno.");}
                              else
                              {
                                if(!$("#ap_pat").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
                                {
                                    alert("El apellido paterno del Empleado es Invalido");
                                }
                                else
                                {  
                                  if($("#ap_mat").val().length<1)
                                {   alert("Ingresa el Apellido Materno.");}
                                else
                                { 
                                    if(!$("#ap_mat").val().match(/^[a-zA-Z]\s*[a-zA-Z]+/))
                                {
                                    alert("El apellido materno del Empleado es Invalido");
                                }
                                else
                                {
                                    if($("#edad").val().length<1)
                                  {   alert("Ingresa la Edad.");}
                                  else
                                   { 
                                       if(isNaN($("#edad").val()))
                                       {
                                           alert("La edad no es valida");
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
                                                    if($("#imagen_empleado").val()=="")
                                                    {
                                                        alert("selecciona una Imagen de Empleado");
                                                    }
                                                    else
                                                    {
                                                        if($("#puesto").val()=="--")
                                                        {
                                                            alert("Selecciona un Puesto");
                                                        }
                                                        else
                                                        {
                                                            if($("#sucursal").val()=="--")
                                                            {
                                                                alert("selecciona una sucursal");
                                                            }
                                                            else
                                                            {
                                                                if($("#horario").val()=="--")
                                                                {
                                                                    alert("Selecciona un Horario");
                                                                }
                                                                else
                                                                {
                                                                    $("#forma_empleado").attr("action", "/fg.com.mxCI/Index.php/empleado/alta_empleado");
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

/*
$("#estado").change(function(){
    alert(this.val());
});
*/
$('#estado').on('change', function() {
  //alert( this.value );
  
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
    window.location="/fg.com.mxCI/Index.php/empleado/mostrar_empleado_agregar";
});

$("#btn_cancelar").click(function () {
    window.location="/fg.com.mxCI/Index.php/empleado/";
});

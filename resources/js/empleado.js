/*
 * @Ubicacion: resources\js\empleado.js
 * @autor:     Irwin Flores
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para la
 *             funcionalidad de la seccion de empleados.
 *             
 */
     /* Funcion que se dispara cuando mandamos el clic de despedir. mostramos el
     * modal y mandamos a consulta los checkbox que estan seleccionados. 
     */
    
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        
    });
    $("#btn_despedir").click(function () {
    
    /* Recorremos los checkbox y los guardmos en una lista */
    var listaEmpleados ="";
    $("input:checkbox:checked").each(function ()
    {
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
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
                          {
                 if(!$("#rfc").val().match(/^[a-zA-Z]{3,4}(\d{6})((\D|\d){3})?$/))
                 {
                  alert("RFC Invalido");
                 }
                 else
                 {
                 if($("#nombre").val().length<1)
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
                        }
                });
                       


 $("#btn_submit_editar").click(function()
                    {
                        var src="";
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
                          {
                 if(!$("#rfc").val().match(/^[a-zA-Z]{3,4}(\d{6})((\D|\d){3})?$/))
                 {
                  alert("RFC Invalido");
                 }
                 else
                 {
                 if($("#nombre").val().length<1)
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
                                                         src=$("#previewimage").attr("src");
                                                         //alert(src);
                                                    }
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
                                                                    $("form").attr("action", "/fg.com.mxCI/Index.php/empleado/actualizar_empleado");
                                                                    if(src!="")
                                                                    {
                                                                        $("#img_igual_div").html("<input class='form-control' name='img_igual' id='img_igual' style='display:none;' value= "+src+" >");
                                                                    }
                                                                    var a = $("#img_igual").val();
                                                                    
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

$("#btn_editar").click(function () {
    
    var listaEmpleados ="";
    var countEmpleado=0;
    $("input:checkbox:checked").each(function ()
    {
        countEmpleado++;
        listaEmpleados = listaEmpleados+$(this).val()+ ",";
    });
    if(listaEmpleados!="" && countEmpleado==1)
    {
    redirect_by_post('/fg.com.mxCI/Index.php/empleado/mostrar_actualizar_empleado', {
        lstEmpleado: listaEmpleados
    }, false);
    }
    else
    {
        if(countEmpleado >1)
        {
            alert('Solo puedes seleccionar un empleado');
        }
        else
        {
            alert("Selecciona un empledo");
        }
    }
    //relocate('/fg.com.mxCI/Index.php/empleado/mostrar_actualizar_empleado');
    //$().redirect('/fg.com.mxCI/Index.php/empleado/mostrar_actualizar_empleado', {lstEmpleado: listaEmpleados});
    //window.location="/fg.com.mxCI/Index.php/empleado/";
//   alert('editar');
});




function redirect_by_post(purl, pparameters, in_new_tab) {
    pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
    in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

    var form = document.createElement("form");
    $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
    if (in_new_tab) {
        $(form).attr("target", "_blank");
    }
    $.each(pparameters, function(key) {
        $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
    });
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);

    return false;
}


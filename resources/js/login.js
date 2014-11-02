/*
 * @Ubicacion: resources\js\login.js
 * @autor:     Irwin Flores
 * @Proposito: Este archivo contiene toda la funcionalidad de Javascript para las validaciones
 *             respectivas del login.
 *             
 */
$("#submit").click(function()
                    {
                        if($("#idEmpleado").val().length<1)
                        {
                            alert("Ingresa tu ID de Empleado.");
                        }
                        else
                        {
                            if($("#password").val().length<1)
                            {
                                alert("Ingresa tu Password");
                            }
                            else
                            {
                                var id=$("#idEmpleado").val();
                                var pass=$("#password").val();
                                validaLogin(id,pass);
                            }
                        }
                    }
            );

function validaLogin(id,pass)
{
    //window.location.href = "Index.php/login/validar_login";
    
   $.ajax("login/validar_login", {
            type: "post",   // usualmente post o get
            success: function(result) {
              if(result != 'null')
              {
                  //alert(result);
                  window.location.href = result;
              }
            },
            error: function(result) {
                alert("Error en la conexión!");
            },
        data: {idEmpleado:id,password:pass},
        async: true,
    });
}




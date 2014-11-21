                    <!--Datos Personales -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Datos Generales del Empleado
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Número de Empleado:</label>
                                        <p class="form-control" id="num_empleado"><?=$datos_empleado[0]['id']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nombre(s):</label>
                                        <p class="form-control"><?=$datos_empleado[0]['nombre']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Apellido Paterno:</label>
                                        <p class="form-control"><?=$datos_empleado[0]['apellido_pat']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Apellido Materno:</label>
                                        <p class="form-control"><?=$datos_empleado[0]['apellido_mat']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Actividades en la Empresa:
                                            <?php
                                                $estado_empleado= $datos_empleado[0]['estado'];
                                                if($estado_empleado == 1)
                                                {
                                                    echo "<font color='green'><b>Activo</b></font>";
                                                }
                                                else
                                                {
                                                    echo "<font color='red'><b>Inactivo</b></font>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label>Puesto: </label>
                                        <p class="form-control"><?=$datos_empleado[0]['nombre_puesto']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label>Sucursal: </label>
                                        <p class="form-control"><?=$datos_empleado[0]['nombre_suc']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label>Horario: </label>
                                        <p class="form-control"><?=$datos_empleado[0]['tipo']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label>Motivo de despido</label>
                                            <textarea class="form-control" rows="3" style="resize: none;" id="txt_motivo"><?=$datos_empleado[0]['motivo_despido']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                             <div class="col-lg-12 col-md-12">
                                 <center>
                                     <?php
                                     if($numEmpleado == 0)
                                     {
                                        // echo $maxEmpledos;
                                         
                                         if($maxEmpledos-1 > 1)
                                         {
                                         echo "<a id='link_siguiente'  href='javascript:mostrarEmpleado(".($numEmpleado+1).")' style='cursor: default;'>Siguiente</a>";
                                         }
                                     }
                                    else
                                     {
                                        if($numEmpleado == ($maxEmpledos-2))
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarEmpleado(".($numEmpleado-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";    
                                        }
                                        else
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarEmpleado(".($numEmpleado-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a id='link_siguiente' href='javascript:mostrarEmpleado(".($numEmpleado+1).")'   style='cursor: default;'>Siguiente</a>";
                                        }
                                     }
                                     ?>
                                 </center>
                                </div>
                        </div>
                    </div>
                <!--</div>-->
            
            <!-- /#wrapper -->

   <!-- </div>-->
    <!-- /#wrapper -->
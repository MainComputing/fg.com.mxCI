                    <!--Datos Personales -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Datos Generales de la Sucursal
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Número de Sucursal:</label>
                                        <p class="form-control" id="num_sucursal"><?=$datos_sucursal[0]['id']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nombre :</label>
                                        <p class="form-control"><?=$datos_sucursal[0]['nombre_suc']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Numero de Empleados:</label>
                                        <p class="form-control"><?=$datos_sucursal[0]['num_emp']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <CENTER><img src="<?php echo base_url().$datos_sucursal[0]['foto']; ?>" style="height:100%; width:100%; max-width:290px;"/></CENTER>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Domicilio
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label>Calle : </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['calle']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Num. Ext: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['num_ext']?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Num. Int: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['num_int']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Colonia: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['colonia']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>CP: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['cp']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Municipio: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['municipio']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Estado: </label>
                                        <p class="form-control"><?=$datos_sucursal[0]['estado']?></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                             <div class="col-lg-12 col-md-12">
                                 <center>
                                     <?php
                                     if($numSucursal == 0)
                                     {
                                        // echo $maxEmpledos;
                                         
                                         if($maxSucursales-1 > 1)
                                         {
                                         echo "<a id='link_siguiente'  href='javascript:mostrarSucursal(".($numSucursal+1).")' style='cursor: default;'>Siguiente</a>";
                                         }
                                     }
                                    else
                                     {
                                        if($numSucursal == ($maxSucursales-2))
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarSucursal(".($numSucursal-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";    
                                        }
                                        else
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarSucursal(".($numSucursal-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a id='link_siguiente' href='javascript:mostrarSucursal(".($numSucursal+1).")'   style='cursor: default;'>Siguiente</a>";
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
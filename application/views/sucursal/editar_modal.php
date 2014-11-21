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
                                        <p class="form-control" id="id_dir" style="display:none;"><?=$datos_sucursal[0]['id_dir']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nombre :</label>
                                        <input class="form-control" id="nombre" value="<?=$datos_sucursal[0]['nombre_suc']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Numero de Empleados:</label>
                                        <input class="form-control" id="numEmp" value="<?=$datos_sucursal[0]['num_emp']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <CENTER><img src="<?php echo base_url().$datos_sucursal[0]['foto']; ?>"/></CENTER>
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
                                        <input class="form-control" id="calle" value="<?=$datos_sucursal[0]['calle']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Num. Ext: </label>
                                        <input class="form-control" id="ext" value="<?=$datos_sucursal[0]['num_ext']?>">                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">                                
                                        <label>Num. Int: </label>
                                        <input class="form-control" id="int" value="<?=$datos_sucursal[0]['num_int']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Colonia: </label>
                                        <input class="form-control" id="col" value="<?=$datos_sucursal[0]['colonia']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>CP: </label>
                                        <input class="form-control" id="cp" value="<?=$datos_sucursal[0]['cp']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                     <div class="form-group">
                                            <label>Estado: </label>
                                             <p class="form-control" id="estado"><?=$datos_sucursal[0]['estado']?></p>
                                     </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                         <div class="form-group">
                                                 <label>Municipio: </label>
                                                <p class="form-control" id="estado"><?=$datos_sucursal[0]['municipio']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                         <div class="form-group">
                                                 <label id="msj"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </defaultiv>
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
                                         echo "<a id='link_siguiente'  href='javascript:mostrarInformacion(".($numSucursal+1).")' style='cursor: default;'>Siguiente</a>";
                                         }
                                     }
                                    else
                                     {
                                        if($numSucursal == ($maxSucursales-2))
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarInformacion(".($numSucursal-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";    
                                        }
                                        else
                                        {
                                        echo "<a id='link_anterior' href='javascript:mostrarInformacion(".($numSucursal-1).")'   style='cursor: default;'>Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo "<a id='link_siguiente' href='javascript:mostrarInformacion(".($numSucursal+1).")'   style='cursor: default;'>Siguiente</a>";
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
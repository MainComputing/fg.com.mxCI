           <?=form_open_multipart(base_url()."Index.php/sucursal/alta_sucursal")?>
                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="margin-bottom: 5px;">Agregar Sucursal</h1>
                        </div>
                    </div>
                    <div class="row" style="text-align: right">
                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <button type="button" class="btn btn-info" id="btn_submit">Guardar</button>
                            <button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
                        </div>
                    </div>
                    <!--Datos Sucursal-->
                    <div class="row">

                        <div class="col-lg-5 col-md-5">
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
                                        <input class="form-control"  name="num_sucursal" id="num_sucursal" placeholder="Ej. 00001" data-content="Número Sucursal no válido"/>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nombre :</label>
                                        <input class="form-control" name="nombre" id="nombre" placeholder="Ej. Madero" data-content="Nombre de la sucursal no válido"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Número de empleados :</label>
                                        <input class="form-control" name="num_empleados" id="num_empleados" placeholder="Ej. 25" data-content="Número de empleados no válido"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Dirección:</label>
                                        <input class="form-control" name="calle" id="calle" placeholder="Calle: (Ej. Díaz Suárez)" data-content="Dirección no válida"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <input class="form-control" name="num_ext" id="num_ext" placeholder="Núm. Ext. (120)" data-content="Número no válido" />    
                                        </div>
                                        <div class="col-lg-2 col-md-2"></div>
                                        <div class="col-lg-5 col-md-5">
                                            <input class="form-control" name="num_int" id="num_int" placeholder="Núm. Int. (10)"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="col" id="col"placeholder="Colonia: (San Cosme)" data-content="Nombre de la colonia no válido" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="cp" id="cp"placeholder="Codigo Postal:  (Ej. 20000)" data-content="Código No Válido"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">

                                            <div class="form-group">
                                                <label>Estado: </label>
                                                <select class="form-control" name="estado" id="estado" data-content="Seleccione un Estado">
                                                    <option value="--">Seleciona Estado</option>
                                                    <?php
                                                        if ($arr_estado != null) {
                                                            foreach ($arr_estado as $estado) {
                                                                
                                                                echo "<option value=".$estado.">" . $estado . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2"></div>
                                        <div class="col-lg-5 col-md-5">
                                            <div class="form-group">
                                                <label>Municipio: </label>
                                                <select class="form-control" name="municipio" id="municipio" data-content="Seleccione un Municipio">
                                                    <option value="--">Seleciona Municipio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-1 col-md-1" ></div>
                        <!--  FOTO SUCURSAL-->
                        <div class="col-lg-5 col-md-5">
                            <div class="col-lg-12 col-md-12">
                                <!-- Aqui va la foto-->
                                <div>
                                    <img id ="previewimage" src="/fg.com.mxCI/resources/img/previewsucursal.png"  class="img-thumbnail" style="height:100%; width:100%; max-width:290px;"/>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <label style="text-align: left;">Seleccionar Imagen:</label>
                                    <input id="imagen_sucursal" onchange="readURL(this);" type="file" name="archivo_imagen" data-content="Seleccione una Imagen">
                                </div>
                            </div>                                                                                 
                        </div>
                    </div>
                </div>
<button type="submit" id="subir_forma" style="display:none;"/>
            <?=form_close()?>
            <!-- /#wrapper -->

    </div>
    <!-- /#wrapper -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sucursal</h1>
            <div class="alert alert-info alert-dismissable" id="alerta" style="display:none;" >Seleccionar al menos una Sucursal.</div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- Comenzamos con la tabla para las sucursales -->
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            Relaci&oacute;n de Sucursales
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <button type="button" class="btn btn-outline btn-info" id='btn_info'>Info</button>
                            <button type="button" class="btn btn-outline btn-warning" id='btn_editar'>Editar</button>
                            <button type="button" class="btn btn-outline btn-danger" id="btn_eliminar">Eliminar</button>
                        </div>
                        <!--<div class="col-lg-3 col-md-3">
                                <input type="text" class="form-control" placeholder="Buscar..." id="buscar">                            
                        </div>-->
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-success" id="btn_agregar">Agregar Sucursal</button>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Domicilio</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>
                                    <th>Numero de Empleados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //print_r($empleados);
                                if ($sucursales != null) {
                                    foreach ($sucursales as $sucursal) {
                                        $inte='';
                                        if($sucursal['num_int']==null)
                                            $sucursal['num_int']='';
                                        else
                                            $inte='  Int : '.$sucursal['num_int'];

                                        echo "<tr class='odd gradeX'>"
                                        . "<td><input type='radio' name='sucursal' value=" . $sucursal['id'] . "></td>"
                                        . "<td>" . $sucursal['nombre_suc'] . "</td>"
                                        . "<td> " . $sucursal['calle']." #".$sucursal['num_ext']." ".$inte. ", Col. ".$sucursal['colonia'].", C.P: ".$sucursal['cp']."</td>"
                                        . "<td>" . $sucursal['municipio'] . "</td>"
                                        ."<td>" . $sucursal['estado'] . "</td>"
                                        ."<td><center>" . $sucursal['num_emp'] . "</center></td>"
                                        . "";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="show_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" id="modal_content">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="tituloModal">Raz&oacute;n de Despido:</h4>
                                </div>
                                <div class="modal-body" id="cuerpo_modal">
                                    <textarea class="form-control" style="min-height:160px; max-height: 160px; max-width: 568px;" rows="3" placeholder="Escribe una breve explicaci&oacute;n del despido." ></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_cerrar">Cerrar</button>
                                    <button type="button" class="btn btn-danger" id="btn_guardar">Eliminar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="modal fade" id="show_modal_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" id="modal_content_info">
                                     <h4 class="modal-title" id="tituloModalInfo">Información Sucursal</h4>
                                </div>
                                <div class="modal-body" id="cuerpo_modal_info">
            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_cerrar">Cerrar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="modal fade" id="show_modal_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" id="modal_content_editar">
                                     <h4 class="modal-title" id="tituloModalEditar">Información Sucursal</h4>
                                </div>
                                <div class="modal-body" id="cuerpo_modal_editar">
            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_cerrar">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Botón oculto que sirve para disparar el model de bootstrap-->
 <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#show_modal"  id="modal" style="display:none;"/>
 <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#show_modal_info"  id="modal_info" style="display:none;"/>
 <button type="button" class="btn btn-outline btn-danger" data-toggle="modal" data-target="#show_modal_editar"  id="modal_editar" style="display:none;"/>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Empleados</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- Comenzamos con la tabla para los empleados -->
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            Relaci&oacute;n de empleados
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <button type="button" class="btn btn-outline btn-info" id='btn_info'>Info</button>
                            <button type="button" class="btn btn-outline btn-warning" id='btn_editar'>Editar</button>
                            <button type="button" class="btn btn-outline btn-danger" id="btn_despedir">Despedir</button>
                            <button type="button" class="btn btn-outline btn-success" id="btn_agregar_curso" >Asignar Curso</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-success" id="btn_agregar">Agregar Empleado</button>
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
                                    <th>Nombre(s)</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Sucursal</th>
                                    <th>Estado Actual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //print_r($empleados);
                                if ($empleados != null) {
                                    foreach ($empleados as $empleado) {
                                        $estado="<font color='green'><b>Activo</b></font>";
                                        if($empleado['estado'] == 0)
                                        {
                                            $estado="<font color='red'><b>Inactivo</b></font>";
                                        }
                                        
                                        echo "<tr class='odd gradeX'>"
                                        . "<td><input type='checkbox' value=" . $empleado['id'] . "></td>"
                                        . "<td>" . $empleado['nombre'] . "</td>"
                                        . "<td>" . $empleado['apellido_pat'] . "</td>"
                                        . "<td>" . $empleado['apellido_mat'] . "</td>"
                                        . "<td><CENTER>" . $empleado['nombre_suc'] . "</CENTER></td>"
                                        . "<td><CENTER>" . $estado . "</CENTER></td>"        
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
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cerrar">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
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
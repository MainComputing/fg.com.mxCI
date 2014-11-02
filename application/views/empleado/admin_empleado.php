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
                                <div class="col-lg-6 col-md-6">
                                    Relaci&oacute;n de empleados
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <button type="button" class="btn btn-outline btn-info" id='button_info'>Info</button>
                                    <button type="button" class="btn btn-outline btn-warning" id='button_editar'>Editar</button>
                                    <button type="button" class="btn btn-outline btn-danger" id='button_despedir'>Despedir</button>
                                    <button type="button" class="btn btn-outline btn-success" id="button_agregar" >Asignar Curso</button>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <button type="button" class="btn btn-success">Agregar Empleado</button>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //print_r($empleados);
                                        if ($empleados != null) {
                                            foreach ($empleados as $empleado) {
                                                echo "<tr class='odd gradeX'>"
                                                . "<td><input type='checkbox' value=" . $empleado['id'] . "></td>"
                                                . "<td>" . $empleado['nombre'] . "</td>"
                                                . "<td>" . $empleado['apellido_pat'] . "</td>"
                                                . "<td>" . $empleado['apellido_mat'] . "</td>"
                                                . "<td><CENTER>" . $empleado['nombre_suc'] . "</CENTER></td>"
                                                . "";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
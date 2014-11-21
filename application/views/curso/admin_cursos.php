<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cursos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- Comenzamos con visualizar todos los cursos existentes -->
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            Relaci&oacute;n de cursos
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <button type="button" class="btn btn-outline btn-warning" id='btn_editar'>Editar</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-success">Agregar Curso</button>
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
                                    <th>ID Curso</th>
                                    <th>Nombre Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cursos != null) {
                                    foreach ($cursos as $curso) {
                                        echo "<tr class='odd gradeX'>"
                                        . "<td><input type='radio' name='cursomod' value=" . $curso['id'] . "></td>"
                                        . "<td>" . $curso['id'] . "</td>"
                                        . "<td>" . $curso['nombre'] . "</td>"
                                        . "";
                                    }
                                }else{
                                    echo "cursos es nulo =/";
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
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
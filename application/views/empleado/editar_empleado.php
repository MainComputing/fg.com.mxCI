<?= form_open_multipart(base_url() . "Index.php/empleado/alta_empleado") ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="margin-bottom: 5px;">Agregar Empleado</h1>
        </div>
    </div>
    <div class="row" style="text-align: right">
        <div class="col-lg-12" style="padding-bottom: 10px;">
            <button type="button" class="btn btn-info" id="btn_submit_editar">Guardar</button>
            <button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
        </div>
    </div>
    <!--Datos Personales -->
    <div class="row">

        <div class="col-lg-5 col-md-5">
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
                        <input class="form-control" placeholder="Ej. 00001" value=<?= $datos_empleado[0]['id'] ?> disabled/>
                        <input class="form-control"  name="num_empleado" id="num_empleado" style='display:none;' value=<?= $datos_empleado[0]['id'] ?> />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>RFC:</label>
                        <input class="form-control" name="rfc" id="rfc" placeholder="Ej. CUPU800825569"value="<?= $datos_empleado[0]['rfc'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Nombre(s):</label>
                        <input class="form-control" name="nombre" id="nombre" placeholder="Ej. Ulises" value=<?php echo "'".$datos_empleado[0]['e_nombre']."'" ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Apellido Paterno:</label>
                        <input class="form-control" name="ap_pat" id="ap_pat" placeholder="Ej. Cuevas" value=<?= "'".$datos_empleado[0]['apellido_pat']."'" ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Apellido Materno:</label>
                        <input class="form-control" name="ap_mat" id="ap_mat" placeholder="Ej. Pérez" value=<?= "'".$datos_empleado[0]['apellido_mat']."'" ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Edad:</label>
                        <input class="form-control" name="edad" id="edad" placeholder="Ej. 25" value=<?= $datos_empleado[0]['edad'] ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Dirección:</label>
                        <input class="form-control" name="calle" id="calle" placeholder="Calle: (Ej. Díaz Suárez)" value=<?= "'".$datos_empleado[0]['calle']."'" ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <input class="form-control" name="num_int" id="num_int" placeholder="Núm. Int. (10)" value = <?= $datos_empleado[0]['num_int'] ?>>
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-5 col-md-5">
                            <input class="form-control" name="num_ext" id="num_ext" placeholder="Núm. Ext. (120)" value = <?= $datos_empleado[0]['num_ext'] ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"><br></div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <input class="form-control" name="col" id="col"placeholder="Colonia: (San Cosme)" value =<?= "'".$datos_empleado[0]['colonia']."'" ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">

                            <div class="form-group">
                                <label>Estado: </label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="--">Seleciona Estado</option>
                                    <?php
                                    if ($arr_estado != null) {
                                        foreach ($arr_estado as $estado) {
                                            if ($estado == $datos_empleado[0]['estado_nombre']) {
                                                echo "<option value='" . $estado . "' selected='selected'>" . $estado . "</option>";
                                            } else {
                                                echo "<option value='" . $estado . "'>" . $estado . "</option>";
                                            }
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
                                <select class="form-control" name="municipio" id="municipio">
<?php
foreach ($arr_municipio as $municipio) {
    if ($municipio == $datos_empleado[0]['mun_nombre']) {
        echo "<option value='" . $municipio . "' selected='selected'>" . $municipio . "</option>";
    } else {
        echo "<option value='" . $municipio . "'>" . $municipio . "</option>";
    }
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-1 col-md-1" ></div>
        <!--  DATOS DE LA EMPRESA -->
        <div class="col-lg-5 col-md-5">
            <div class="col-lg-12 col-md-12">
                <!-- Aqui va la foto-->
                <div>
                    <img id ="previewimage" src=<?= $datos_empleado[0]['foto'] ?> class="img-thumbnail" style="max-width:290px;"/>
                </div>
                <div class="form-group" style="text-align: center;">
                    <label>Seleccionar Imagen:</label>
                    <input id="imagen_empleado" onchange="readURL(this);" type="file" name="archivo_imagen">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12" style="padding-top: 26px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Actividades en la Empresa
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="form-group">
                        <label>Puesto: </label>
                        <select class="form-control" name="puesto" id="puesto">
                            <option value="--">Seleciona un Puesto</option>
<?php
if ($arr_puesto != null) {
    foreach ($arr_puesto as $puesto) {
        if ($puesto == $datos_empleado[0]['puesto_nombre']) {
            echo "<option selected='selected'>" . $puesto . "</option>";
        } else {
            echo "<option>" . $puesto . "</option>";
        }
    }
}
?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="form-group">
                        <label>Sucursal: </label>
                        <select class="form-control" name="sucursal" id="sucursal">
                            <option value="--">Seleciona una Sucursal</option>
<?php
if ($arr_sucursal != null) {
    foreach ($arr_sucursal as $sucursal) {
        if ($sucursal == $datos_empleado[0]['nombre_suc']) {
            echo "<option selected='selected'>" . $sucursal . "</option>";
        } else {
            echo "<option>" . $sucursal . "</option>";
        }
    }
}
?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="form-group">
                        <label>Horario: </label>
                        <select class="form-control" name="horario" id="horario">
                            <option value="--">Seleciona un Horario</option>
                            <?php
                            if ($arr_horario != null) {
                                foreach ($arr_horario as $horario) {
                                    if ($horario == $datos_empleado[0]['tipo']) {
                                        echo "<option selected='selected'>" . $horario . "</option>";
                                    } else {
                                        echo "<option>" . $horario . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="img_igual_div">
        <input class='form-control' name='img_igual' id='img_igual' style='display:none;' value="" >
    </div>
</div>

<button type="submit" id="subir_forma" style="display:none;"/>
                            <?= form_close() ?>
<!-- /#wrapper -->
</div>
<!-- /#wrapper -->


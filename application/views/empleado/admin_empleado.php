<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empleados - Sistema Administrador de Empleados</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>resources/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>resources/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>resources/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       
    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>resources/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header" style="padding-top: 7px;padding-left: 5px;"><img src="../resources/img/cirlogo.png"/></div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sistema Administrador <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de Empleados</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" style="width: 85px;">
                            <?php
                                echo $_SESSION['nombre_usuario'];
                            ?>
                        </i>  
                        <i class="fa fa-caret-down">
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraci&oacute;n</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/fg.com.mx/login.html"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-top: 76px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/fg.com.mx/view/"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                         <li>
                            <a href="/fg.com.mx/view/empleado/admin_empleado.php"><i class="fa fa-sitemap fa-fw"></i> Administrar Empleados</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Administrar Sucursales</a>
                            <ul class="nav nav-second-level">
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Administrar Cursos</a>
                            <ul class="nav nav-second-level">
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>           
                        <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Generar Reporte</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox"></td>
                                            <td>Juan</td>
                                            <td>Pérez</td>
                                            <td>Hernández</td>
                                            <td class="center">Madero</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!--<div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>-->
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

    <!-- jQuery Version 1.11.0 -->
    <script href="<?php echo base_url(); ?>resources/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script href="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script href="<?php echo base_url(); ?>resources/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script href="<?php echo base_url(); ?>resources/js/sb-admin-2.js"></script>
    
     <!-- DataTables JavaScript -->
    <script href="<?php echo base_url(); ?>resources/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script href="<?php echo base_url(); ?>resources/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        /*Eliminamos el sorting de las accion*/
        $('#th_action').removeClass("sorting");
    });
    $("#button_editar").click(function(){
        window.location.replace("/fg.com.mx/view/empleado/modificar_empleado.php");
	});
    $("#button_agregar").click(function(){
        window.location.replace("/fg.com.mx/view/empleado/insertar_empleado.php");
	});
    $("#button_info").click(function(){
        window.open("/fg.com.mx/view/empleado/consultar_empleado.php","","width=500,height=600");
	});
    $("#button_despedir").click(function(){
        //window.open();
        window.open("/fg.com.mx/view/empleado/despedir_empleado.php","","width=400,height=305","_blank","toolbar=no, scrollbars=no, resizable=no, top=700, left=700, width=700, height=700");
	});
    </script>
</body>

</html>


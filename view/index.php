<?php
session_start();
if (!isset($_SESSION['S_ID'])) {
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SELEGAL | INICIO</title>
  <link rel="shortcut icon" href="img/Logo2.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">

  <link rel="stylesheet" type="text/css" href="../utilitario/DataTables/datatables.min.css" />

  <!---select-->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link"><i class="fas fa-home"></i> INICIO</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-circle">&nbsp</i>
            <?php echo (strtoupper(($_SESSION['S_USU']))); ?>&nbsp
            <i class="fas fa-caret-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Administracion</span>
            <div class="dropdown-divider"></div>
            <a href="../controller/usuario/controlador_cerrar_sesion.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i> Cerrar Sesion
            </a>
            <a onclick="cargar_contenido('contenido_principal','usuario/configuracion.php')" class="dropdown-item">
              <i class="fas fa-user-cog"></i> Configuración
            </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="img/selegal.jpg" alt="Selegal Logo" class="brand-image img-circle elevation-3" title="SELEGAL">
        <span class="brand-text font-weight-light">SELEGAL</span>

      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image center">
            <br>
            <img src="img/selegal.jpg" class="img-circle" alt="Usuario" title="Usuario" id="img_img" style="width: 50px; height: 50px;">
          </div>
          <div class="info">
            <center>
              <b>
                <a onclick="cargar_contenido('contenido_principal','usuario/configuracion.php')" class="d-block" id="usuario_nom"></a>
                <a class="d-block" id="area"> </a>
              </b>
              <a class="d-block" id="area" style="text-align:center;"><?php echo ($_SESSION['S_ROL']); ?>&nbsp </a>
            </center>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <a href="index.php" class="form-control form-control-sidebar " style="background: #050725; text-align:center; border-radius: 30px; ">HOME &nbsp &nbsp<i class="fas fa-home"></i></a>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--///ADMINISTRADOR-->
            <?php if ($_SESSION['S_ROL'] == 'Administrador') { ?>

              <!-- ///PROCESOS ACTIVOS Y FINALLIZADOS -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>
                    PROCESOS POR INSTITUCIONES
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_penal.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>PENAL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_civil.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>CIVIL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_transito.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>TRANSITO</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_home.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>HOME INMOBILIARIA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_laboral.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>LABORAL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/procesos/proceso_institucion/view_procesos_laboral.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> FAMILIA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/procesos/proceso_institucion/view_procesos_constitucional.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> CONSTITUCIONAL</p>
                    </a>
                  </li>

                </ul>
              </li>
              <!-- ///PROCESOS ACTIVOS Y FINALLIZADOS -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>
                    PROCESOS
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos_activos.php')" class="nav-link">
                      <i class="fas fa-file-contract nav-icon"></i>
                      <p>Procesos Activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos_finalizados.php')" class="nav-link">
                      <i class="fas fa-file-excel nav-icon"></i>
                      <p>Procesos Finalizados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos.php')" class="nav-link">
                      <i class="fas fa-file-alt nav-icon"></i>
                      <p>Todos los Procesos</p>
                    </a>
                  </li>

                </ul>
              </li>
              <!--///LISTADO DE PROCESOS-->
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos.php')" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>
                    TODOS LOS PROCESOS
                  </p>
                </a>
              </li>

              <!--///INSTITUCIONES-->
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','institucion/view_institucion.php')" class="nav-link">
                  <i class="fas fa-city nav-icon"></i>
                  <p>
                    INSTITUCIONES
                  </p>
                </a>
              </li>
              <!--///USUARIOS-->
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','usuario/view_usuario.php')" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    USUARIOS
                  </p>
                </a>
              </li>
            <?php } ?>
            <!--///SECRETARIO-->
            <?php if ($_SESSION['S_ROL'] == 'Secretario') { ?>
              <!-- ///PROCESOS ACTIVOS Y FINALLIZADOS -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>
                    PROCESOS
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos_activos.php')" class="nav-link">
                      <i class="fas fa-file-contract nav-icon"></i>
                      <p>Procesos Activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos_finalizados.php')" class="nav-link">
                      <i class="fas fa-file-excel nav-icon"></i>
                      <p>Procesos Finalizados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos.php')" class="nav-link">
                      <i class="fas fa-file-alt nav-icon"></i>
                      <p>Todos los Procesos</p>
                    </a>
                  </li>

                </ul>
              </li>
              <!--///LISTADO DE PROCESOS-->
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','procesos/view_procesos.php')" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>
                    PROCESOS
                  </p>
                </a>
              </li>
            <?php } ?>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <input type="text" id="txtprincipalid" value="<?php echo $_SESSION['S_ID']; ?>" hidden>
    <input type="text" id="txtprincipalusu" value="<?php echo $_SESSION['S_USU']; ?>" hidden>
    <input type="text" id="txtprincipalrol" value="<?php echo $_SESSION['S_ROL']; ?>" hidden>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="contenido_principal">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-1" style="text-align: center;">
              <img src="img/Logo2.png" class="img-circle" width="50" height="50">
            </div><!-- /.col -->
            <div class="col-sm-10">
              <h1 class="m-0"> BIENBENIDO AL SISTEMA DE PROCESOS </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <!-- /.col-md-6 -->
                    <!-- ADMINISTRADOR -->
                    <?php if ($_SESSION['S_ROL'] == 'Administrador') { ?>
                      <!-- INGRESAR PROCESO-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-success" onclick="cargar_contenido('contenido_principal','procesos/view_proceso_registro.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_ingreso_a"><i class="fas fa-plus"></i> </h3>
                            <p>INGRESAR PROCESO</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-file-medical"></i>
                          </div>
                          <a class="small-box-footer">
                            Ingresar Nuevo Proceso <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>


                      <!-- PENAL-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_penal.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></h3>
                            <p>PENAL</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Penales <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- CIVIL-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-info" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_civil.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></i></h3>
                            <p>CIVIL</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Civil <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- TRANSITO-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_transito.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></h3>
                            <p>TRANSITO</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos de Transito <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- HOME INMOBILIARIA-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_home.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></h3>
                            <p>HOME INMOBILIARIA</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Home Inmobiliaria <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- LABORAL-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-purple" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_laboral.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></h3>
                            <p>LABORAL</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Laboral <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- FAMILIAR-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-lightblue" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_familiar.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></h3>
                            <p>FAMILIAR</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Familiar <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- CONSTITUCIONAL-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal" onclick="cargar_contenido('contenido_principal','procesos/proceso_institucion/view_procesos_constitucional.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-balance-scale"></i></i></h3>
                            <p>CONSTITUCIONAL</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Procesos Constitucional <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>


                      <!-- USUARIOS REGISTRADOS-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning" onclick="cargar_contenido('contenido_principal','usuario/view_usuario.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="nav-icon fas fa-users"></i></h3>
                            <p>USUARIOS REGISTRADOS </p>
                          </div>
                          <div class="icon">
                            <i class="nav-icon fas fa-users"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver usuarios <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <!-- INSTITUCIONES-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning" onclick="cargar_contenido('contenido_principal','usuario/view_usuario.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-city nav-icon"></i></i></h3>
                            <p>INSTITUCIONES</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-city nav-icon"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Institucines <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                    <?php } ?>

                    <!-- SECRETARIO -->
                    <?php if ($_SESSION['S_ROL'] == 'Secretario') { ?>
                      <!-- INGRESAR PROCESO-->
                      <div class="col-lg-3 col-6">

                        <div class="small-box bg-success" onclick="cargar_contenido('contenido_principal','procesos/view_proceso_registro.php')" style="cursor: pointer;">

                          <div class="inner">
                            <h3 id="lbl_ingreso_a"><i class="fas fa-plus"></i> </h3>
                            <p>INGRESAR PROCESO</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-file-medical"></i>
                          </div>
                          <a class="small-box-footer">
                            Ingresar Nuevo Proceso <i class="fas fa-arrow-circle-right"></i>
                          </a>

                        </div>

                      </div>
                      <!-- INSTITUCIONES-->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary" onclick="cargar_contenido('contenido_principal','usuario/view_usuario.php')" style="cursor: pointer;">
                          <div class="inner">
                            <h3 id="lbl_institucio"><i class="fas fa-city"></i></h3>
                            <p>INSTITUCIONES</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-city"></i>
                          </div>
                          <a class="small-box-footer">
                            Ver Institucines <i class="fas fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>
                    <?php } ?>
                    <!-- /.col-md-6 -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        SELAGAL
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2024</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <script>
    function cargar_contenido(id, vista) {
      $("#" + id).load(vista);
    }

    var idioma_espanol = {
      select: {
        rows: "%d fila seleccionada"
      },
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ning&uacute;n dato disponible en esta tabla",
      "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
      "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "<b>No se encontraron datos</b>",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }

    function soloNumeros(e) {
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla == 8) {
        return true;
      }
      // Patron de entrada, en este caso solo acepta numeros
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";
      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }
      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
      }

    }

    function filterFloat(evt, input) {
      var key = window.Event ? evt.which : evt.keyCode;
      var chark = String.fromCharCode(key);
      var tempValue = input.value + chark;
      if (key >= 48 && key <= 57) {
        if (filter(tempValue) === false) {
          return false;
        } else {
          return true;
        }
      } else {
        if (key == 8 || key == 13 || key == 0) {
          return true;
        } else if (key == 46) {
          if (filter(tempValue) === false) {
            return false;
          } else {
            return true;
          }
        } else {
          return false;
        }
      }
    }
  </script>
  <!-- jQuery -->
  <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
  <script src="../js/console_usuario.js?rev=<?php echo time(); ?>"></script>
  <script>
    window.onload = datosusuario();
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../plantilla/dist/js/adminlte.min.js"></script>


  <script type="text/javascript" src="../utilitario/DataTables/datatables.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!---select-->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    //////========Para los contadores 
    Traer_widget();
    Traer_widget2();
  </script>

</html>
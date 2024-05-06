<!-- Content Header (Page header) -->
<script src="../js/console_proceso.js?rev=<?php echo time(); ?>"></script>
<link rel="stylesheet" href="../view/css/style.css">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-1">
        <img src="img/Logo2.png" class="img-circle" width="50" height="50">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <h1 class="m-0">LISTADO DE PROCESO PENAL</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item active">Proceso Penal</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- /.col-md-6 -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title"> Listado de Proceso Penal</h5>
            <button class="btn btn-danger btn-sm float-right" onclick="cargar_contenido('contenido_principal','procesos/view_proceso_registro.php')"> <i class="fas fa-plus"></i>&nbsp Nuevo Registro</button>
          </div>
          <div class="card-body">
            <!---/////////////////////////////-->
            <table id="tabla_proceso" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>INSTITUCION</th>



                </tr>
              </thead>

            </table>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>



<!--MODAL DE EDITAR   -->
<?php include("../modal/modal_editar.php"); ?>

<!-- MODAL DE  ABONO  -->
<?php include("../modal/modal_abono.php"); ?>
<!-- FIN MODAL ABONO -->

<!-- MODAL DE  extras  -->
<?php include("../modal/modal_extra.php"); ?>
<!-- FIN MODAL extras -->

<!-- MODAL MAS -->
<?php include("../modal/modal_mas.php"); ?>

<script>
  $(document).ready(function() {
    listar_proceso_Institucion(1);
  });
</script>
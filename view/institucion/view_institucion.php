<!-- Content Header (Page header) -->
<script src="../js/console_institucion.js?rev=<?php echo time(); ?>"></script>
<link rel="stylesheet" href="../view/css/style.css">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-1">
        <img src="img/Logo2.png" class="img-circle" width="50" height="50" alt="selegal">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <h1 class="m-0">INSTITUCION</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item active">Institucion</li>
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
            <h5 class="card-title">Listado de Instituciones </h5>
            <button class="btn btn-danger btn-sm float-right" onclick="AbrirRegistro()"> <i class="fas fa-plus"></i>
              Nuevo Registro</button>
          </div>
          <div class="card-body">
            <!---/////////////////////////////-->
            <table id="tabla_institucion" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>NOMBRE DE LA INSTITUCION</th>
                  <th>ACCIÓN </th>
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
<!-- Modal DE REGISTRO  -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR INSTITUCION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="">NOMBRE DE LAINSTITUCION</label>
            <input type="text" class="form-control" id="txt_institucion">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Institucion()">REGISTRAR</button>
      </div>
    </div>
  </div>
</div>


<!--MODAL DE EDITAR   -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR DATOS DE LA INSTITUCION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="">NOMBRE DE LA INSTITUCION</label>
            <input type="text" class="form-control" id="txt_institucion_editar">
            <input type="text" id="txt_idinstitucion" hidden>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Institucion()">MODIFICAR</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    listar_institucion();
  });

  $('modal_registro').on('shown.bs.modal', function() {
    $('#txt_institucion').trigger('focus')
  })
</script>
<!-- Content Header (Page header) -->
<script src="../js/console_usuario.js?rev=<?php echo time(); ?>"></script>
<link rel="stylesheet" href="../view/css/style.css">

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-1">
        <img src="img/Logo2.png" class="img-circle" width="50" height="50">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <h1 class="m-0">ADMINISTRACIÓN DE USUARIOS</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">INICIO</a></li>
          <li class="breadcrumb-item active">Usuario</li>
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
            <h5 class="card-title">Listado de Usuario</h5>
            <button class="btn btn-danger btn-sm float-right" onclick="AbrirRegistro()"> <i class="fas fa-plus"></i>
              Nuevo Registro
            </button>
          </div>
          <div class="card-body">
            <!---/////////////////////////////-->
            <table id="tabla_usuario" class="display compact" style="width:100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>USUARIO</th>
                  <th>NOMBRES</th>
                  <th>ROL</th>
                  <th>MAS DATOS</th>
                  <th>ESTATUS</th>
                  <th>ACCIÓN</th>
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
<!-- MODAL DE REGISTRO  -->
<div class="modal fade" id="modal_registro" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <label for="" style="font-size:small;">N° de Cedula</label>
            <input type="text" class="form-control" id="txt_nro" onkeypress="return soloNumeros(event)" minlength="10" maxlength="10">
          </div>
          <div class="col-8">
            <label for="" style="font-size:small;">Nombres</label>
            <input type="text" class="form-control" id="txt_nom" onkeypress="return soloLetras(event)">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Apellidos</label>
            <input type="text" class="form-control" id="txt_apepa" onkeypress="return soloLetras(event)">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Correo Electronico</label>
            <input type="email" class="form-control" id="txt_email">
          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">Usuario</label>
            <input type="text" class="form-control" id="txt_usu">
          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">Contraseña</label>
            <input type="password" class="form-control" id="txt_con">
            <input type="checkbox" onclick="myFuction()">&nbsp Ver Contraseña
          </div>

          <div class="col-4">
            <label for="" style="font-size:small;">Rol</label>
            <select class="form-control" id="select_rol">
              <option value="Secretario">SECRETARIO</option>
              <option value="Administrador">ADMINISTRADOR</option>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Usuario()">REGISTRAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DE REGISTRO  -->

<!-- MODAL DE EDITAR  -->
<div class="modal fade" id="modal_editar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR DATOS DEL USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <input type="text" id="txt_idempleado" hidden>
            <label for="" style="font-size:small;">Número de Cédula</label>
            <input type="text" class="form-control" id="txt_cedula_editar" onkeypress="return soloNumeros(event)" minlength="10" maxlength="10">
          </div>

          <div class="col-8">
            <label for="" style="font-size:small;">Nombres</label>
            <input type="text" class="form-control" id="txt_nom_editar" onkeypress="return soloLetras(event)">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Apellidos</label>
            <input type="text" class="form-control" id="txt_apepa_editar" onkeypress="return soloLetras(event)">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Correo Electronico</label>
            <input type="email" class="form-control" id="txt_email_editar">
          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">Usuario</label>
            <input type="text" class="form-control" id="txt_usu_editar">
            <input type="text" id="txt_idusuario">
          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">Rol</label>
            <select class="form-control" id="select_rol_editar">
              <option value="Secretario">SECRETARIO</option>
              <option value="Administrador">ADMINISTRADOR</option>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Usuario()">MODIFICAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DE EDITAR  -->

<!-- MODAL DE EDITAR CONTRASEÑA  -->
<div class="modal fade" id="modal_contra" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="">Contraseña</label>
            <input type="password" class="form-control" id="txt_contra_nueva">

            <input type="checkbox" onclick="myFuction()">&nbsp Ver Contraseña

            <input type="text" id="txt_idusuario_contra" hidden>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Usuario_Contra()">MODIFICAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DE EDITAR CONTRASEÑA  -->

<!-- MODAL DE MAS DATOS   -->
<div class="modal fade" id="modal_mas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lbl_titulo_2"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 ">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                      INFORMACIÓN </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="row">
                      <div class="col-4 form-group">
                        <label for="" style="font-size:small;">Número de Cedula</label>
                        <input type="text" class="form-control" id="txt_dni_mas" readonly style="background-color:white">
                      </div>
                      <div class="col-8 form-group">
                        <label for="" style="font-size:small;">Nombres y Apellidos </label>
                        <input type="text" class="form-control" id="txt_nom_mas" readonly style="background-color:white">
                      </div>
                      <div class="col-4 form-group">
                        <label for="" style="font-size:small;">Correo Electronico</label>
                        <input type="text" class="form-control" id="txt_email_mas" readonly style="background-color:white">
                      </div>
                      <div class="col-4 form-group">
                        <label for="" style="font-size:small;">Usuario</label>
                        <input type="text" class="form-control" id="txt_usuario_mas" readonly style="background-color:white">
                      </div>
                      <div class="col-4">
                        <label for="" style="font-size:small;">Rol</label>
                        <input type="text" class="form-control" id="txt_rol_mas" readonly style="background-color:white">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL  MAS DATOS  -->
<script>
  $(document).ready(function() {
    listar_usuario();
    $('.js-example-basic-single').select2();
    Cargar_Select_Area();
  });
  $('modal_registro').on('shown.bs.modal', function() {
    $('#txt_nro').trigger('focus')
  })
</script>

<script>
  function myFuction() {
    var x = document.getElementById("txt_contra_nueva");
    var y = document.getElementById("txt_con");

    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
</script>
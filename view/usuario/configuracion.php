<script src="../js/console_usuario_datos.js?rev=<?php echo time(); ?>"></script>

<script>
  window.onload = datosusuario();
</script>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-1">
        <img src="img/Logo2.png" class="img-circle" width="50" height="50">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <h1 class="m-0">CONFIGURACIÓN DE MI CUENTA </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-12">
  <div class="row">
    <div class="col-md-12" id="modal_tra_usu">
      <div class="card card-danger">
        <div class="card-header">

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 form-group">
                  <label for="" style="font-size:small;">NOMBRES</label>
                  <input type="text" class="form-control" id="txt_nom_usu">
                  <input type="text" class="form-control" id="txt_idi_usu" hidden>
                </div>
                <div class="col-6 form-group">
                  <label for="" style="font-size:small;"> APELLIDOS</label>
                  <input type="text" class="form-control" id="txt_ape_usu">

                </div>
                <div class="col-4 form-group">
                  <label for="" style="font-size:small;">Número de Cedula</label>
                  <input type="text" class="form-control" id="txt_dni_usu">
                </div>
                <div class="col-5 form-group">
                  <label for="" style="font-size:small;">Correo Electrónico</label>
                  <input type="text" class="form-control" id="txt_email_usu">
                </div>
                <div class="col-3 form-group">
                  <label for="" style="font-size:small;">Usuario</label>
                  <input type="text" class="form-control" id="txt_usu_exitente_1" readonly style="background-color:white">
                </div>
                <div class="col-2 form-group">
                  <br>
                  <button class="btn btn-outline-danger" id="usuario" onclick="AbrirRegistro()">CANBIAR USUARIO</button>
                </div>
                <div class="col-2 form-group">
                  <br>
                  <button class="btn btn-outline-danger" id="contra" onclick="AbrirRegistro1()">CANBIAR
                    CONTRASEÑA</button>
                </div>
                <div class="col-12 form-group" style="text-align:center">
                  <br>
                  <button onclick="Modificar_Empleado()" class="btn btn-outline-success" id="modificar">MODIFICAR
                    DATOS</button>
                </div>


              </div>

            </div>





          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE EDITAR  -->
<div class="modal fade" id="modal_registro" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="txt_usu_exitente" readonly style="background-color:white">
          </div>
          <div class=" col-12">
            <label for="">Nuevo Usuario</label>
            <input type="text" class="form-control" id="txt_usu_editar">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_datos()">MODIFICAR</button>
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
<script>
  $('modal_contra').on('shown.bs.modal', function() {
    $('#txt_contra').trigger('focus')
  })
</script>
<script>
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
</script>
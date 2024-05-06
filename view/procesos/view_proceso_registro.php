<?php
session_start();
?>
<script src="../js/console_proceso.js?rev=<?php echo time(); ?>"></script>


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-1">
        <img src="img/Logo2.png" class="img-circle" width="50" height="50">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <h1 class="m-0">REGISTRO DE PROCESO</h1>


      </div><!-- /.col -->
      <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item active">Registro de Proceso</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-12">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> <b>REGISTRO DEL PROCESO</b> </h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="select_institucion" style="font-size:small;">Institucion</label>
              <select class="js-example-basic-single" id="select_institucion" style="width:100%">
              </select>
              <input type="text" id="txt_idusu" value="<?php echo (isset($_SESSION['S_ID']) ? strtoupper($_SESSION['S_ID']) : ''); ?>" hidden>
            </div>

            <div class="col-3">
              <label for="" style="font-size:small;">Subinstitucion</label>
              <select class="form-control" id="select_subinstitucion">
                <option value="Municipio">Municipio</option>
                <option value="Registro de la propiedad">Registro de la propiedad</option>
                <option value="Notaría">Notaría</option>
              </select>
            </div>
            <div class="col-6 form-group">
              <label for="txt_ndocumento" style="font-size:small;">Número de Proceso</label>
              <input type="text" class="form-control" id="txt_ndocumento">
            </div>
            <div class="col-6 form-group">
              <label for="txt_tipoinfraccion" style="font-size:small;">Tipo de infraccion</label>
              <input type="text" class="form-control" id="txt_tipoinfraccion">
            </div>
            <div class="col-6 form-group">
              <label for="txt_cliente" style="font-size:small;">Nombres y apellidos del Cliente</label>
              <input type="text" class="form-control" id="txt_cliente">
            </div>
            <div class="col-6 form-group">
              <label for="txt_estado" style="font-size:small;">Estado del Proceso</label>
              <input type="text" class="form-control" id="txt_estado">
            </div>
            <div class="col-3 form-group">
              <label for="txt_total" style="font-size:small;">Costo Total del Proceso</label>
              <input type="text" class="form-control" id="txt_total">
            </div>
            <div class="col-3 form-group">
              <label for="txt_abono" style="font-size:small;">Abono del proceso</label>
              <input type="text" class="form-control" id="txt_abono">
            </div>

            <div class="col-12" style="text-align:center">
              <button class="btn  btn-success btn-lg" onclick="Registrar_Proceso()"> REGISTRAR PROCESO</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
    Cargar_Select_Institucion();

    $('#select_subinstitucion').parent().hide();

    $('#select_institucion').change(function() {
      var selectedOption = $(this).val();
      if (selectedOption == '4') {
        $('#select_subinstitucion').parent().show();
        $('#select_institucion').parent().removeClass('col-6').addClass('col-4');
        $('#txt_ndocumento').parent().removeClass('col-6').addClass('col-5');
      } else {
        $('#select_subinstitucion').parent().hide();
        $('#select_institucion').parent().removeClass('col-4').addClass('col-6');
        $('#txt_ndocumento').parent().removeClass('col-5').addClass('col-6');
      }
    });

    // Ocultar el segundo select al cargar la página si la opción seleccionada no es '4'
    if ($('#select_institucion').val() != '4') {
      $('#select_rol').parent().hide();
    }
  });
</script>
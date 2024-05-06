<!-- MODAL DE MAS DATOS  -->
<div class="modal fade" id="modal_mas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATOS DEL PROCESO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="" style="font-size:small;">Nombres y Apellidos del Cliente</label>
            <input type="text" class="form-control" id="txt_nom" readonly>
          </div>
          <div class="col-4">

            <label for="" style="font-size:small;">Institución</label>
            <input type="text" class="form-control" id="txt_inst" readonly>
            <input type="text" class="form-control" id="txt_id_pro" hidden>

          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">Subinstitucion</label>
            <input type="text" class="form-control" id="txt_Subinst" readonly>
          </div>


          <div class="col-4">
            <label for="" style="font-size:small;">Núero del Proceso</label>
            <input type="text" class="form-control" id="txt_num" readonly>
          </div>
          <div class=" col-6">
            <label for="" style="font-size:small;">Tipo de Infraccion</label>
            <textarea name="" class="form-control" id="txt_tipo" rows="3" style="resize: none;" readonly></textarea>
          </div>

          <div class="col-6">
            <label for="" style="font-size:small;">Estado del Proceso</label>
            <input type="text" class="form-control" id="txt_estadoproceso" readonly>

          </div>
          <div class="col-12">
            <br>
            <label for="" style="font-size:small;">GASTOS REALIZADOS EN ELPROCESO</label>
            <hr style="margin-top: 0;">
          </div>

          <div class="col-4">
            <label for="" style="font-size:small;">Costo Total del Proeso</label>
            <input type="text" class="form-control" id="txt_total" readonly>
          </div>

          <div class=" col-4">
            <label for="" style="font-size:small;">Gastos extras</label>
            <input type="text" class="form-control" id="txt_extras" readonly>
          </div>
          <div class="col-4">
            <label for="" style="font-size:small;">TCosto total + Gastos extras</label>
            <input type="text" class="form-control" id="txt_costoextra" readonly>
            <input type="text" id="txt_idusuario" hidden>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>

      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DE MAS DATOS -->
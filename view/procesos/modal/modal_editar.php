<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR DATOS DEL PROCESO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="" style="font-size:small;">Estado del Proceso</label>
            <input type="text" class="form-control" id="txt_estado_editar">
            <input type="text" id="txt_idproceso" hidden>
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Abono del proceso</label>
            <input type="text" class="form-control" id="txt_abono_editar">

          </div>
          <div class="col-6">
            <label for="" style="font-size:small;">Gastos Extras</label>
            <input type="text" class="form-control" id="txt_gastos_editar">

          </div>
          <div class="col-8">
            <label for="" style="font-size:small;">Descripcion de los gastos extras</label>
            <input type="text" class="form-control" id="txt_descripcion">

          </div>
          <div class="col-4" style="font-size:small;">
            <label for="">Estatus</label>
            <select name="" class="form-control" id="select_estatus">
              <option value="ACTIVO">EN PROCESO</option>
              <option value="INACTIVO">FINALIZADO</option>
            </select>

          </div>

          <div class="col-12">
            <br>
            <label for="" style="font-size:small;"><i class="far fa-calendar-alt"></i> Recordatorio de las
              audiencias</label>
            <hr style="margin-top: 0;">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;"><i class="fas fa-calendar-day"></i> Día</label>
            <input type="date" class="form-control" id="txt_fecha">
          </div>
          <div class="col-6">
            <label for="" style="font-size:small;"><i class="far fa-clock"></i> Hora</label>
            <input type="time" class="form-control" id="txt_hora">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Proceso()">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
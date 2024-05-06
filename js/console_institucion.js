var tbl_institucion;
function listar_institucion() {
  tbl_institucion = $("#tabla_institucion").DataTable({
    ordering: false,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/institucion/controlador_listar_institucion.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "inst_nombre" },
      {
        defaultContent:
          "<button class='editar btn btn-primary btn-sm'><i class='fa fa-edit'></i></button>",
      },
    ],

    language: idioma_espanol,
    select: true,
  });
  tbl_institucion.on("draw.td", function () {
    var PageInfo = $("#tabla_institucion").DataTable().page.info();
    tbl_institucion
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#tabla_institucion").on("click", ".editar", function () {
  var data = tbl_institucion.row($(this).parents("tr")).data(); //en tamaño de escritorio
  if (tbl_institucion.row(this).child.isShown()) {
    data = tbl_institucion.row(this).data(); // permite llevar los datos cuando es tamaño celular y usar el responsive de dataTables
  }
  $("#modal_editar").modal("show");
  document.getElementById("txt_institucion_editar").value = data.inst_nombre;
  document.getElementById("txt_idinstitucion").value = data.id_institucion;
});

function AbrirRegistro() {
  $("#modal_registro").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro").modal("show");
}

function Registrar_Institucion() {
  let tipo = document.getElementById("txt_institucion").value;
  if (tipo.length == 0) {
    return Swal.fire({
      icon: "warning",
      title: "Mensaje de Advertencia",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  $.ajax({
    url: "../controller/institucion/controlador_registro_institucion.php",
    type: "POST",
    data: {
      t: tipo,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva  institucion Registrada",
          "success"
        ).then((value) => {
          document.getElementById("txt_institucion").value = "";
          tbl_institucion.ajax.reload();
          $("#modal_registro").modal("hide");
        });
      } else {
        Swal.fire(
          "Mensaje de Advertencia",
          "La Institucion ingresado ya existe",
          "warning"
        );
      }
    } else {
      return Swal.fire(
        "Mensaje de Error",
        "Nose Completó el Registro",
        "error"
      );
    }
  });
}

function Modificar_Institucion() {
  let id = document.getElementById("txt_idinstitucion").value;
  let tipo = document.getElementById("txt_institucion_editar").value;

  if (tipo.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/institucion/controlador_modificar_institucion.php",
    type: "POST",
    data: {
      id: id,
      tipo: tipo,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Datos Actualizados",
          "success"
        ).then((value) => {
          tbl_institucion.ajax.reload();
          $("#modal_editar").modal("hide");
        });
      } else {
        Swal.fire(
          "Mensaje de Advertencia",
          "La Institucion ingresada ya existe",
          "warning"
        );
      }
    } else {
      return Swal.fire(
        "Mensaje de Error",
        "Nose Completó la modificacion",
        "error"
      );
    }
  });
}

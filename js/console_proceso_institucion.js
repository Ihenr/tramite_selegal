var tbl_area;

function listar_proceso_penal() {
  tbl_area = $("#tabla_proceso").DataTable({
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
      url: "../controller/proceso/proceso_institucion/controlador_listar_proceso_penal.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "inst_nombre" },
      { data: "pro_numproceso" },
      { data: "pro_tipoinfraccion" },
      { data: "pro_cliente" },
      { data: "pro_estadoproceso" },
      {
        data: "pro_costototal",
        render: function (data, type, row) {
          return "$" + data; // Agrega el símbolo de dólar al principio del valor
        },
      },
      {
        data: "pro_abono",
        render: function (data, type, row) {
          return (
            "$" +
            data +
            "<br><button class='abono btn btn-success btn-xs'><i class='fas fa-list-ul'></i></button>"
          ); // Agrega el símbolo de dólar al principio del valor
        },
      },
      {
        // Aquí definimos la última columna que mostrará la resta de  pro_costototal- abono
        data: null,
        render: function (data, type, row) {
          var sumaExtrasYCostoTotal =
            parseFloat(row.pro_costototal) - parseFloat(row.pro_abono);
          return "$" + sumaExtrasYCostoTotal.toFixed(2); // Redondeamos a 2 decimales
        },
      },
      {
        data: "pro_extras",
        render: function (data, type, row) {
          return (
            "$" +
            data +
            " <br> <button class='extras btn btn-success btn-xs'><i class='fas fa-list-ul'></i></button>"
          ); // Agrega el símbolo de dólar al principio del valor
        },
      },
      {
        // Aquí definimos la última columna que mostrará la suma de pro_extras y pro_costototal
        data: null,
        render: function (data, type, row) {
          var sumaExtrasYCostoTotal =
            parseFloat(row.pro_extras) + parseFloat(row.pro_costototal);
          return "$" + sumaExtrasYCostoTotal.toFixed(2); // Redondeamos a 2 decimales
        },
      },
      {
        data: "pro_estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return "<button class='editar btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> &nbsp <button class='mas btn btn-danger btn-xs'><i class='fa fa-plus'> </i></button>&nbsp &nbsp <span class='badge bg-success' style='font-size: 9px;'>ACTIVO</span>";
          } else {
            return "&nbsp &nbsp <button class='mas btn btn-danger btn-xs'><i class='fa fa-plus'> </i></button> <span class='badge bg-danger' style='font-size: 8px;'>FINALIZADO</span>";
          }
        },
      },
    ],
    language: idioma_espanol,
    select: true,
  });
  tbl_area.on("draw.td", function () {
    var PageInfo = $("#tabla_proceso").DataTable().page.info();
    tbl_area
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

var abono_actual;
var extra_actual;

$("#tabla_proceso").on("click", ".editar", function () {
  var data = tbl_area.row($(this).parents("tr")).data(); //en tamaño de escritorio
  abono_actual = data.pro_abono; // Almacenar el valor de pro_abono
  extra_actual = data.pro_extras; // Almacenar el valor de pro_extras
  if (tbl_area.row(this).child.isShown()) {
    data = tbl_area.row(this).data(); // permite llevar los datos cuando es tamaño celular y usar el responsive de dataTables
  }
  $("#modal_editar").modal("show");
  document.getElementById("txt_estado_editar").value = data.pro_estadoproceso;
  document.getElementById("txt_idproceso").value = data.proceso_cod;
});

$("#tabla_proceso").on("click", ".mas", function () {
  var data = tbl_area.row($(this).parents("tr")).data();
  if (tbl_area.row(this).child.isShown()) {
    data = tbl_area.row(this).data(); // permite llevar los datos cuando es tamaño celular y usar el responsive de dataTables
  }
  $("#modal_mas").modal("show");
  document.getElementById("txt_id_pro").value = data.pro_institucion;
  document.getElementById("txt_nom").value = data.pro_cliente;
  document.getElementById("txt_inst").value = data.inst_nombre;
  document.getElementById("txt_Subinst").value = data.pro_subinstitucion;
  document.getElementById("txt_num").value = data.pro_numproceso;
  document.getElementById("txt_tipo").value = data.pro_tipoinfraccion;
  document.getElementById("txt_estadoproceso").value = data.pro_estadoproceso;
  document.getElementById("txt_total").value = "$ " + data.pro_costototal;
  document.getElementById("txt_extras").value = "$ " + data.pro_extras;
  document.getElementById("txt_costoextra").value =
    "$ " + (parseFloat(data.pro_costototal) + parseFloat(data.pro_extras));

  // Mostrar u ocultar el campo Subinstitucion dependiendo del valor de txt_id_pro
  if (data.pro_institucion === "4") {
    $("#txt_Subinst").parent().show();
    $("#txt_inst").parent().removeClass("col-6").addClass("col-4");
    $("#txt_num").parent().removeClass("col-6").addClass("col-4");
  } else {
    $("#txt_Subinst").parent().hide();
    $("#txt_inst").parent().removeClass("col-4").addClass("col-6");
    $("#txt_num").parent().removeClass("col-4").addClass("col-6");
  }
});

$("#tabla_proceso").on("click", ".abono", function () {
  var data = tbl_area.row($(this).parents("tr")).data(); //en tamaño de escritorio
  if (tbl_area.row(this).child.isShown()) {
    data = tbl_area.row(this).data(); // permite llevar los datos cuando es tamaño celular y usar el responsive de dataTables
  }
  $("#modal_abono").modal("show");
  document.getElementById("lbl_titulo_abono").innerHTML =
    "<b>ABONOS REALIZADOS  - </b>       " +
    " Total de los Abonos:   <b>$" +
    data.pro_abono +
    "</b>";
  listar_abono(data.proceso_cod);
});

$("#tabla_proceso").on("click", ".extras", function () {
  var data = tbl_area.row($(this).parents("tr")).data(); //en tamaño de escritorio
  if (tbl_area.row(this).child.isShown()) {
    data = tbl_area.row(this).data(); // permite llevar los datos cuando es tamaño celular y usar el responsive de dataTables
  }
  $("#modal_extras").modal("show");
  document.getElementById("lbl_titulo_extras").innerHTML =
    "<b>GASTOS EXTRAS REALIZADOS- </b>      " +
    " Total de los Gastos realizados:   <b>$" +
    data.pro_extras +
    "</b>";
  listar_Extras(data.proceso_cod);
});

function Registrar_Proceso() {
  //DATOS
  let idusu = document.getElementById("txt_idusu").value;
  let idinst = document.getElementById("select_institucion").value;
  let numpro = document.getElementById("txt_ndocumento").value;
  let tipinf = document.getElementById("txt_tipoinfraccion").value;
  let client = document.getElementById("txt_cliente").value;
  let estado = document.getElementById("txt_estado").value;
  let total_input = document.getElementById("txt_total").value;
  let abono_input = document.getElementById("txt_abono").value;
  let subinst = "";

  let total = parseFloat(total_input.replace(",", "."));
  let abono =
    abono_input.trim() !== "" ? parseFloat(abono_input.replace(",", ".")) : 0;

  if (
    idusu.length == 0 ||
    idinst.length == 0 ||
    numpro.length == 0 ||
    tipinf.length == 0 ||
    client.length == 0 ||
    estado.length == 0 ||
    total_input.length == 0
  ) {
    return Swal.fire({
      icon: "warning",
      title: "Mensaje de Advertencia",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  if (idinst === "4") {
    subinst = document.getElementById("select_subinstitucion").value;
  }

  let formData = new FormData();

  formData.append("idusu", idusu);
  formData.append("idinst", idinst);
  formData.append("numpro", numpro);
  formData.append("tipinf", tipinf);
  formData.append("client", client);
  formData.append("estado", estado);
  formData.append("total", total);
  formData.append("abono", abono);
  formData.append("subinst", subinst);

  $.ajax({
    url: "../controller/proceso/controlador_registro_proceso.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp.length > 0) {
        Swal.fire("CONFIRMACIÓN", "Nueva Proceso Registrado", "success").then(
          (value) => {
            $("#contenido_principal").load(
              "../view/procesos/view_procesos.php"
            );
          }
        );
      } else {
        Swal.fire("ADVERTENCIA", "El Número de proceso ya existe", "warning");
      }
    },
  });
  return false;
}

function Modificar_Proceso() {
  let id = document.getElementById("txt_idproceso").value;
  let estado = document.getElementById("txt_estado_editar").value;
  let abono_nuevo = document.getElementById("txt_abono_editar").value;
  let gastos_nuevo = document.getElementById("txt_gastos_editar").value;
  let estatus = document.getElementById("select_estatus").value;
  let descripcion = document.getElementById("txt_descripcion").value;

  // Reemplazar la coma por el punto para manejar ambos formatos
  let abono =
    abono_nuevo.trim() !== "" ? parseFloat(abono_nuevo.replace(",", ".")) : 0;
  if (abono !== 0) {
    Registrar_Abono();
  }
  let gastos =
    gastos_nuevo.trim() !== "" ? parseFloat(gastos_nuevo.replace(",", ".")) : 0;

  if (gastos !== 0) {
    if (descripcion.trim() !== "") {
      Registrar_Extras();
    } else {
      return Swal.fire(
        "Mensaje de Advertencia",
        "Tiene que llenar tanto gastos extras como descripción",
        "warning"
      );
    }
  } else if (descripcion.trim() !== "") {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene que llenar tanto gastos extras como descripción",
      "warning"
    );
  }

  // Sumar los valores nuevos a los valores existentes
  let totalabono = abono + parseFloat(abono_actual);
  let totalgastos = gastos + parseFloat(extra_actual);

  if (estado.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/proceso/controlador_modificar_proceso.php",
    type: "POST",
    data: {
      id: id,
      estado: estado,
      totalabono: totalabono,
      totalgastos: totalgastos,
      estatus: estatus,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire("CONFIRMACIÓN", "Datos Actualizados", "success").then(
          (value) => {
            tbl_area.ajax.reload();
            $("#modal_editar").modal("hide");
            // Limpiar los campos de texto
            document.getElementById("txt_abono_editar").value = "";
            document.getElementById("txt_gastos_editar").value = "";
            document.getElementById("txt_descripcion").value = "";
          }
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

function Registrar_Abono() {
  console.log("Registrar_Abono");
  let id = document.getElementById("txt_idproceso").value;
  let abono_ingresado = document.getElementById("txt_abono_editar").value;
  let abono = parseFloat(abono_ingresado.replace(",", "."));
  if (id.length == 0 || abono.length == 0) {
    return Swal.fire({
      icon: "warning",
      title: "Mensaje de Advertencia",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  $.ajax({
    url: "../controller/proceso/controlador_registro_abono.php",
    type: "POST",
    data: {
      id: id,
      abono: abono,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva  abono Registrada",
          "success"
        ).then((value) => {
          tbl_area.ajax.reload();
        });
      }
    }
  });
}
var tbl_abono;
function listar_abono(id) {
  tbl_abono = $("#tabla_abono").DataTable({
    ordering: false,
    bLengthChange: false,
    searching: false,
    info: false,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/proceso/controlador_listar_abono.php",
      type: "POST",
      data: {
        id: id,
      },
    },
    columns: [
      { data: "abono_fecha" },
      {
        data: "abono_cantidad",
        render: function (data, type, row) {
          return "$" + data;
        },
      },
    ],
    language: idioma_espanol,
    select: true,
  });
}

function Registrar_Extras() {
  let id = document.getElementById("txt_idproceso").value;
  let abono_ingresado = document.getElementById("txt_gastos_editar").value;
  let descripcion = document.getElementById("txt_descripcion").value;
  let abono = parseFloat(abono_ingresado.replace(",", "."));
  if (id.length == 0 || abono.length == 0) {
    return Swal.fire({
      icon: "warning",
      title: "Mensaje de Advertencia",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  $.ajax({
    url: "../controller/proceso/controlador_registro_gasto.php",
    type: "POST",
    data: {
      id: id,
      abono: abono,
      descripcion: descripcion,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva  Gasto Extra Registrada",
          "success"
        ).then((value) => {
          tbl_area.ajax.reload();
        });
      }
    }
  });
}

var tbl_gasto;
function listar_Extras(id) {
  tbl_gasto = $("#tabla_extras").DataTable({
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
      url: "../controller/proceso/controlador_listar_extra.php",
      type: "POST",
      data: {
        id: id,
      },
    },
    columns: [
      { data: "extras_fechacreacion" },
      {
        data: "extras_cantidad",
        render: function (data, type, row) {
          return "$" + data;
        },
      },
      { data: "extra_descripcion" },
    ],
    language: idioma_espanol,
    select: true,
  });
}

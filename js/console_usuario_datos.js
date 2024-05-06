function datosusuario() {
  var id = $("#txtprincipalid").val();

  $.ajax({
    type: "post",
    url: "../controller/usuario/controlador_cargar_datos_usuario.php",
    dataType: "JSON",
    data: {
      id: id,
    },
    success: function (resp) {
      document.getElementById("txt_nom_usu").value =
        resp["data"]["0"]["usu_nombres"];

      document.getElementById("txt_ape_usu").value =
        resp["data"]["0"]["usu_apellidos"];

      document.getElementById("txt_dni_usu").value =
        resp["data"]["0"]["usu_nrodocumento"];

      document.getElementById("txt_email_usu").value =
        resp["data"]["0"]["usu_email"];

      document.getElementById("txt_usu_exitente_1").value =
        resp["data"]["0"]["usu_usuario"];
      document.getElementById("txt_usu_exitente").value =
        resp["data"]["0"]["usu_usuario"];
      document.getElementById("txt_idi_usu").value =
        resp["data"]["0"]["usu_id"];
    },
  });
}

function AbrirRegistro() {
  $("#modal_registro").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro").modal("show");
}
function AbrirRegistro1() {
  $("#modal_contra").modal({ backdrop: "static", keyboard: false });
  $("#modal_contra").modal("show");
}

function Modificar_Usuario_Contra() {
  let id = document.getElementById("txtprincipalid").value;
  let con = document.getElementById("txt_contra_nueva").value;

  if (id.length == 0 || con.length == 0) {
    return Swal.fire({
      icon: "warning",
      title: "ADVERTENCIA",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario_contra.php",
    type: "POST",
    data: {
      id: id,
      con: con,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire("CONFIRMACIÓN", "Contraseña Actualizada", "success").then(
          (value) => {
            document.getElementById("txt_contra_nueva").value = "";
            $("#modal_contra").modal("hide");
          }
        );
      }
    } else {
      return Swal.fire("ERROR", "Nose Completó la Actualizacion", "error");
    }
  });
}
function Modificar_datos() {
  let id = document.getElementById("txtprincipalid").value;
  let usu = document.getElementById("txt_usu_editar").value;

  if (id.length == 0 || usu.length == 0) {
    return Swal.fire({
      icon: "warning",
      title: "ADVERTENCIA",
      text: "LLene los campos vacios",
      heightAuto: false,
    });
  }

  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario_usu.php",
    type: "POST",
    data: {
      id: id,
      usu: usu,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire("CONFIRMACIÓN", "Contraseña Actualizada", "success").then(
          (value) => {
            document.getElementById("txt_usu_editar").value = "";
            window.location.reload();
          }
        );
      }
    } else {
      return Swal.fire("ERROR", "Nose Completó la Actualizacion", "error");
    }
  });
}
function Modificar_Empleado() {
  let id = document.getElementById("txt_idi_usu").value;
  let nom = document.getElementById("txt_nom_usu").value;
  let ape = document.getElementById("txt_ape_usu").value;
  let dni = document.getElementById("txt_dni_usu").value;
  let email = document.getElementById("txt_email_usu").value;

  if (
    id.length == 0 ||
    nom.length == 0 ||
    email.length == 0 ||
    ape.length == 0 ||
    dni.length == 0
  ) {
    return Swal.fire("ADVERTENCIA", "Tiene campos vacios", "warning");
  }

  if (validar_email(email)) {
  } else {
    return Swal.fire(
      "ADVERTENCIA",
      "El formato de email es incorrecto",
      "warning"
    );
  }

  let formData = new FormData();

  formData.append("id", id);
  formData.append("nom", nom);
  formData.append("ape", ape);
  formData.append("dni", dni);
  formData.append("email", email);

  $.ajax({
    url: "../controller/usuario/controlador_modificar_datos_usuario.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp.length > 0) {
        Swal.fire("CONFIRMACIÓN", "Datos Modificados", "success").then(
          (value) => {
            window.location.reload();
          }
        );
      } else {
        Swal.fire("CONFIRMACIÓN", "Datos Modificados", "success").then(
          (value) => {
            window.location.reload();
          }
        );
      }
    },
  });
  return false;
}
function validar_email(email) {
  let regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email) ? true : false;
}

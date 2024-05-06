<?php
session_start();
if (isset($_SESSION['S_ID'])) {
  header('Location: view/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SELEGAL | LOGIN</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="view/img/Logo2.png" type="image/x-icon">
</head>

<body>
  <div class="body">
    <div class="container">
      <div class="formulario">
        <h2>Iniciar sección</h2>
        <div class="form">
          <div class="form-info">
            <label for="txt_usuario">Usuario</label>
            <input type="text" id="txt_usuario" name="email" placeholder="Usuario" />
          </div>
          <div class="form-info">
            <label for="txt_contra">Contraseña</label>
            <input type="password" id="txt_contra" name="password" placeholder="Contraseña" />
          </div>
          <div class="form-info">
            <button type="submit" onclick="Iniciar_Session()">Iniciar sección</button>
          </div>
          <div>
            <input type="checkbox" id="remember">
            <label for="remember">
              Recuérdame
            </label>
          </div>
        </div>
      </div>

      <figure class="form-img">
        <img src="view/img/selegal.jpg" alt="selegal" />
      </figure>
    </div>
  </div>

  <!-- jQuery -->
  <script src="plantilla/plugins/jquery/jquery.min.js"></script>

  <script src="js/console_usuario.js?rev=<?php echo time(); ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    const rmcheck = document.getElementById('remember'),
      usuarioInput = document.getElementById('txt_usuario'),
      passInput = document.getElementById('txt_contra');
    if (localStorage.checkbox && localStorage.checkbox != "") {

      rmcheck.setAttribute('checked', 'checked');
      usuarioInput.value = localStorage.usuario;
      passInput.value = localStorage.pass;
    } else {
      rmcheck.removeAttribute('checked');
      usuarioInput.value = "";
      passInput.value = "";

    }
  </script>

</body>

</html>
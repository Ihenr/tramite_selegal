<?php
session_start();

$idusuario = htmlspecialchars($_POST['idusuario'], ENT_QUOTES, 'UTF-8'); // Recibe el usuario
$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8'); // Recibe la contraseña
$rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');


$_SESSION['S_ID'] = $idusuario;
$_SESSION['S_USU'] = $usuario;
$_SESSION['S_ROL'] = $rol;

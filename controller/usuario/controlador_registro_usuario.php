<?php
require '../../model/model_usuario.php';
$MU = new Modelo_Usuario(); //Instaciamos

$usu = htmlspecialchars($_POST['usu'], ENT_QUOTES, 'UTF-8');
$con = password_hash(htmlspecialchars($_POST['con'], ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT, ['cost' => 12]);
$rol = strtoupper(htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8'));
$nro = htmlspecialchars($_POST['nro'], ENT_QUOTES, 'UTF-8');
$nom = ucwords(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'));
$apepa = ucwords(htmlspecialchars($_POST['apepa'], ENT_QUOTES, 'UTF-8'));

$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');




$consulta = $MU->Registrar_Usuario($usu, $con, $rol, $nro, $nom, $apepa, $email); // Verifica si el usuario existe
echo $consulta;

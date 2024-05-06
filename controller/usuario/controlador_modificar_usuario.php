<?php
require '../../model/model_usuario.php';
$MU = new Modelo_Usuario(); //Instaciamos
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$usu = htmlspecialchars($_POST['usu'], ENT_QUOTES, 'UTF-8');
$rol = strtoupper(htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8'));
$nro = htmlspecialchars($_POST['nro'], ENT_QUOTES, 'UTF-8');
$nom = ucwords(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'));
$apepa = ucwords(htmlspecialchars($_POST['apepa'], ENT_QUOTES, 'UTF-8'));
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');



$consulta = $MU->Modificar_Usuario($id, $usu,  $rol, $nro, $nom, $apepa, $email); // Verifica si el usuario existe
echo $consulta;

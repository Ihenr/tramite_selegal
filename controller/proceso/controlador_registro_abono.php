<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos

$id = ucwords(htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8')); // Recibe el usuario
$abono = ucwords(htmlspecialchars($_POST['abono'], ENT_QUOTES, 'UTF-8')); // Recibe el usuario

$consulta = $MU->Registrar_abono($id, $abono); // Verifica si el usuario existe
echo $consulta;

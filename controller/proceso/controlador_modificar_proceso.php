<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos

$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'); // Recibe el usuario
$estado = ucwords(htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8'));
$totalabono = strtoupper(htmlspecialchars($_POST['totalabono'], ENT_QUOTES, 'UTF-8'));
$totalgastos = strtoupper(htmlspecialchars($_POST['totalgastos'], ENT_QUOTES, 'UTF-8'));
$estatus = strtoupper(htmlspecialchars($_POST['estatus'], ENT_QUOTES, 'UTF-8'));

$consulta = $MU->Modificar_Proceso($id, $estado, $totalabono, $totalgastos, $estatus); // Verifica si el usuario existe
echo $consulta;
<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos

$id = ucwords(htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'));
$abono = ucwords(htmlspecialchars($_POST['abono'], ENT_QUOTES, 'UTF-8'));
$descripcion = ucwords(htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8'));

$consulta = $MU->Registrar_Gasto($id, $abono, $descripcion);
echo $consulta;
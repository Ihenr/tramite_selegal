<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos

$id = ucwords(htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8'));
$fecha = ucwords(htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8'));
$hora = ucwords(htmlspecialchars($_POST['hora'], ENT_QUOTES, 'UTF-8'));

$consulta = $MU->Registrar_Fecha($id, $fecha, $hora);
echo $consulta;

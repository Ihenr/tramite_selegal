<?php
require '../../model/model_institucion.php';
$MU = new Modelo_Institucion(); //Instaciamos

$id = ucwords(htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8')); // Recibe el usuario
$tipo = ucwords(htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8'));

$consulta = $MU->Modificar_Institucion($id, $tipo); // Verifica si el usuario existe
echo $consulta;

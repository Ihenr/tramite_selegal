<?php
require '../../model/model_institucion.php';
$MU = new Modelo_Institucion(); //Instaciamos

$t = ucwords(htmlspecialchars($_POST['t'], ENT_QUOTES, 'UTF-8')); // Recibe el usuario

$consulta = $MU->Registrar_Institucion($t); // Verifica si el usuario existe
echo $consulta;

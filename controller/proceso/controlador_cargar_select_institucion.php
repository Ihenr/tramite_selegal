<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos
$consulta = $MU->Cargar_Select_Institucion();

echo json_encode($consulta);

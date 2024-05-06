<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos
//DATOS D

$idinst = htmlspecialchars($_POST['idinst'], ENT_QUOTES, 'UTF-8');
$numpro = htmlspecialchars($_POST['numpro'], ENT_QUOTES, 'UTF-8');
$tipinf = htmlspecialchars($_POST['tipinf'], ENT_QUOTES, 'UTF-8');
$client = htmlspecialchars($_POST['client'], ENT_QUOTES, 'UTF-8');
$estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$total = htmlspecialchars($_POST['total'], ENT_QUOTES, 'UTF-8');
$abono = htmlspecialchars($_POST['abono'], ENT_QUOTES, 'UTF-8');
$idusu = htmlspecialchars($_POST['idusu'], ENT_QUOTES, 'UTF-8');
$subinst = htmlspecialchars($_POST['subinst'], ENT_QUOTES, 'UTF-8');


$consulta = $MU->Registrar_Proceso($idinst, $numpro, $tipinf, $client, $estado, $total, $abono, $idusu, $subinst);
echo $consulta;

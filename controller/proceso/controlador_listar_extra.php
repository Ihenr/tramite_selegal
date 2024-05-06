<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos

$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$consulta = $MU->Listar_Extra($id);
if ($consulta) {
    echo json_encode($consulta);
} else {
    echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
}

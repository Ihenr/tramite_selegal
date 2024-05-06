<?php
require '../../model/model_proceso.php';
$MU = new Modelo_Proceso(); //Instaciamos
$consulta = $MU->Listar_Proceso_Activo();
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

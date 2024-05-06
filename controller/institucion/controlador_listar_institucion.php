<?php
require '../../model/model_institucion.php';
$MU = new Modelo_Institucion(); //Instaciamos
$consulta = $MU->Listar_Institucion();
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

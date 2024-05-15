<?php
require '../../model/model_usuario.php';

$MU = new Modelo_Usuario(); // Instancia del modelo de usuario

$consulta = $MU->Listar_Notificaciones();
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

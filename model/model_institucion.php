<?php
require_once 'model_conexion.php';

class Modelo_Institucion extends conexionBD
{
    public function Listar_Institucion()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_INSTITUCION";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->execute();

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $resp) {
            $arreglo["data"][] = $resp;
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }

    public function Registrar_Institucion($t)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_REGISTRAR_INSTITUCION(?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $t);

        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Modificar_Institucion($id, $tipo)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_INSTITUCION(?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $tipo);

        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }
}

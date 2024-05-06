<?php
require_once 'model_conexion.php';

class Modelo_Proceso extends conexionBD
{
    public function Listar_Proceso()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_PROCESO";
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


    public function Cargar_Select_Institucion()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_CARGAR_SELECT_INSTITUCION()";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->execute();


        $resultado = $query->fetchAll();
        foreach ($resultado as $resp) {
            $arreglo[] = $resp;
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }

    public function Registrar_Proceso($idinst, $numpro, $tipinf, $client, $estado, $total, $abono, $idusu, $subinst)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_REGISTRAR_PROCESO(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);


        $query->bindParam(1, $idinst);
        $query->bindParam(2, $numpro);
        $query->bindParam(3, $tipinf);
        $query->bindParam(4, $client);
        $query->bindParam(5, $estado);
        $query->bindParam(6, $total);
        $query->bindParam(7, $abono);
        $query->bindParam(8, $idusu);
        $query->bindParam(9, $subinst);



        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Modificar_Proceso($id, $estado, $totalabono, $totalgastos, $estatus)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_PROCESO(?, ?, ?, ?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $estado);
        $query->bindParam(3, $totalabono);
        $query->bindParam(4, $totalgastos);
        $query->bindParam(5, $estatus);


        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Listar_Proceso_Activo()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_PROCESO_ACTIVO";
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
    public function Listar_Proceso_Finalizados()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_PROCESO_FINALIZADOS";
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


    public function Registrar_abono($id, $abono)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_REGISTRAR_ABONO(?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $abono);

        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }


    public function Listar_Abono($id)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_ABONO(?)";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $resp) {
            $arreglo["data"][] = $resp;
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }


    public function Registrar_Gasto($id, $abono, $descripcion)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_REGISTRAR_GASTO(?, ?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $abono);
        $query->bindParam(3, $descripcion);

        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Listar_Extra($id)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_EXTRA(?)";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $resp) {
            $arreglo["data"][] = $resp;
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }

    public function Listar_Proceso_Institucion($id)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_PROCESO_INSTITUCION(?)";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $resp) {
            $arreglo["data"][] = $resp;
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }
}

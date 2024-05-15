<?php
require_once 'model_conexion.php';

class Modelo_Usuario extends conexionBD
{

    public function Verificar_Usuario($usu, $con)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_VERIFICAR_USUARIO(?)";
        $arreglo = array();
        $query = $c->prepare($sql);
        $query->bindParam(1, $usu);
        $query->execute();

        $resultado = $query->fetchAll();
        foreach ($resultado as $resp) {
            if (password_verify($con, $resp['usu_contra'])) {
                $arreglo[] = $resp;
            }
        }
        return $arreglo;
        conexionBD::cerrar_conexion();
    }

    public function Listar_Usuario()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_USUARIO()";
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


    public function Registrar_Usuario($usu, $con, $rol, $nro, $nom, $apepa, $email)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_REGISTRAR_USUARIO(?, ?, ?, ?, ?,?,? )";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $usu);
        $query->bindParam(2, $con);
        $query->bindParam(3, $rol);
        $query->bindParam(4, $nro);
        $query->bindParam(5, $nom);
        $query->bindParam(6, $apepa);
        $query->bindParam(7, $email);




        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }


    public function Modificar_Usuario($id, $usu,  $rol, $nro, $nom, $apepa, $email)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_USUARIO(?, ?, ?, ?, ?, ?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $usu);
        $query->bindParam(3, $rol);
        $query->bindParam(4, $nro);
        $query->bindParam(5, $nom);
        $query->bindParam(6, $apepa);
        $query->bindParam(7, $email);


        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Modificar_Usuario_Contra($id, $con)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_USUARIO_CONTRA(?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $con);

        $resul = $query->execute();
        if ($resul) {
            return 1;
        } else {
            return 0;
        }
        conexionBD::cerrar_conexion();
    }

    public function Modificar_Usuario_Estatus($id, $estatus)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_USUARIO_ESTATUS(?,?)";
        $arreglo = array();
        $query  = $c->prepare($sql);
        $query->bindParam(1, $id);
        $query->bindParam(2, $estatus);
        $resul = $query->execute();
        if ($resul) {
            return 1;
        } else {
            return 0;
        }
        conexionBD::cerrar_conexion();
    }

    public function Listar_datos_usuario($id)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_DATOS_USUARIO(?)";
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
    public function Modificar_Datos_Usu($id, $nom, $ape, $dni, $email)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_DATOS_USUARIO(?,?,?,?,?)";
        $arreglo = array();
        $query  = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $nom);
        $query->bindParam(3, $ape);
        $query->bindParam(4, $dni);
        $query->bindParam(5, $email);

        $query->execute();
        if ($row = $query->fetchColumn()) {
            return $row;
        }
        conexionBD::cerrar_conexion();
    }

    public function Modificar_Usuario_Usu($id, $usu)
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_MODIFICAR_USUARIO_USU(?, ?)";
        $arreglo = array();
        $query = $c->prepare($sql);

        $query->bindParam(1, $id);
        $query->bindParam(2, $usu);

        $resul = $query->execute();
        if ($resul) {
            return 1;
        } else {
            return 0;
        }
        conexionBD::cerrar_conexion();
    }
    public function Listar_Notificaciones()
    {
        $c = conexionBD::conexionPDO();
        $sql = "CALL SP_LISTAR_RECORDATORIO()";
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

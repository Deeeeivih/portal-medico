<?php

namespace models;

require_once("Conexion.php");

class UsuarioModel
{

    public function insertarUsuario($data)
    {
       
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C)");
        $stm->bindParam(":A", $data['rut']);
        $stm->bindParam(":B", $data['nombre']);
        $stm->bindParam(":C", md5($data['clave'])); //123=> md5(123)=>wertyui56789234ds
        return $stm->execute();
    }


    public function buscarUsuarioLogin($rut, $clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}

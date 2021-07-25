<?php

namespace models;

require_once("Conexion.php");

class PublicacionModel
{


    public function insertarPublicacion($data)
    {
       
        $stm = Conexion::conector()->prepare("INSERT INTO publicacion VALUES(NULL,:A,:B,:C,:D)");
        $stm->bindParam(":A", $data['titulo']);
        $stm->bindParam(":B", $data['tipo']);
        $stm->bindParam(":C", $data['descripcion']);
        $stm->bindParam(":D", $data['rut']);
        return $stm->execute();
    }

    public function publicacionesUser($rut)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM publicacion WHERE rutFK=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function publicacionesAll()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM publicacion");
        $stm->execute();
        $publicaciones = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $publicaciones;
    }

    public function searchPub($data)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM publicacion WHERE tipo=:A");
        $stm->bindParam(":A", $data['tipo']);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
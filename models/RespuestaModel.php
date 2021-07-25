<?php

namespace models;

require_once("Conexion.php");

class RespuestaModel
{


    public function insertarRespuesta($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO respuesta VALUES(NULL,:A,:B,:C)");
        $stm->bindParam(":A", $data['respuesta']);
        $stm->bindParam(":B", $data['id']);
        $stm->bindParam(":C", $data['rut']);
        return $stm->execute();
    }

    public function RespuestaPub()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM respuesta");
        $stm->execute();
        $respuestas = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $respuestas;
    }

    public function RespuestaXPublicacion($idFK)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM respuesta WHERE idFK=:A");
        $stm->bindParam(":A", $idFK);
        $stm->execute();
        $respuestas = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $respuestas;
    }



    


    
}
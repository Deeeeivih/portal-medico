<?php

namespace models;

require_once("Conexion.php");

class MedicoModel{
    public function insertarMedico($data)
    {

        $stm = Conexion::conector()->prepare("INSERT INTO medico VALUES(:A,:B,:C,:D,:E,:F)");
        $stm->bindParam(":A", $data['rut']);
        $stm->bindParam(":B", $data['nombre']);
        $stm->bindParam(":C", md5($data['clave']));
        $stm->bindParam(":D", $data['especialidad']);
        $stm->bindParam(":E", $data['experiencia']);
        $stm->bindParam(":F", $data['foto']);
      
      
        return $stm->execute();
    }

    public function buscarMedicoLogin($rut, $clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM medico WHERE rut=:A AND clave=:B");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}


<?php

namespace controllers;

use models\RespuestaModel as RespuestaModel;

require_once("../models/RespuestaModel.php");

class NuevaRespuesta
{
    public $respuesta;
    public $id;
   

    public function __construct()
    {
        $this->respuesta = $_POST['respuesta'];
        $this->id = $_POST['id'];
      
    }

    public function crear()
    {
        session_start();
        if ($this->respuesta == "") {
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../views/nueva_r.php");
            return;
        }

        $model = new RespuestaModel();
        
        $user = $_SESSION['medico'];
        $data = ['respuesta' => $this->respuesta, 'id' => $this->id, "rut" => $user['rut']];
        $count = $model->insertarRespuesta($data);
        if ($count == 1) {
            $_SESSION['respuesta'] = "Consulta creada con éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../views/nueva_r.php");
    }
}

$obj = new NuevaRespuesta();
$obj->crear();

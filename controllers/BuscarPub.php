<?php

namespace controllers;

use models\PublicacionModel as PublicacionModel;

require_once("../models/PublicacionModel.php");

class NuevaPublicacion
{
   
    public $tipo;
    
    public function __construct()
    {
       
        $this->tipo = $_POST['tipo'];
      
    }

    public function crear()
    {
        session_start();
        if ($this->tipo == "") {
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../views/buscar_p.php");
            return;
        }

        $model = new PublicacionModel();
        $user = $_SESSION['usuario'];
        $data = ['tipo' => $this->tipo, "email" => $user['email']];
        $count = $model->searchPub($data);
        if ($count == 1) {
            $_SESSION['respuesta'] = "Consulta creada con éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        print_r($data);
    }
}

$obj = new NuevaPublicacion();
$obj->crear();

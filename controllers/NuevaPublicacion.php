<?php

namespace controllers;

use models\PublicacionModel as PublicacionModel;

require_once("../models/PublicacionModel.php");

class NuevaPublicacion
{
    public $titulo;
    public $tipo;
    public $descripcion;

    public function __construct()
    {
        $this->titulo = $_POST['titulo'];
        $this->tipo = $_POST['tipo'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function crear()
    {
        session_start();
        if ($this->titulo == "" || $this->tipo == "" || $this->descripcion == "") {
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../views/nueva_p.php");
            return;
        }

        $model = new PublicacionModel();
        $user = $_SESSION['usuario'];
        $data = ['titulo' => $this->titulo, 'tipo' => $this->tipo, 'descripcion' => $this->descripcion, "rut" => $user['rut']];
        $count = $model->insertarPublicacion($data);
        if ($count == 1) {
            $_SESSION['respuesta'] = "Consulta creada con éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../views/nueva_p.php");
    }
}

$obj = new NuevaPublicacion();
$obj->crear();

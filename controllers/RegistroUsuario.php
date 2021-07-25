<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class RegistroUsuario
{
    public $rut;
    public $nombre;
    public $clave;


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->clave = $_POST['clave'];
    }

    public function registrar()
    {
        session_start();
        if ($this->rut == "" || $this->nombre == "" || $this->clave == "") {
            $_SESSION['error'] = "Complete la informacion";
            header("Location: ../registro_u.php");
            return;
        }
        $modelo = new UsuarioModel();
        $data = ['rut' => $this->rut, 'nombre' => $this->nombre, 'clave' => $this->clave];
        $count = $modelo->insertarUsuario($data);

        if ($count == 1) {
            $_SESSION['respuesta'] = "Usuario Creado Con Éxito";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        header("Location: ../registro_u.php");
    }
}

$obj = new RegistroUsuario();
$obj->registrar();

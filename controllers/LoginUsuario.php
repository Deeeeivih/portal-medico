<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginUsuario
{
    public $rut;
    public $clave;


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->rut == "" || $this->clave == "") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../login_u.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($this->rut, $this->clave);
        if (count($array) == 0) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../login_u.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/nueva_p.php");
    }
}

$obj = new LoginUsuario();
$obj->iniciarSesion();

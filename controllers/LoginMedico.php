<?php

namespace controllers;

use models\MedicoModel as MedicoModel;

require_once("../models/MedicoModel.php");

class LoginMedico
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
            header("Location: ../login_m.php");
            return;
        }
        $modelo = new MedicoModel();
        $array = $modelo->buscarMedicoLogin($this->rut, $this->clave);
        if (count($array) == 0) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../login_m.php");
            return;
        }

        $_SESSION['medico'] = $array[0];

        header("Location: ../views/nueva_r.php");
    }
}

$obj = new LoginMedico();
$obj->iniciarSesion();

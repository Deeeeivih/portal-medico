<?php

namespace controllers;

use models\PublicacionModel as PublicacionModel;

require_once("../models/PublicacionModel.php");

class BuscarPublicacion
{
   
    public $tipo;
    
    public function __construct()
    {
       
        $this->tipo = $_POST['tipo'];
      
    }

    public function buscar()
    {
        session_start();
        if ($this->tipo == "") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../views/buscar_p.php");
            return;
        }
        $modelo = new PublicacionModel();
        $array = $modelo->searchPub($this->tipo);
        if (count($array) == 0) {
            $_SESSION['error_buscar'] = "No hay coincidencia.";
        } else {
            $_SESSION['pub'] = "Consultas encontradas";
            $_SESSION['pub_buscar'] = $array; 
        }


        //echo("<pre>");
        //print_r($array);
        //echo("</pre>");

        header("Location: ../views/buscar_p.php");
    }
}

$obj = new BuscarPublicacion();
$obj->buscar();

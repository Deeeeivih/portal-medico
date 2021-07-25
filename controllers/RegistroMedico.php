<?php

namespace controllers;

require_once('../models/MedicoModel.php');

use models\MedicoModel as MedicoModel;

class RegistroMedico
{
   
   

    public function __construct()
    {
        $this->MedicoModel = new MedicoModel();
    }

    public function registrar()
    {
        
        $nombre_foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $extension = end(explode('.', $nombre_foto));
        $nuevoNombre = $_POST['nombre'] . "_" . date("Y-m-d_H_i_s", time()) . "." . $extension;

        if (move_uploaded_file($temp, '../img/' . $nuevoNombre)) {
            //chmod('uploads/'.$nombre_foto, 0777);
            $foto = 'http://localhost/portal-medico/img/' . $nuevoNombre;
        } else {
            $foto = '';
        }

       
        $this->MedicoModel->insertarMedico(
            [
                'rut' => $_POST['rut'],
                'nombre' => $_POST['nombre'],
                'clave' => $_POST['clave'],
                'especialidad' => $_POST['especialidad'],
                'experiencia' => $_POST['experiencia'],
                'foto' => $foto
            ]
        );
        session_start();
        if ($this->rut == "" || $this->nombre == "" || $this->clave == "" || $this->especialidad == "" || $this->experiencia == "" || $foto != null) {
            $_SESSION['respuesta'] = "Medico creado con exito";
            header("Location: ../registro_m.php");
            return;
        } 
        
        $modelo = new MedicoModel();
        $data = ['rut' => $this->rut, 'nombre' => $this->nombre, 'clave' => $this->clave, 'especialidad' => $this->especialidad, 'experiencia' => $this->experiencia, 'foto' => $this->foto];
        $count = $modelo->insertarMedico($data);

        if ($count == 1) {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        } else {
           $_SESSION['respuesta'] = "Usuario Creado Con Éxito";
        }


        header('Location: ../registro_m.php');
        
    }
}
$obj = new RegistroMedico();
$obj->registrar();

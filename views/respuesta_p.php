<?php
require_once('../models/RespuestaModel.php');

use models\RespuestaModel as RespuestaModel;

$respuestaModel = new RespuestaModel();
$idFK = $_GET['idFK'];

$respuestas = $respuestaModel->RespuestaXPublicacion($idFK);
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Wendy+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Respuestas</title>
</head>


<body class="blue lighten-4" style="background: url('../img/black-felt.png'); font-family: 'Oswald', sans-serif;">


    <?php
    session_start();
    if (isset($_SESSION['usuario'])) { ?>

        <?php
        $user = $_SESSION['usuario'];

        ?>

        <div>

            <header>

                <nav>
                    <div class="nav-wrapper teal lighten-2" style="background: url('../img/black-felt.png')">
                        <a style="margin-left: 10px;" href="../views/nueva_p.php" class="white-text"><i class="material-icons left">arrow_back</i></a>

                        <a href="../index.php" class="brand-logo center" style="font-family: 'Anton', sans-serif;">Portal</a>

                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li class="active"><a href="nueva_p.php">Crear</a></li>
                            <li><a href="mis_consultas.php">Mis Consultas</a></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>


                    </div>
                </nav>
                <br><br>

            </header>


            <main>
                <div class="row">
                    <div class="col l10 offset-l1 m12 s12">
                        <?php if ($respuestas != null) { ?>


                            <div class="card-panel center" style="background: url(../img/marco.jpg);">
                                <h3><b style="text-transform: uppercase;">BIENVENIDO <?= $_SESSION['usuario']['nombre'] ?></b></h3>
                                <h6><b>Puedes ver las respuestas.</b></h6>
                                <li class="material-icons tooltipped right" style="color: teal;" data-position="bottom" data-tooltip="REVISA LAS RESPUESTAS A TUS CONSULTAS.">info</li>
                                <h5><b></b></h5>



                            </div>

                        <?php } else { ?>
                            <div class="card-panel center" style="background: url(../img/marco.jpg);">
                                <h3><b style="text-transform: uppercase;">BIENVENIDO <?= $_SESSION['usuario']['nombre'] ?></b></h3>
                                <h6><b>No hay respuestas.</b></h6>
                                <li class="material-icons tooltipped right" style="color: teal;" data-position="bottom" data-tooltip="NO HAY RESPUESTAS.">info</li>
                                <h5><b></b></h5>



                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col l10 offset-l1 m12 s12">
                        <?php foreach ($respuestas as $r) { ?>

                            <div class="card">
                                <div class="card">
                                    <div class="card horizontal blue lighten-4" style="background: url(../img/brick-wall.png);">
                                        <div class="card-image">
                                            <img src="../img/logo.jpg" class="responsive-img">
                                        </div>
                                        <div class="card-stacked">
                                            <div class="card-content">
                                                <h8><a><u>Respuesta</u></a></h8>
                                                <h5 style="text-transform: uppercase;"><b><?= $r['respuesta'] ?></b> </h5>
                                            </div>
                                            <div class="card-action">
                                                <a href="#">Respondida por: <?= $r['rutFK'] ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>


                </div>
        </div>






        </main>





        </div>
    <?php } else { ?>
        <header>
            <nav>
                <div class="nav-wrapper teal lighten-2" style="font-family: 'Wendy One', sans-serif; background: url('../img/black-felt.png')">
                    <a href="#" class="brand-logo center">Portal</a>
                </div>

            </nav>
            <br><br>

        </header>
        <main>
            <div class="row">
                <div class="col l10 offset-l1">
                    <div class="card-panel center-align white display" style="background: url(../img/brick-wall.png);">
                        <h3 class="red-text" style="font-family: 'Chau Philomene One', sans-serif;">ERROR DE ACCESO</h3>
                        <h3 class="teal-text" style="font-family: 'Chau Philomene One', sans-serif;">NO TIENES PERMISO PARA ESTAR AQUI</h3>
                        <button class="btn modal-trigger teal lighten-2 text-white center" href="#modal1" style="width:300px; background: url('../img/black-felt.png')"><a href="../index.php" class="white-text">Volver a Home</a></button>
                        <br><br>
                    </div>
                </div>

            </div>
        </main>


    <?php  } ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>
        function check1() {
            swal({
                title: "Buen Trabajo!",
                text: "Publicacion agregada con exito!",
                icon: "success",
                button: "OK",
            });
        }

        function check2() {
            swal({
                title: "Alto ahi!",
                text: "Debes completar los campos!",
                icon: "error",
                button: "OK",
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems, {
                height: 450,
                indicators: true
            });

            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);

            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);



        });
    </script>
</body>

</html>
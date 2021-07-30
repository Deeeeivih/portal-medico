<?php
require_once('../models/PublicacionModel.php');

use models\PublicacionModel as PublicacionModel;

$publicacionModel = new PublicacionModel();
$publicaciones = array_reverse($publicacionModel->publicacionesAll());
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
    <title>Portal</title>
</head>


<body class="blue lighten-4" style="background: url('../img/black-felt.png'); font-family: 'Oswald', sans-serif;">


    <?php
    session_start();
    if (isset($_SESSION['medico'])) { ?>

        <?php
        $user = $_SESSION['medico'];

        ?>

        <div>

            <header>

                <nav>
                    <div class="nav-wrapper teal lighten-2" style="background: url('../img/black-felt.png')">
                        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large	"><i class="material-icons">menu</i></a>
                        <a href="../index.php" class="brand-logo center" style="font-family: 'Anton', sans-serif;">Portal</a>

                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li class="active"><a href="nueva_r.php">Consultas</a></li>
                            <li><a href="../views/salir_m.php">Salir</a></li>
                        </ul>


                    </div>
                    <ul id="slide-out" class="sidenav blue lighten-4" style="background: url(../img/black-felt.png);">
                        <li>
                            <div class="user-view teal lighten-2" style="background: url(../img/black-felt.png);">

                                <a href="#user"><img class="responsive-img circle" src="<?= $_SESSION['medico']['foto'] ?>"></a>
                                <a href="#email"><span class="white-text email"></span><?= $_SESSION['medico']['nombre'] ?></a>
                            </div>
                        </li>
                        <li class="white"><a><i class="material-icons">email</i><b><?= $_SESSION['medico']['rut'] ?></b></a></li>
                        <li class="white"><a><i class="material-icons">assignment_ind</i><b><?= $_SESSION['medico']['especialidad'] ?></b></a></li>
                        <li class="white"><a><i class="material-icons">timeline</i><b><?= $_SESSION['medico']['experiencia'] ?></b></a></li>



                    </ul>


                </nav>
                <br><br>



            </header>


            <main>
            <div class="row">
                    <div class="col l8 offset-l2 m12 s12">
                        <?php if ($publicaciones != null) { ?>


                            <div class="card-panel center" style="background: url(../img/marco.jpg);">
                                <h3><b style="text-transform: uppercase;">BIENVENIDO <?= $_SESSION['medico']['nombre']?></b></h3>
                                <h6><b>Puedes ver las consultas realizadas, detalles y responder.</b></h6>
                                <li class="material-icons tooltipped right" style="color: teal;" data-position="bottom" data-tooltip="REVISA CONSULTAS Y REALIZA RESPUESTAS.">info</li>
                                <h5><b></b></h5>



                            </div>

                        <?php } else { ?>
                            <div class="card-panel center" style="background: url(../img/marco.jpg);">
                                <h3><b style="text-transform: uppercase;">BIENVENIDO <?= $_SESSION['medico']['nombre']?></b></h3>
                                <h6><b>No hay consultas.</b></h6>
                                <li class="material-icons tooltipped right" style="color: teal;" data-position="bottom" data-tooltip="NO HAY CONSULTAS, ESPERA QUE ALGUIEN PUBLIQUE ALGUNA.">info</li>
                                <h5><b></b></h5>



                            </div>

                        <?php } ?>
                    </div>
                </div>




                <?php foreach ($publicaciones as $p) { ?>
                    <div class="row">
                        <div class="col l6 offset-l3 m12 s12">



                            <div class="card horizontal blue lighten-4" style="background: url(../img/brick-wall.png);">
                                <div class="card-image">
                                    <img src="../img/logo.jpg" class="responsive-img">
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <div class="col l12">
                                            <h8><a><u>Consulta:</u></a></h8>
                                            <h5 style="text-transform: uppercase;"><b><?= $p['titulo'] ?></b> </h5>
                                        </div>
                                       

                                    </div>
                                    <div class="card-action">
                                        <div class="col l6 m6 s6">
                                            <a href="#">Consultado por: <?= $p['rutFK'] ?></a>
                                        </div>
                                        <div class="col l5 m5 s5">
                                            <a style="background: url('../img/black-felt.png')" href="#modal<?= $p['id'] ?>" class="waves-effect waves-light btn-small teal lighten-2 modal-trigger right"><i class="material-icons left">create</i>Responder</a>

                                        </div>
                                        <div class="col l1 m1 s1" style="margin-left: 0px;">
                                            <button style="background: url('../img/black-felt.png')" class="btn-small modal-trigger teal lighten-2 right" href="#modalinfo<?= $p['id'] ?>"><i class="material-icons">info</i></button>
                                        </div>

                                    </div>
                                </div>


                            </div>



                        </div>
                        <br>



                    </div>


                    <div id="modalinfo<?= $p['id'] ?>" class="modal">
                        <div class="modal-content" style="font-family: 'Wendy One', sans-serif; background: url('../img/brick-wall.png')">
                            <h3 class="left">Informacion:</h3>
                            <br><br><br>
                            <div class="row">
                                <div class="col l6">
                                    <h6 class="left" style="font-family: 'Oswald', sans-serif;"><?= $p['tipo'] ?></h6>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col l6">
                                    <h6 class="left" style="font-family: 'Oswald', sans-serif;"><?= $p['descripcion'] ?></h6>
                                </div>


                            </div>





                        </div>

                    </div>

                    <div id="modal<?= $p['id'] ?>" class="modal">
                        <div class="modal-content" style="background: url('../img/brick-wall.png');">

                            <h3 class="left"><b>Realizar Respuesta</b></h3>
                            <br><br>

                            <p class="red-text left">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </p>

                            <p class="green-text left">
                                <?php
                                if (isset($_SESSION['respuesta'])) {
                                    echo $_SESSION['respuesta'];
                                    unset($_SESSION['respuesta']);
                                }
                                ?>
                            </p>

                            <form action="../controllers/NuevaRespuesta.php" method="POST">
                                <div class="input-field">
                                    <div class="input-field">
                                        <input id="id" type="hidden" value="<?= $p['id'] ?>" name="id">

                                    </div>
                                    <div class="input-field">
                                        <input id="respuesta" type="text" name="respuesta">
                                        <label for="respuesta">Ingrese una respuesta</label>
                                    </div>

                                    <button class="btn teal lighten-2 ancho-100" style="background: url(../img/black-felt.png);">Publicar</button>
                                </div>
                            </form>


                        </div>

                    </div>
                <?php } ?>

















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
<?php
require_once('models/PublicacionModel.php');

use models\PublicacionModel as PublicacionModel;

$publicacionModel = new PublicacionModel();
$publicaciones = array_reverse($publicacionModel->publicacionesAll());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <title>Inicio</title>
</head>

<body class="blue lighten-4" style="background: url('img/black-felt.png'); font-family: 'Oswald', sans-serif;">
    <header>

        <?php
        session_start();
        if (isset($_SESSION['usuario'])) { ?>


            <?php
            $user = $_SESSION['usuario'];
            

            ?>
            <nav>
                <div class="nav-wrapper teal lighten-2" style="background: url('img/black-felt.png')">
                    <b style="margin-left: 8px;">Bienvenido <?= $_SESSION['usuario']['nombre'] ?></a></b>
                    <a href="../index.php" class="brand-logo center" style="font-family: 'Anton', sans-serif;">Portal</a>


                    <ul id="nav-mobile" class="right hide-on-med-and-down">

                        <li class="active"><a href="../portal-medico/views/nueva_p.php">Crear</a></li>
                        <li><a href="../portal-medico/views/mis_consultas.php">Mis Consultas</a></li>
                        <li><a href="../portal-medico/views/salir.php">Salir</a></li>
                    </ul>
                </div>

            </nav>

        <?php } else { ?>
            <nav>
                <div class="nav-wrapper teal lighten-2" style="background: url('img/black-felt.png')">
                    <a href="#" class="brand-logo center" style="font-family: 'Anton', sans-serif;">Portal</a>


                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="white-text dropdown-trigger" data-target="dropdown1"><i class="material-icons left">person_outline</i>REGISTROS</a></li>

                    </ul>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="white-text dropdown-trigger" data-target="dropdown2"><i class="material-icons left">person</i>SESIONES</a></li>

                    </ul>

                </div>

            </nav>


        <?php  } ?>

    </header>

    <div id='dropdown1' class='dropdown-content white' style="background: url(img/brick-wall.png);">
        <li><a href="registro_u.php"><i class="material-icons">person</i>Usuario</a></li>

        <li><a href="registro_m.php"><i class="material-icons">person_outline</i>Medico</a></li>

    </div>
    <div id="dropdown2" style="background: url(img/brick-wall.png);" class="dropdown-content white">
        <li><a href="login_u.php"><i class="material-icons">person</i>Usuario</a></li>

        <li><a href="login_m.php"><i class="material-icons">person_outline</i>Medico</a></li>
    </div>

    <main>
        <br>
        <div class="row">
            <div class="col l8 offset-l2">
                <div class="card-panel center" style="background: url(img/marco.jpg);">
                    <h3><b>BIENVENIDOS A PORTAL AYUDA MEDICA</b></h3>
                    <h6><b>Sitio Web donde tendras respuestas a todas tus consultas medicas.</b></h6>
                    <li class="material-icons tooltipped right" style="color: teal;" data-position="bottom" data-tooltip="INICIA SESIÓN O SI NO TIENES CUENTA REQUISTRÁTE, ASÍ PODRÁS INGRESAR Y HACER TUS CONSULTAS">info</li>
                    <h5><b></b></h5>



                </div>

            </div>

        </div>
        <div class="row">
            <div class="col l6 offset-l3">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">filter_drama</i>
                            <b>QUE SERVICIOS OFRECEMOS?</b>
                            <span class="new badge"></span>
                        </div>
                        <div class="collapsible-body white">
                            <b>QUE SERVICIOS OFRECEMOS?</b>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">place</i>
                            <b>QUIENES SOMOS?</b>
                            <span class="new badge"></span>
                        </div>
                        <div class="collapsible-body white">
                            <b>QUE SERVICIOS OFRECEMOS?</b>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
        <?php foreach ($publicaciones as $p) { ?>
            <div class="row">
                <div class="col l6 offset-l3 ">
                    <div class="card-panel left-align white animated" style="background: url(img/brick-wall.png);">

                        <h6 class="left" style="font-family: 'Zilla Slab Highlight', cursive;"><b><?= $p['titulo'] ?></b><u></u></h6>
                            <h6></h6>
                            <br>
                            <br>
                            <button  style="background: url('img/black-felt.png')" class="btn-small modal-trigger teal lighten-2" href="#modal<?= $p['id'] ?>"><i class="material-icons">info</i></button>
                            
                            <a href ="../portal-medico/views/respuesta_p.php?idFK=<?= $p['id'] ?>"class="waves-effect waves-light btn-small teal lighten-2"  style="background: url('img/black-felt.png')"><i class="material-icons left " style="color:darkslategrey;">comment</i>Respuestas</a>


                    </div>



                </div>
                <br>



            </div>


            <div id="modal<?= $p['id'] ?>" class="modal">
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
        <?php } ?>




    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems, {
                height: 450,
                indicators: true
            });

            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);

            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);

            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                hover: true,
                constrainWidth: false,
                coverTrigger: false,
                closeOnClick: false
            });

            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);



        });
    </script>

</body>

</html>
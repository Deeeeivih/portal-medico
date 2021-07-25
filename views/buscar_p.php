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

                            <li><a href="../views/salir_u.php">Salir</a></li>
                        </ul>


                    </div>



                </nav>
                <br><br>



            </header>


            <main>
                <div class="row">
                    <div class="col l10 offset-l1">
                        <div class="card-panel white" style="background: url(../img/brick-wall.png);">
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
                            <br>
                            <form action="../controllers/BuscarPub.php" method="POST">
                                <div class="input-field">
                                    <input id="tipo" type="text" name="tipo">
                                    <label for="tipo">Ingrese un tipo</label>
                                </div>
                                <button class="btn teal lighten-2 ancho-100" style="background: url(../img/black-felt.png);">Publicar</button>
                            </form>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col l10 offset-l1">
                        <div class="card-panel white" style="background: url(../img/brick-wall.png);">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Publicacion</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>

                                    </tr>

                                </tbody>
                            </table>
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

            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);



        });
    </script>
</body>

</html>
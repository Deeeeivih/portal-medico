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
    <title>Registro Usuario</title>
</head>

<body class="blue lighten-4" style="background: url('img/black-felt.png'); font-family: 'Oswald', sans-serif;">
    <header>

        <nav>
            <div class="nav-wrapper teal lighten-2" style="background: url('img/black-felt.png')">
                <a href="#" class="brand-logo center" style="font-family: 'Anton', sans-serif;">Portal</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php" class="white-text"><i class="material-icons left">arrow_back</i></a>
                    </li>

                </ul>

            </div>

        </nav>

    </header>

    <main>
        <br>
        <div class="row">
            <div class="col l m4 s12">

            </div>
            <div class="col l4 m4 s12">
                <div class="card-panel white" style="background: url(img/brick-wall.png);">
                    <h6><b>REGISTRO USUARIO</b></h6>
                    <p class="green-text">
                        <?php
                        session_start();
                        if (isset($_SESSION['respuesta'])) {
                            echo $_SESSION['respuesta'];
                            unset($_SESSION['respuesta']);
                        }
                        ?>
                    </p>
                    <p class = "red-text">
                        <?php
                            
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                   
                    <form action="controllers/RegistroUsuario.php" method="POST">
                        <div class="input-field">
                            <input id="rut" type="text" name="rut">
                            <label for="rut">Ingrese rut</label>
                        </div>
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Ingrese nombre</label>
                        </div>
                        <div class="input-field">
                            <input id="clave" type="password" name="clave">
                            <label for="clave">Ingrese clave</label>
                        </div>
                        <br>
                       
                        <button class="btn teal lighten-2 right" style="background: url('img/black-felt.png')">Registrarme</button>
                        <br>
                        <br>
                        <a href="login_u.php" class = "right">Ya tienes una cuenta?</a>
                        <br>

                    </form>

                </div>
            </div>
            <div class="col l4 m4 s12">

            </div>
        </div>

    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>


</html>
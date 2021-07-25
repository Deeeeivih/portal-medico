<?php

session_start();
if (isset($_SESSION['medico'])) {
    unset($_SESSION['medico']);
    session_destroy();
}
header("Location: ../index.php");

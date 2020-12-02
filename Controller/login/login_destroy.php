<?php
//Se destruye la sesion y se redirige al index
session_start();
session_destroy();
header("Location:/SISTEMA EXPEDIENTES/index.php");

?>
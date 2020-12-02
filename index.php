<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Inicio de sesíon - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">
</head>


<body class="bg-secondary" >
    <!----Encabezado de la pagina-------------------------------------->
    <header class="container-fluid bg-dark">
     <div class="container row offset-lg-1">
        <div class="col-lg-2 col-md-2 col-sm-2">
            <figure>
                <img src="/SISTEMA EXPEDIENTES/View/images/logo-removebg.png" width=150 heigth=150>
            </figure>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
            <h1 class="bg-transparent display-4 font-weight-bold text-warning mt-5">Sistema de Expedientes (SGE)</h1>
            <h3 class="font-italic display-4 text-success">Municipalidad de Fernández</h3>
        </div>
    </div>
    </header>
    <!-------------------------------------------------------------------->
<br>
    
<?php
//Incorpora toda la parte grafica y funcional de iniciar sesion.. y los encabezados que se muestran a un usuario que inicio sesion...
require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Controller/login/login_start.php");

?>

</body>


</html>
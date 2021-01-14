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
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
    <!-------------------------------------------------------------------->
<br>
    
<?php
//Incorpora toda la parte grafica y funcional de iniciar sesion.. y los encabezados que se muestran a un usuario que inicio sesion...
require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Controller/login/login_start.php");

?>

</body>


</html>
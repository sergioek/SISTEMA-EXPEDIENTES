<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Menu Administracíon - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

    <!-- Una seccion php para comprobar sino existe una sesion iniciada.. sino existe te redirige al index--->
    <?php
    session_start();
    if(!isset($_SESSION["registrer"])){
        header("Location:/SISTEMA EXPEDIENTES/View/admin/access.php");
    }
    ?>

</head>

<body class="bg-white">

<!----Encabezado de la pagina-------------------------------------->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
<!-------------------------------------------------------------------->

<!--Encabezado con el nombre de usuario y los botones menu y cerrar sesion---->
<nav class="col-lg-3 offset-lg-9">

    <ul class="container row mt-lg-2">
        <li class="offset-1" style="list-style:none;"><label class="text-success font-weight-bold">Usuario: </label><label for=""><?php echo $_SESSION["registrer"]; ?></label></li>
        <!--El label trae una zona php para mostar el usuario de sesion-->
    </ul>

    <ul class="container row mt-lg-2">
        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/View/admin/menu.php"><input type="button" value="<-INICIO" class="btn btn-info"></a></li>

        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php"><input type="button" value="Cerrar Sesíon" class="btn btn-danger"></a></li>
    </ul>

</nav>
    
    
    <div class="container row col-lg-12 offset-lg-0 mb-1 mt-lg-5">


        <section class="bg-info col-lg-6">
            <a href="/SISTEMA EXPEDIENTES/View/area/new_area.php" target="blank">
            <article style="height:280px;">
                <label for=""class=" display-4 text-white font-weight-bold offset-lg-4 mt-4 font-italic">ÁREAS</label>
        
                <img src="/SISTEMA EXPEDIENTES/View/images/areas.png" alt="" width="300" height="150" class="offset-lg-3">
            </article></a>

        </section>

        <section class="bg-success col-lg-6">
            <a href="/SISTEMA EXPEDIENTES/View/user/new_user_admin.php" target="blank"><article>
                <label for=""class=" display-4 text-white font-weight-bold offset-lg-1 mt-4 font-italic">USUARIOS DEL SISTEMA</label>
       
                <img src="/SISTEMA EXPEDIENTES/View/images/registro de usuarios.png" alt="" width="150" height="150"  class="offset-lg-5">
        
            </article></a>

        </section>

</div>
 

</body>

</html>
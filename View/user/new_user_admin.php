<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Registro de Administradores y Opradores de Área - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">
<!-- Una seccion php para comprobar sino existe una sesion iniciada desde administracion o desde iniciar sesion.. sino existe te redirige al index--->
    <?php
    session_start();
    if(!isset($_SESSION["registrer"])){
        header("Location:/SISTEMA EXPEDIENTES/View/admin/access.php");
    }
    //Incorpora un archivo sql para obtener las areas y mostrarlas dentro del archivo en la lista desplegable
    require($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/user_search_area.php');
    ?>
</head>

<body>

<!----Encabezado de la pagina-------------------------------------->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
<!-------------------------------------------------------------------->

<!--Encabezado con el nombre de usuario y los botones menu y cerrar sesion---->
<nav class="col-lg-3 offset-lg-9">

    <ul class="container row mt-lg-2">
        <li class="offset-1" style="list-style:none;"><label class="text-success font-weight-bold">Usuario: </label><label for=""><?php echo $_SESSION["registrer"];?></label></li>
        <!--El label trae una zona php para mostar el usuario de sesion-->
    </ul>

    <ul class="container row mt-lg-2">
        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/View/admin/menu.php"><input type="button" value="<-INICIO" class="btn btn-info"></a></li>

        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php"><input type="button" value="Cerrar Sesíon" class="btn btn-danger"></a></li>
    </ul>

</nav>

<!---------------Texto--------------------------------->
    <div class="container col-lg-9 offset-lg-3">
            <h1 class="bg-transparent text-primary mt-2 font-weight-bold">Registro de Usuarios</h1>
    </div>
<!------------------------------------------------------->

<!--Formulario de busqueda.. se recarga al presionar search-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">

    <tr><td><input class="form-control col-lg-8" type="number" name="dni" id="dni" max="100000000" required required placeholder="Ingrese un DNI para buscar o crear un administrador/operador" ></td></tr>

    <tr><td><input class="form-control col-lg-2 btn btn-info " type="submit" name="search" value="Buscar"></td></tr>

    </table>

</form>


<?php
//Al presionar buscar usuario por dni
if(isset($_POST["search"])){
    $dni=$_POST["dni"];
    require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/Model/user/select_exist_user.php");
    //Si no se encuentra a un usuario porque la variable nombre eta vacia
    if(!isset($name)){
        require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/View/user/form-user-admin.php");
    }else{
        require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/View/user/form-edit-user-admin.php");
    }
}

?>


<?php
//Si el usuario pulsa el boton registrar se comprube si los password son iguales, si lo son se llama al archivo para hacer las validaciones restantes
if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $password_verify = $_POST["password_verify"];
    if ($password == $password_verify) {
        if(!is_numeric($password)){
            require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/create_user.php'); 
        }else{
            echo '<script language="javascript">alert("Los password no pueden ser unicamente numeros");</script>';
        }
       
    } else {
        echo '<script language="javascript">alert("Los password no coinciden");</script>';
    }
}

if(isset($_POST["update"])){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/edit_user(admin).php'); 
}
?>
</body>

</html>
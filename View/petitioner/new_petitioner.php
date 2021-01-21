<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de solicitantes,Sistema de Expedientes">
    <title>Registro de Solicitantes - Sistema de Expedientes Municipales</title>
    <!---Incorporando bootstrap------------------------------------>
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

    <?php
    //Zona php para combrobar si se inicio una sesion. sino se inicio te dirije al index
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:/SISTEMA EXPEDIENTES/index.php");   
    }
    ?>
</head>


<body>

<!----Encabezado de la pagina-------------------------------------->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
<!-------------------------------------------------------------------->

<!--Encabezado con el nombre de usuario y los botones menu y cerrar sesion---->
<?php require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/View/login/sign_off.php");?>
<!---------------Texto--------------------------------->
<div class="container col-lg-9 offset-lg-3">
        <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Registro de Solicitantes</h4>
</div>
<!------------------------------------------------------->


<!--Formulario de busqueda.. se recarga al presionar search-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">

    <tr><td><input class="form-control col-lg-8" type="number" name="dni" id="dni" max="40000000000" value="<?php echo $dni;?>" required required placeholder="Ingrese un DNI o CUIL/CUIT para buscar o crear un solicitante" ></td></tr>

    <tr><td><input class="form-control col-lg-2 btn btn-info " type="submit" name="search" value="Buscar"></td></tr>

    </table>

</form>

<!--------------------Zona php---------------------------------->

<?php
//Cuando el usuario complete el dni y pulse el boton search la pagina se recargara e incluira el archivo search petitioner
if(isset($_POST["search"])){
    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/search_petitioner.php");
    //Si se pulsa el boton search y el campo name no esta vacio como consecuencia de que se encontro un usuario, se habilitan los botones actualizar o eliminar y se imprime un javascript
    if(!empty($name_petitioner)){
        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/petitioner/form-update.php");

        echo"<script lenguage='javascript'>alert('Se encontro un solicitante en la base de datos. Puede actualizarlo o eliminarlo.')</script>";
    }else {
        //Al no encontrase usuario se carga el formulario vacio
        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/petitioner/form-new.php");
        echo"<script lenguage='javascript'>alert('No se encontro ningun solicitante en la base de datos. Puede cargar un solicitante')</script>";
    }
}
?>


<!----Zona php con las acciones de los botones------->
<?php
if(isset($_POST["update"])){
    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/update_petitioner.php");
}
//Si se presiona delete se llama al archivo para eliminar un nuevo usuario

if(isset($_POST["delete"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/delete_petitioner.php");
}
//Si se presiona save se llama al archivo para crear un nuevo usuario

if(isset($_POST["save"])){
    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/create_petitioner.php");
}
?>

</form>
 
</body>

</html>
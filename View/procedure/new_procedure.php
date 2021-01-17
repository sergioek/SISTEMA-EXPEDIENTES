<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title> Crear Trámites - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">
<!-- Una seccion php para comprobar sino existe una sesion iniciada..-->
    <?php
     session_start();
     if($_SESSION["rol"]!=1){
         echo'<script>alert("No tiene los permisos de administrador para acceder a crear o editar trámites.")</script>';
         echo'<a href="/SISTEMA EXPEDIENTES/index.php"><input type="button" value="Volver" style="color:white;background-color:orange;width:100%;height:100px;font-size:20px;"></a>';
         exit();
     }

    //Inicializa variables vacias para poder set en los cuadros de texto del formulario de datos
    $name="";
    $area_procedure="";
    $requeriments="";

    //Incorpora un archivo sql para obtener los tramites y mostrarlas dentro del archivo en la lista desplegable
    require($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Model/procedure/search_procedure.php');
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
            <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Nuevo Trámite</h4>
    </div>
<!------------------------------------------------------->


<!--Formulario de busqueda.. se recarga al presionar search-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">

    <tr>
        <td>
            <select name="id" id=""class="form-control col-lg-8">
                <option value="<?php echo 0; ?>">CREAR UN NUEVO TRÁMITE</option>
                <?php foreach($registro as $procedure):?>
                <option value="<?php echo $procedure->ID;?>"><?php echo $procedure->NOMBRE;?></option>
                <?php endforeach;?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            <input class="form-control col-lg-2 btn btn-info" type="submit" name="search" value="Crear/Editar">
        </td></tr>

    </table>

</form>
<!------------------------------------------------------->



<!--------------------Zona php---------------------------------->



<?php
    //Cuando el usuario complete el el nombre y pulse el boton search la pagina se recargara e incluira el archivo search procedure por los que las variables antes definidas tomaran valores si se encuatra un traite e impactaran en los cuadros de texto
    if(isset($_POST["search"])){

        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/procedure/select_procedure.php");

        if(empty($name)){
            require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/procedure/form_new_procedure.php");
        }else{
            require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/procedure/form_update_procedure.php");
        }
    }

    //Si el usuario pulsa el boton guardar...
    if (isset($_POST["save"])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/procedure/create_procedure.php'); 
        //Refrescar para poder mostar los tramites creados en el select
        $self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
        header("refresh:0; url=$self"); //Refrescamos a los 0 seg
    }

    //Si el usuario pulsa el boton actualizar...
    if (isset($_POST["update"])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/procedure/update_procedure.php'); 
        //Refrescar para poder mostar los tramites creados en el select
        $self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
         header("refresh:0; url=$self"); //Refrescamos a los 0 seg
    }

    ?>

    </div>
</body>

</html>
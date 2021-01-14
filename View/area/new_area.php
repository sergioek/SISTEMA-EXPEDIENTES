<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Áreas Municipales - Sistema de Expedientes Municipales</title>
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

    //Inicializa variables vacias para poder set en los cuadros de texto del formulario de datos
    $name_area="";
    $description_area="";
     $chief_area="";
    $telephone_area="";
    $email_area="";

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
        <li class="offset-1" style="list-style:none;"><label class="text-success font-weight-bold">Usuario: </label><label for=""><?php echo $_SESSION["registrer"]; ?></label></li>
        <!--El label trae una zona php para mostar el usuario de sesion-->
    </ul>

    <ul class="container row mt-lg-2">
        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/View/admin/menu.php"><input type="button" value="<-INICIO" class="btn btn-info"></a></li>

        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php"><input type="button" value="Cerrar Sesíon" class="btn btn-danger"></a></li>
    </ul>

</nav>
<!---------------Texto--------------------------------->
    <div class="container col-lg-9 offset-lg-3">
            <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Áreas Municipales</h4>
    </div>
<!------------------------------------------------------->


<!--Formulario de busqueda.. se recarga al presionar search-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">

    <tr>
        <td>
            <select name="search_name" id="search_name"class="form-control col-lg-8">
                <option name="NUEVA_ÁREA">CREAR UNA NUEVA ÁREA</option>
                <?php foreach($registro as $area):?>
                <option name="search_name=<?php echo $area->NOMBRE;?>"><?php echo $area->NOMBRE;?></option>
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
    //Cuando el usuario complete el el nombre y pulse el boton search la pagina se recargara e incluira el archivo search area por los que las variables antes definidas tomaran valores si se encuatra un area e impactaran en los cuadros de texto
    if(isset($_POST["search"])){

        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/area/search_date_area.php");

        if(empty($name_area)){
            require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/area/form_new.php");
        }else{
            require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/View/area/form_update.php");
        }
    }

    //Si el usuario pulsa el boton guardar...
    if (isset($_POST["save"])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/area/create_area.php'); 
    }

    //Si el usuario pulsa el boton actualizar...
    if (isset($_POST["update"])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/area/update_area.php'); 
    }
    ?>

    </div>
</body>

</html>
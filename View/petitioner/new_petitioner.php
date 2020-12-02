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


<!--------------------------Encabezado------------------------------------>

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

</header>

<!--Encabezado con el nombre de usuario y los botones menu y cerrar sesion---->
<?php require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/View/login/sign_off.php");?>
<!---------------Texto--------------------------------->
<div class="container col-lg-9 offset-lg-3">
        <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Registro de Solicitantes</h4>
</div>
<!------------------------------------------------------->



<!--------------------Zona php---------------------------------->

<?php
//Inicializa variables vacias para poder set en los cuadros de texto del formulario de datos
$dni="";
$name="";
$date="";
$home="";
$telephone="";
$email="";
//Cuando el usuario complete el dni y pulse el boton search la pagina se recargara e incluira el archivo search petitioner por los que las variables antes definidas tomaran valores si se encuatra un usuario e impactaran en los cuadros de texto
if(isset($_POST["search"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/search_petitioner.php");

}
?>

<!--Formulario de busqueda.. se recarga al presionar search-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">


    <tr><td><input class="form-control col-lg-8" type="number" name="dni" id="dni" max="100000000" value="<?php echo $dni;?>" required required placeholder="Ingrese un DNI para buscar un solicitante" ></td></tr>

    <tr><td><input class="form-control col-lg-2 btn btn-info " type="submit" name="search" value="Buscar"></td></tr>

    </table>

</form>
<!------------------------------------------------------->
<!----Zona php con las acciones de los botones------->
<?php
//Si se presiona save se llama al archivo para crear un nuevo usuario
if(isset($_POST["save"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/create_petitioner.php");
}
//Si se presiona update se llama al archivo para actualizar un nuevo usuario

if(isset($_POST["update"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/update_petitioner.php");
}
//Si se presiona delete se llama al archivo para eliminar un nuevo usuario

if(isset($_POST["delete"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/delete_petitioner.php");
}
?>


<!---Formulario de solicitante ---->
<form action="" method="post">
<table class="table container col-lg-8 offset-lg-3">


    <tr><td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z ]{8,50}" title="Use mayusculas hasta 50 caracteres sin simbolos extraños" placeholder="Nombres y apellidos completos" value="<?php echo $name;?>" required></td></tr>

    <tr><td><input class="form-control col-lg-8" type="number" name="dni" id="dni" min="10000000" max="99000000" value="<?php echo $dni;?>" required placeholder="DNI" ></td></tr>

    <td class="display-6 text-dark">Seleccione fecha de nacimiento:</td>
    <tr><td><input class="form-control col-lg-8" type="date" name="date" id="date" min="1950-01-01" max="2005-01-01"  placeholder="Seleccione una fecha" value="<?php echo $date;?>" required></td></tr>

    <tr><td><input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Domicilio actual"value="<?php echo $home;?>" required></td></tr>

    <tr><td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Telefono en 10 digitos" value="<?php echo $telephone;?>"  required></td></tr>

    <tr><td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Correo electronico"  value="<?php echo $email;?>" required></td></tr>
<!---------------------------------------------------------------------->
<?php
//Si se pulsa el boton search y el campo name no esta vacio como consecuencia de que se encontro un usuario, se habilitan los botones actualizar o eliminar y se imprime un javascript
if(isset($_POST["search"])){
    if(!empty($name)){
        
        echo"<tr><td><input class='btn btn-success col-lg-8' type='submit' name='update'value='Actualizar'></td></tr>";

        echo"<tr><td><input class='btn btn-warning col-lg-8' type='submit' name='delete'value='Eliminar'></td></tr>";

        echo"<script lenguage='javascript'>alert('Se encontro un solicitante en la base de datos. Puede actualizarlo o eliminarlo.')</script>";
//Sino se habilita el boton guardar y se muestra un mensaje javascript porque a pesar de oprimir submit no se encontro un usuario
    }else {
        echo"<tr><td><input class='btn btn-primary col-lg-8' type='submit' name='save'value='Guardar'></td></tr>";
        echo"<script lenguage='javascript'>alert('No se encontro ningun solicitante en la base de datos')</script>";
        
    }
    //Por defecto al cargar por primera vez la pagina se mostrara el boton guardar, ya que no se ha pulsado el boton submit
}else{
    echo"<tr><td><input class='btn btn-primary col-lg-8' type='submit' name='save'value='Guardar'></td></tr>";
}
      

?>

</table>


</form>
 
</body>

</html>
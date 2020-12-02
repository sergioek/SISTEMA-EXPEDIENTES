<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Nuevo Expediente - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

    <?php
    //Zona php para combrobar si se inicio una sesion. sino se inicio dirije al index
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:/SISTEMA EXPEDIENTES/index.php");   
    }
    ?>

</head>

<?php
//Si el usuario pulsa el boton Iniciar expediente...
if (isset($_POST["registrar"])) {
    require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Controller/proceedings/new_proceedings.php");
}
?>

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
            <h4 class="bg-transparent display-4  text-secondary mt-2 font-weight-bold">Iniciar Expediente</h4>
    </div>
<!------------------------------------------------------->

    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!----Tabla de busqueda de solicitante---->
        <table class="table container col-lg-8 offset-lg-3">
            <tr><td><input class="form-control col-lg-8" type="number" name="dni" id="dni" max="100000000" value="<?php echo $dni;?>" placeholder="Ingrese un DNI para buscar un solicitante"></td></tr>

            <tr>
                <td>
                    <input class="form-control col-lg-2 btn btn-info " type="submit" name="search" value="Buscar">

                    <a href="/SISTEMA EXPEDIENTES/View/petitioner/new_petitioner.php" target="blank"><input class="form-control col-lg-3 btn btn-success " type="button" value="Registrar solicitante"></a>
                </td>
        
            </tr>

        </table>
    </form>


    <?php
//Inicializa variables vacias para poder set en los cuadros de texto del formulario de datos
$dni="";
$name="";
//Cuando el usuario complete el dni y pulse el boton search la pagina se recargara e incluira el archivo search petitioner por los que las variables antes definidas tomaran valores si se encuatra un usuario e impactaran en los cuadros de texto.. En ese momento aparecera el formulario para iniciar el tramite
if(isset($_POST["search"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/petitioner/search_petitioner.php");

    if(!empty($name)){
        echo"<script lenguage='javascript'>alert('Se encontro un solicitante.Puede ahora cargar el tramite')</script>";
        require_once($_SERVER["DOCUMENT_ROOT"]. "/SISTEMA EXPEDIENTES/View/proceedings/form.php");
    }else{
        echo"<script lenguage='javascript'>alert('No se encontro un solicitante. Registre un solicitante, y luego vuelva en esta ventana para iniciar un tramite')</script>";
    }

}
?>


    </div>
</body>

</html>
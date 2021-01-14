<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Gestionar Expediente - Sistema de Expedientes Municipales</title>
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

    //Si el usuario pulsa el boton Iniciar NUEVO expediente...
    if (isset($_POST["registrar"])) {
        require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Controller/proceedings/new_proceedings.php");
    }

    //al presionar el boton Guardar gestion del fomulario form_manage, se llama el archivo del controlador para hacer las verificaciones correspondientes. 
    if(isset($_POST["gestionar"])){
        require($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/proceedings/manage_proceedings.php');
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
            <h4 class="bg-transparent display-4  text-secondary mt-2 font-weight-bold">Gestionar Expediente</h4>
    </div>
<!------------------------------------------------------->

    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!----Tabla de busqueda de expediente---->
        <table class="table container col-lg-8 offset-lg-3">
            <tr>
                <td>
                    <input class="form-control col-lg-8" type="number" name="number" id="number" max="100000000" placeholder="N° DE EXPEDIENTE" title="N° DE EXPEDIENTE">

                    <input class="form-control col-lg-8" type="number" name="year" id="year" max="100000000" placeholder="AÑO" value="<?php echo date('Y');?>" title="AÑO DEL EXPEDIENTE">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="form-control col-lg-3 btn btn-info " type="submit" name="search" value="Buscar Expediente">

                    <a href="/SISTEMA EXPEDIENTES/View/proceedings/new_proceedings.php" target="blank"><input class="form-control col-lg-3 btn btn-success " type="button" value="Nuevo Expediente"></a>
                </td>
        
            </tr>

        </table>
    </form>


    <?php
//Inicializa variables vacias para poder set en los cuadros de texto del formulario de datos
$number="";
$year="";
//Cuando el usuario complete el numero y pulse el boton search la pagina se recargara e incluira el archivo search petitioner por los que las variables antes definidas tomaran valores si se encuatra un expediente e impactaran en los cuadros de texto.. En ese momento aparecera el formulario para gestionar el tramite
if(isset($_POST["search"])){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/proceedings/search_proceedings.php");

    if(!empty($number)){
        echo"<script lenguage='javascript'>alert('Se encontro un expediente.Puede ahora cargar el tramite')</script>";
        require_once($_SERVER["DOCUMENT_ROOT"]. "/SISTEMA EXPEDIENTES/View/proceedings/form_manage.php");
    }else{
        echo"<script lenguage='javascript'>alert('No se encontro un expediente. Registre un nuevo expediente, y luego vuelva en esta ventana para iniciar un tramite')</script>";
    }

}
?>

    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Control de expedientes - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

    <?php
    //Zona php para combrobar si se inicio una sesion 
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:/SISTEMA EXPEDIENTES/index.php");
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
<?php require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/View/login/sign_off.php");?>
<!---------------Texto--------------------------------->
    <div class="container col-lg-9 offset-lg-3">
            <h4 class="bg-transparent display-4  text-danger mt-2 font-weight-bold">Control de Expedientes</h4>
    </div>
<!------------------------------------------------------->

    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!----Tabla de busqueda de solicitante---->
        <table class="table container col-lg-8 offset-lg-3">
            <tr>
               
                <td><label for="">Área a analizar:</label>
                    <select name="area" id="area" class="form-control col-lg-8" title="Seleccione el área a la cual deseas analizar">
                        <!--Bucle foreach para insertar las areas de la bd obtenida a partir de new user search area-->
                        <?php
                        foreach ($registro as $areas) :?>
                            <option name="area=<?php echo $areas->NOMBRE;?>"><?php echo $areas->NOMBRE;?></option>
                        <?php
                        endforeach;
                        ?>

                    </select required>
                </td>
            </tr>

            <tr>
                <td><label for="">Desde:</label>
                    <input class="form-control col-lg-8" type="date" name="date_initial" id="" title="Ingrese una fecha y hora" required>
                </td>
            </tr>

            <tr>
                <td><label for="">Hasta:</label>
                    <input class="form-control col-lg-8" type="date" name="date_end" id="" title="Ingrese una fecha y hora" required>
                </td>
            </tr>

            <tr>
                <td><label for="">Filtrar por:</label>
                        <select name="filter" id=""class="form-control col-lg-8" required>
                            <option value="EXPEDIENTES INICIADOS">EXPEDIENTES INICIADOS</option>
                            <option value="EXPEDIENTES GESTIONADOS">EXPEDIENTES GESTIONADOS</option>
                            <option value="EXPEDIENTES PENDIENTES">EXPEDIENTES PENDIENTES(EN TRÁMITE CON PASE A ESTA ÁREA)</option>
                            <option value="EXPEDIENTES FINALIZADOS">EXPEDIENTES FINALIZADOS-ARCHIVADOS POR TODAS LAS ÁREAS</option>
                        </select>
                </td>
            </tr>

            <tr>
                <td>
                    <input class="form-control col-lg-2 btn btn-info " type="submit" name="search" value="Buscar">
                </td>
        
            </tr>

        </table>
    </form>


<?php

    if(isset($_POST["search"])){

        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Controller/proceedings/control_proceedings.php");
    }

?>


    </div>
</body>

</html>
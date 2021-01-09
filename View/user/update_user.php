<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Mi cuenta - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">
<!-- Una seccion php para comprobar sino existe una sesion iniciada.. sino existe te redirige al index--->
    <?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:/SISTEMA EXPEDIENTES/index.php");
    }else{
        //Un archivo que trae los datos del usuario que inicio sesion y los incorpora para poder llenar los input
        require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/Model/user/select_exist_user.php");
      
        //Incorpora un archivo sql para obtener las areas y mostrarlas dentro del archivo en la lista desplegable
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/user_search_area.php');

    }
    //Si el usuario pulsa udpate... llama para hacer las comprobaciones
    if(isset($_POST["update"])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/edit_user.php');
    }
    //Si pulsa delete se iniciaran aciones para eliminar la cuenta
    if(isset($_POST["delete"])){
      require_once($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/delete_user.php');
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
        <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Mi cuenta de Usuario</h4>
</div>
<!------------------------------------------------------->

    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo principalmente el php del encabezado-->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use mayusculas hasta 50 caracteres" placeholder="Ingrese sus nombres y apellidos completos en MAYUSCULAS" required value="<?php echo $name;?>"></td>
            </tr>

            <td class="display-6 text-muted">Seleccione fecha de nacimiento:</td>
            <tr>
                <?php 
                //Determinando la fecha max para asegurar que se registren mayores de edad
                $mes=date('m');
                $dia=date('d');
                $fechamax=date('Y')-18 ."-"."$mes"."-"."$dia";
                ?>
                <td><input class="form-control col-lg-8" type="date" name="date" id="date" min="1940-01-01" max="<?php echo $fechamax;?>" placeholder="Seleccione una fecha" required value="<?php echo $date;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Su domicilio actual" required value="<?php echo $home;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Su telefono en 10 digitos" required value="<?php echo $telephone;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Su correo electronico" required value="<?php echo $email;?>"></td>
            </tr>

            <tr>
                <td>
                    <select class="form-control col-lg-8" name="area" id="area">
                        <!--Bucle foreach para insertar las areas de la bd obtenida a partir de new user search area  no usar value-->
                        <?php
                        foreach ($registro as $areas) : ?>
                            <option name="area=<?php echo $areas->NOMBRE; ?>"><?php echo $areas->NOMBRE; ?></option>
                        <?php
                        endforeach;
                        ?>

                    </select required>
                </td>
            </tr>



            <tr>
                <td><input class="form-control col-lg-8" type="text" name="charge" id="charge" maxlength="50" placeholder="Ingrese su cargo" required value="<?php echo $charge;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password_actual" id="password_actual" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Contraseña actual" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password_nuevo" id="password_nuevo" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Nueva contraseña repita contraseña actual" required></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4 text-info"><label for="">*Una vez completados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-success col-lg-12" type="submit" name="update" value="Actualizar"></td>
            </tr>

            <tr class="container row mt-5">
                <td class="col-lg-4 text-danger"><label for="">*SI DESEA ELIMINAR SU CUENTA:</label></td>
                
                <td class="col-lg-4"><input class="btn btn-danger btn-sm col-lg-6 offset-lg-3" type="submit" name="delete" value="ELIMINAR CUENTA"></td>
            </tr>

        </table>



    </form>

    </div>
</body>

</html>
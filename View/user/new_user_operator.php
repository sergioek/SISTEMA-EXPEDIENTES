<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Registro de Operarios del Área- Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">
<!-- Una seccion php para comprobar sino existe una sesion iniciada con privilegios de adm desde .. sino existe te redirige al index--->
    <?php
    session_start();
    if($_SESSION["rol"]!=1){
        echo'<script>alert("No tiene los permisos de administrador para acceder a crear usuarios")</script>';
        echo'<a href="/SISTEMA EXPEDIENTES/index.php"><input type="button" value="Volver" style="color:white;background-color:orange;width:100%;height:100px;font-size:20px;"></a>';
        exit();
    }
    ?>
</head>

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

?>

<body>

<!----Encabezado de la pagina-------------------------------------->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
<!-------------------------------------------------------------------->

<!--Encabezado con el nombre de usuario y los botones menu y cerrar sesion---->
<nav class="col-lg-3 offset-lg-9">

    <ul class="container row mt-lg-2">
        <li class="offset-1" style="list-style:none;"><label class="text-success font-weight-bold">Usuario: </label><label for=""><?php echo $_SESSION["user"];?></label></li>
        <!--El label trae una zona php para mostar el usuario de sesion-->
    </ul>

    <ul class="container row mt-lg-2">
        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/index.php"><input type="button" value="<-INICIO" class="btn btn-info"></a></li>

        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php"><input type="button" value="Cerrar Sesíon" class="btn btn-danger"></a></li>
    </ul>

</nav>

<!---------------Texto--------------------------------->
    <div class="container col-lg-9 offset-lg-3">
            <h4 class="bg-transparent display-4  text-primary mt-2 font-weight-bold">Registro de Operadores</h4>
    </div>
<!------------------------------------------------------->

    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use mayusculas hasta 50 caracteres" placeholder="Ingrese sus nombres y apellidos completos en MAYUSCULAS" required></td>
            </tr>


            <tr>
                <td><input class="form-control col-lg-8" type="number" name="dni" id="dni" min="10000000" max="99000000" title="Use numeros hasta 8 caracteres" required placeholder="Ingrese su DNI"></td>
            </tr>

            <td class="display-6 text-muted">Seleccione fecha de nacimiento:</td>
            <tr>
            <?php 
            //Determinando la fecha max para asegurar que se registren mayores de edad
            $mes=date('m');
            $dia=date('d');
            $fechamax=date('Y')-18 ."-"."$mes"."-"."$dia";
            ?>
                <td><input class="form-control col-lg-8" type="date" name="date" id="date" min="1940-01-01" max="<?php echo $fechamax;?>" placeholder="Seleccione una fecha" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Su domicilio actual" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Su telefono en 10 digitos" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Su correo electronico" required></td>
            </tr>

            <tr>
                <td>
                    <select name="area" id="area" class="form-control col-lg-8" title="Seleccione el área a la cual pertenecerá el usuario a registrar">
                        <option name="area=<?php echo $_SESSION["area"];?>"><?php echo $_SESSION["area"];?></option>
                    </select required>
                </td>
            </tr>

        

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="charge" id="charge" maxlength="50" placeholder="Ingrese su cargo" required></td>
            </tr>
            
            <tr>
                <td>
                    <select name="rol" id="rol" class="form-control col-lg-8" title="Elegir rol de usuario a registrar">
                        <option name="rol" title="Usuario sin provilegios de administracíon y control" value="2">OPERADOR DE ÁREA</option>
                    </select required>
                </td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password" id="password" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Contraseña en 10 caracteres" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password_verify" id="password_verify" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Repita la contraseña" required></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4 text-danger"><label for="">*Una vez completados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="submit" value="Registrarse"></td>
            </tr>

        </table>



    </form>

    </div>
</body>

</html>
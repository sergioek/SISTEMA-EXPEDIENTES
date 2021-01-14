<!--login_start sera incorporado en el index si no existe una sesion iniciada----->
<?php
//El usuario al pulsar iniciar sesion en el formulario login, se llamara al archivo search login para hacer la consulta en la base de datos para encontrar usuario
if(isset($_POST["enter"])){
    require_once($_SERVER['DOCUMENT_ROOT'])."/SISTEMA EXPEDIENTES/Model/login/search_login.php";
//Sii se encontro un usuario la variable contrador sera mayor a cero.. 
    if($CONTADOR>0){
    //Al saber que se encontro un usuario y saber que la sesion es exitosa se comienza a ver si el usuairo quiere recordar el inicio de sesion
        if(isset($_POST["remember"])){
            //se crean cookies y el inicio de sesion con session start
            setcookie("SGE-DNI",$dni,time()+14400,"/SISTEMA%20EXPEDIENTES");
            setcookie("SGE-PAS",$password,time()+14400,"/SISTEMA%20EXPEDIENTES");
            session_start();
            $_SESSION["user"]=$user;
            $_SESSION["dni"]=$dni;
            $_SESSION["area"]=$area;   
            $_SESSION["rol"]=$rol;      
   
        }else{   
            //Sino desea recordar la cuenta se crean el inicio normal de sesion almacenando el usuario y el dni en $user y $dni y $area y $rol
            session_start();
            $_SESSION["user"]=$user;
            $_SESSION["dni"]=$dni;
            $_SESSION["area"]=$area; 
            $_SESSION["rol"]=$rol;
        }
//mensaje si da error la consulta o no se encuentra un usuario
    }else{
        echo "<script>alert('Usuario no encontrado')</script>";
    }
}

error_reporting(E_ALL ^ E_NOTICE); //matando el warning que aparecer por nuevamente aplicar un session start
session_start();
if(isset($_SESSION["user"])){
    //Guardar en una variable la sesion
    $usuario=$_SESSION["user"];
    //Incluir reloj y calendario.. lo hara si existe conexion en internet (ver archico include_calendar_clock)
    include($_SERVER['DOCUMENT_ROOT'].'/SISTEMA EXPEDIENTES/View/calendar_clock/include_calendar_clock.php');
    //Mostar usuario y debajo boton cerrar sesion
    echo"<div class='container-fluid col-lg-3 offset-lg-9'><nav>
    <ul class='container row mt-lg-0 display-6'>
    <li class='offset-1' style='list-style: none;'><label class='text-warning font-weight-bolder'>Usuario:</label><br><label class='text-white font-weight-bold'>$usuario</label></li>
    </ul>
    <ul class='container row mt-lg-0'>
        <li class='offset-1' style='list-style: none;'><a href='/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php'><input type='button' value='Cerrar sesíon' class='btn btn-danger'></a></li>
    </ul>
    </nav></div>";
//Mostrar las opciones de tramite header2 (buscar exp, etc)
require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/header2_proceedings.php");
//Mostrar las opciones de tramite header1 (nuevo expte, gestionar)
require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/header1_proceedings.php");
//mOSTRAR LAS OPCIONES CREAR USUARIOS(SOLO PARA ADMINIST.) Y CONTROL EXPEDIENTES
require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/header3_proceedings.php");
    
}else{
    //Sino existe una sesion iniciada incorpora el login s, que trae la parte grafica del login... y el archov header2_proceedings que contiene la parte visual de buscar expedientes...
    require_once($_SERVER['DOCUMENT_ROOT'])."/SISTEMA EXPEDIENTES/View/login/login.php";
    require($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/header2_proceedings.php");
    
}

?>

<!--login_start sera incorporado en el index si no existe una sesion iniciada----->
<?php
if(!isset($_SESSION["registrer"])){
//Incorpora el login  si no se inicio sesion. 
require_once($_SERVER['DOCUMENT_ROOT'])."/SISTEMA EXPEDIENTES/View/admin/access.php";
}else{
    header("Location:/SISTEMA EXPEDIENTES/View/user/new_user.php");
}

//El usuario al pulsar iniciar sesion en el formulario login, se llamara al archivo search login para hacer la consulta en la base de datos para encontrar usuario
if(isset($_POST["access"])){
    require_once($_SERVER['DOCUMENT_ROOT'])."/SISTEMA EXPEDIENTES/Model/admin/user_access.php";
//Si se encontro un usuario la variable contrador sera mayor a cero.. 

    if($CONTADOR>0){
        session_start();
        $_SESSION["registrer"]=$_POST["user"];
        header("Location:/SISTEMA EXPEDIENTES/View/admin/menu.php");
}else{
    echo"<script>alert('El usuario y la contraseña son incorrectos');</script>";
}

}


?>
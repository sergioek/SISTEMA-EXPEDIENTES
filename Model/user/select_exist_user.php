<?php
try{
require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

//Tomar el valor de usuario (DNI) por la sesion
$dni=$_SESSION["dni"];
    
$consulta="SELECT *FROM OPERADORES WHERE DNI=?";


$resultado=$conexion->prepare($consulta);
//$resultado->bindParam(1,$dni,PDO::PARAM_INT);
$resultado->execute(array($dni));

while($usuario=$resultado->fetch(PDO::FETCH_ASSOC)){
    $name=$usuario["NOMBRES"];
    $date=$usuario["FECHANACIMIENTO"];
    $home=$usuario["DOMICILIO"];
    $password_actual=$usuario["CONTRASEÑA"];
    $area=$usuario["AREA"];
    $charge=$usuario["CARGO"];
    $telephone=$usuario["TELEFONO"];
    $email=$usuario["CORREO"];


}

$resultado->closeCursor();


}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}


?>
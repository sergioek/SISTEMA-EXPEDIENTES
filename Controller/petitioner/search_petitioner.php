<?php
//Conectar con la base de datos para pasar las areas de la base de datos al archivo new user 

try{
    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
    $conexion=Conexion::Conect();

    $dni=$_POST["dni"];
    $sql="SELECT *FROM SOLICITANTE WHERE DNI=?";
   $resultado=$conexion->prepare($sql);
//$resultado->bindParam(1,$dni,PDO::PARAM_INT);
   $resultado->execute(array($dni));
   while($solicitante=$resultado->fetch(PDO::FETCH_ASSOC)){
    $dni=$solicitante["DNI"];
    $name_petitioner=$solicitante["SOLICITANTE"];
    $date=$solicitante["NACIMIENTO"];
    $home=$solicitante["DOMICILIO"];
    $telephone=$solicitante["TELEFONO"];
    $email=$solicitante["CORREO"];

}



}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>


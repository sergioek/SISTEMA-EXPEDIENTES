<?php
//Conectar con la base de datos para pasar las areas de la base de datos al archivo new user 

try{
    require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
    $conexion=Conexion::Conect();
    $sql="SELECT *FROM AREA";
   $resultado=$conexion->prepare($sql);
   $resultado->execute();
   $registro=$resultado->fetchAll(PDO::FETCH_OBJ);
    //echo"Conexion realizada con exito";
}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>


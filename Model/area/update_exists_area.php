<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="UPDATE AREA SET DESCRIPCION=?,JEFE=?,TELEFONO=?,CORREO=? WHERE NOMBRE=?";
//Realizando la ACTUALIZACION de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$description_area,PDO::PARAM_STR);
$resultado->bindParam(2,$chief_area,PDO::PARAM_STR);
$resultado->bindParam(3,$telephone_area,PDO::PARAM_INT);
$resultado->bindParam(4,$email_area,PDO::PARAM_STR);
$resultado->bindParam(5,$name_area,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();
?>
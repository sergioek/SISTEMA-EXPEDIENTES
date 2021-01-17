<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="UPDATE TRAMITES SET NOMBRE=?,FECHA=?,REQUISITOS=? WHERE ID=?";
//Realizando la ACTUALIZACION de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$date,PDO::PARAM_STR);
$resultado->bindParam(3,$requeriments,PDO::PARAM_STR);
$resultado->bindParam(4,$id,PDO::PARAM_INT);
$resultado->execute();
$resultado->closeCursor();
?>
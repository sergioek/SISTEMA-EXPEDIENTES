<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="INSERT INTO AREA (CODIGO,NOMBRE,DESCRIPCION,JEFE,TELEFONO,CORREO) VALUES (NULL,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name_area,PDO::PARAM_STR);
$resultado->bindParam(2,$description_area,PDO::PARAM_STR);
$resultado->bindParam(3,$chief_area,PDO::PARAM_STR);
$resultado->bindParam(4,$telephone_area,PDO::PARAM_INT);
$resultado->bindParam(5,$email_area,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();
?>
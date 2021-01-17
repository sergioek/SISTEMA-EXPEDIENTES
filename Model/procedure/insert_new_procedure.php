<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
$consulta="INSERT INTO TRAMITES (ID,NOMBRE,FECHA,AREA_TRAMITE,REQUISITOS) VALUES (NULL,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$date,PDO::PARAM_STR);
$resultado->bindParam(3,$area_procedure,PDO::PARAM_STR);
$resultado->bindParam(4,$requeriments,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();
?>
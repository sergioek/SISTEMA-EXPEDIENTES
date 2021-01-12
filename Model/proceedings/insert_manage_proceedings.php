<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="INSERT INTO ESTADO_EXPEDIENTES (FECHA,FECHA_HORA,NUMERO_ID,AREA,OPERADOR,MOTIVO,FOLIOS,ESTADO,CON_PASE_A,MOTIVO_PASE) VALUES (?,?,?,?,?,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$date,PDO::PARAM_STR);
$resultado->bindParam(2,$dateandtime,PDO::PARAM_STR);
$resultado->bindParam(3,$number_id,PDO::PARAM_INT);
$resultado->bindParam(4,$area,PDO::PARAM_STR);
$resultado->bindParam(5,$dni_user,PDO::PARAM_INT);
$resultado->bindParam(6,$procedure,PDO::PARAM_STR);
$resultado->bindParam(7,$folios,PDO::PARAM_INT);
$resultado->bindParam(8,$state,PDO::PARAM_STR);
$resultado->bindParam(9,$go_to_area,PDO::PARAM_STR);
$resultado->bindParam(10,$reason_pass,PDO::PARAM_STR);
$resultado->execute();
?>
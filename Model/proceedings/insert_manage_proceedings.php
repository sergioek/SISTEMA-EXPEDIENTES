<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="INSERT INTO ESTADO_EXPEDIENTES (FECHA_HORA,NUMERO_ID,AREA,OPERADOR,MOTIVO,FOLIOS,ESTADO,CON_PASE_A,MOTIVO_PASE) VALUES (?,?,?,?,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$dateandtime,PDO::PARAM_STR);
$resultado->bindParam(2,$number_id,PDO::PARAM_INT);
$resultado->bindParam(3,$area,PDO::PARAM_STR);
$resultado->bindParam(4,$dni_user,PDO::PARAM_INT);
$resultado->bindParam(5,$procedure,PDO::PARAM_STR);
$resultado->bindParam(6,$folios,PDO::PARAM_INT);
$resultado->bindParam(7,$state,PDO::PARAM_STR);
$resultado->bindParam(8,$go_to_area,PDO::PARAM_STR);
$resultado->bindParam(9,$reason_pass,PDO::PARAM_STR);
$resultado->execute();
?>
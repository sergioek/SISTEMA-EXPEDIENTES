<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="INSERT INTO SOLICITANTE (SOLICITANTE,DNI,NACIMIENTO,DOMICILIO,TELEFONO,CORREO) VALUES (?,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$dni,PDO::PARAM_INT);
$resultado->bindParam(3,$date,PDO::PARAM_STR);
$resultado->bindParam(4,$home,PDO::PARAM_STR);
$resultado->bindParam(5,$telephone,PDO::PARAM_INT);
$resultado->bindParam(6,$email,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();

echo'<script language="javascript">alert("Se registro un nuevo solicitante");</script>';
?>
<?php
//Realizar la actualizacion de los datos

require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

$consulta="UPDATE OPERADORES SET AREA=?,CARGO=?,ROL=? WHERE DNI=?";
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$area,PDO::PARAM_STR);
$resultado->bindParam(2,$charge,PDO::PARAM_STR);
$resultado->bindParam(3,$rol,PDO::PARAM_INT);
$resultado->bindParam(4,$dni,PDO::PARAM_INT);
$resultado->execute();
$resultado->closeCursor();
echo'<script language="javascript">alert("Se actualizaron los datos del usuario");</script>';
?>
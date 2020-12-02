<?php

require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

$USER=37313478;
$password="himsvk2020";
$password=htmlentities(addslashes($password));
$password_encrypt=password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
    
$consulta="INSERT INTO ADMINISTRADOR (USUARIO,CONTRASEÑA) VALUES (?,?)";


$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$USER,PDO::PARAM_INT);
$resultado->bindParam(2,$password_encrypt,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();

echo'<script language="javascript">alert("Se registro un nuevo usuario");</script>';


?>
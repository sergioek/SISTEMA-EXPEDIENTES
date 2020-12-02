<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
        

    
$consulta="UPDATE SOLICITANTE SET SOLICITANTE=?,NACIMIENTO=?,DOMICILIO=?,TELEFONO=?,CORREO=? WHERE DNI=?";


$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$date,PDO::PARAM_STR);
$resultado->bindParam(3,$home,PDO::PARAM_STR);
$resultado->bindParam(4,$telephone,PDO::PARAM_INT);
$resultado->bindParam(5,$email,PDO::PARAM_STR);
$resultado->bindParam(6,$dni,PDO::PARAM_INT);
$resultado->execute();
//Cerrando conexion
$resultado->closeCursor();

echo'<script language="javascript">alert("Se actulizo los datos de un solicitante");</script>';






?>
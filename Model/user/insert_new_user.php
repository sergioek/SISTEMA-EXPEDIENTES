<?php

require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
        
$password=htmlentities(addslashes ($_POST["password"]));
$password_encrypt=password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
    
$consulta="INSERT INTO OPERADORES (NOMBRES,DNI,FECHANACIMIENTO,DOMICILIO,CONTRASEÑA,AREA,CARGO,ROL,TELEFONO,CORREO) VALUES (?,?,?,?,?,?,?,?,?,?)";


$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$dni,PDO::PARAM_INT);
$resultado->bindParam(3,$date,PDO::PARAM_STR);
$resultado->bindParam(4,$home,PDO::PARAM_STR);
$resultado->bindParam(5,$password_encrypt,PDO::PARAM_STR);
$resultado->bindParam(6,$area,PDO::PARAM_STR);
$resultado->bindParam(7,$charge,PDO::PARAM_STR);
$resultado->bindParam(8,$rol,PDO::PARAM_INT);
$resultado->bindParam(9,$telephone,PDO::PARAM_INT);
$resultado->bindParam(10,$email,PDO::PARAM_STR);
$resultado->execute();
$resultado->closeCursor();

echo'<script language="javascript">alert("Se registro un nuevo usuario");</script>';


?>
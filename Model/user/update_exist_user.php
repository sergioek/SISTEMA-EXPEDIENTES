<?php
//Realizar la actualizacion de los datos

require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

$password_nuevo=htmlentities(addslashes ($_POST["password_nuevo"]));
$password_encrypt=password_hash($password_nuevo,PASSWORD_DEFAULT,array("cost"=>12));
    
$consulta="UPDATE OPERADORES SET NOMBRES=?,FECHANACIMIENTO=?,DOMICILIO=?,CONTRASEÑA=?,AREA=?,CARGO=?,ROL=?,TELEFONO=?,CORREO=? WHERE DNI=?";
//

$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$name,PDO::PARAM_STR);
$resultado->bindParam(2,$date,PDO::PARAM_STR);
$resultado->bindParam(3,$home,PDO::PARAM_STR);
$resultado->bindParam(4,$password_encrypt,PDO::PARAM_STR);
$resultado->bindParam(5,$area,PDO::PARAM_STR);
$resultado->bindParam(6,$charge,PDO::PARAM_STR);
$resultado->bindParam(7,$rol,PDO::PARAM_STR);
$resultado->bindParam(8,$telephone,PDO::PARAM_INT);
$resultado->bindParam(9,$email,PDO::PARAM_STR);
$resultado->bindParam(10,$dni,PDO::PARAM_INT);

$resultado->execute();
$resultado->closeCursor();

echo'<script language="javascript">alert("Se actualizaron los datos del usuario. Vuela a iniciar sesion.");</script>';


?>
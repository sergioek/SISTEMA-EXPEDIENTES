<?php
//Realizar la actualizacion de los datos

require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

$consulta="DELETE FROM OPERADORES WHERE DNI=?";

$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$dni,PDO::PARAM_INT);

$resultado->execute();
$resultado->closeCursor();

//Contando la cant de registros afectados por la consulta 
$registro=$resultado->rowCount();

if($registro==1){
    echo'<script language="javascript">alert("Se elimino un usuario");</script>';
}else{
    echo'<script language="javascript">alert("No se pudo eliminar un usuario. Verifique DNI");</script>';
}
//Cerrando la conexion
$resultado->closeCursor();

?>
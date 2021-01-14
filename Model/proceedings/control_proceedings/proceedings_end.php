<?php
try{
require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
$consulta="SELECT *FROM ESTADO_EXPEDIENTES WHERE FECHA BETWEEN '$date_initial' AND '$date_end' AND ESTADO='FINALIZADO-PARA ARCHIVAR'";
$resultado=$conexion->prepare($consulta);
$resultado->execute(array());
$expedientes=$resultado->fetchAll(PDO::FETCH_OBJ);
return $expedientes;

//cERRANDO LA CONEXION
$resultado->closeCursor();

}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>
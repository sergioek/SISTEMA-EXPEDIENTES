<?php
try{
require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

//Consultando los datos iniciales del expediente
$consulta_expediente="SELECT AÑO,FECHA,DNI_SOLICITANTE,TRAMITE,FOLIOS,AREA,DOCUMENTACION,ARCHIVO FROM EXPEDIENTES WHERE NUMERO=? AND AÑO=?";

$resultado=$conexion->prepare($consulta_expediente);
$resultado->execute(array($number,$year));
while($expediente=$resultado->fetch(PDO::FETCH_ASSOC)){
    $YEAR=$expediente["AÑO"];
    $DATE=$expediente["FECHA"];
    $PETITIONER=$expediente["DNI_SOLICITANTE"];
    $PROCEDURE_ID=$expediente["TRAMITE"];
    $FOLIOS=$expediente["FOLIOS"];
    $AREA=$expediente["AREA"];
    $DOCUMENTATION=$expediente["DOCUMENTACION"];
    $FILE=$expediente["ARCHIVO"];

    //Busca el nombre del tramite, ya que solo se obtiene el id 
    $sql="SELECT NOMBRE FROM TRAMITES WHERE ID=?";
    $resultado=$conexion->prepare($sql);
    $resultado->execute(array($PROCEDURE_ID));
    $busqueda=$resultado->fetch(PDO::FETCH_OBJ);
    $PROCEDURE=$busqueda->NOMBRE;
}
//Contando el numero de registros afectados por la consulta, lo cual significa que el expediente existe
$numeros_expediente=$resultado->rowCount();
if($numeros_expediente==1){
    $consulta_gestion_expediente="SELECT FECHA_HORA,AREA,MOTIVO,FOLIOS,ESTADO,CON_PASE_A,MOTIVO_PASE,ARCHIVO FROM ESTADO_EXPEDIENTES WHERE NUMERO_ID=?";
    
    $resultado_gestion=$conexion->prepare($consulta_gestion_expediente);
    $resultado_gestion->execute(array($number));
    $registro=$resultado_gestion->fetchAll(PDO::FETCH_OBJ);
    //Retorna el registro para el controller
    return $registro;
}
    
$resultado->closeCursor();

}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}


?>
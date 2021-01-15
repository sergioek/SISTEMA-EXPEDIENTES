<?php
try{
require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

//Tomar el valor de expediente en el archivo de origen search proceedings del controller (number y year)
    
$consulta="SELECT NUMERO,FECHA,DNI_SOLICITANTE,TRAMITE,FOLIOS,DOCUMENTACION,AREA FROM EXPEDIENTES WHERE NUMERO=? AND AÑO=?";

$resultado=$conexion->prepare($consulta);
$resultado->execute(array($number_proceedings,$year));
while($expedientes=$resultado->fetch(PDO::FETCH_ASSOC)){
    $number=$expedientes["NUMERO"];
    $date=$expedientes["FECHA"];
    $dni_petitioner=$expedientes["DNI_SOLICITANTE"];
    $procedure=$expedientes["TRAMITE"];
    $folios_iniciales=$expedientes["FOLIOS"];
    $documentation=$expedientes["DOCUMENTACION"];
    $area_inicio=$expedientes["AREA"];
}

//pARA BUSCAR EL NOMBRE DEL SOLICITANTE SE HACE OTRA CONSULTA
if(!empty($dni_petitioner)){
$consulta_NOMBRE="SELECT SOLICITANTE FROM SOLICITANTE WHERE DNI=?";

$resultado=$conexion->prepare($consulta_NOMBRE);
$resultado->execute(array($dni_petitioner));
while($solicitante=$resultado->fetch(PDO::FETCH_ASSOC)){
    $name_petitioner=$solicitante["SOLICITANTE"];
}
}

//Consulta del seguimiento del expediente para llenar el cuadro de texto
//Variables que pueden estar o no vacias si no se encuentra una consulta
$state="TRÁMITE INICIADO";
$transfer="AUN NO EXISTEN GESTIONES EN ESTE EXPEDIENTE";
$reason="AUN NO EXISTEN GESTIONES EN ESTE EXPEDIENTE";
$reason_transfer="AUN NO EXISTEN GESTIONES EN ESTE EXPEDIENTE";
$datetime_transfer="";
$consulta_FECHA_EXPEDIENTE="SELECT MAX(FECHA_HORA) FROM ESTADO_EXPEDIENTES WHERE NUMERO_ID=?";
$resultado=$conexion->prepare($consulta_FECHA_EXPEDIENTE);
$resultado->execute(array($number_proceedings));
while($fecha_expediente=$resultado->fetch(PDO::FETCH_ASSOC)){
    $datetime_transfer=$fecha_expediente["MAX(FECHA_HORA)"];
}

//Luego de determinar la fecha maxima del registro, se buscara en el mismo los valores

if(!empty($datetime_transfer)){
$consulta_ESTADO_EXPEDIENTE="SELECT ESTADO,MOTIVO,CON_PASE_A,MOTIVO_PASE,FOLIOS FROM ESTADO_EXPEDIENTES WHERE FECHA_HORA=? AND NUMERO_ID=?";
$resultado=$conexion->prepare($consulta_ESTADO_EXPEDIENTE);
$resultado->execute(array($datetime_transfer,$number_proceedings));
while($estado_expediente=$resultado->fetch(PDO::FETCH_ASSOC)){
    $state=$estado_expediente["ESTADO"];
    $transfer=$estado_expediente["CON_PASE_A"];
    $reason=$estado_expediente["MOTIVO"];
    $reason_transfer=$estado_expediente["MOTIVO_PASE"];
    $folios_current=$estado_expediente["FOLIOS"];
    //COMO STATE ES NUM SE LE ASIGNA VALORES SEGUN TABLA DE BASE DE DATOS ESTADOS_GESTIONES
    if($state==1){
        $state="INICIO DE TRÁMITE";
    }
    if($state==2){
        $state="EN TRÁMITE";
    }
    if($state==3){
        $state="FINALIZADO-PARA ARCHIVAR";
    }

}
}
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
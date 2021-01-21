<?php
///MOviendo el archivo argado a la carpeta correspondiente al expediente
$path = $_SERVER["DOCUMENT_ROOT"] . "/SISTEMA EXPEDIENTES/FILES_UPLOADS/$number_id-$year/";
//Comprobando si la carpeta no existe
if (!is_dir($path)) {
    //Creando la carpeta si no existe
    mkdir($path, 0777, true);
    //si file_name no esta vacio porque el usuario cargo un archivo, se le asignara un nuevo nombre a ese archivo y se movera dicho archivo a la carp del exp
    if(!empty($file_name)){
        $file_name=substr(str_shuffle($file_name),0,5).".pdf";
        move_uploaded_file($_FILES["file"]['tmp_name'],$path.$file_name);
    }

}else{
      //mOVER del directorio temporal a la carpeta de destino
      if(!empty($file_name)){
        $file_name=substr(str_shuffle($file_name),0,5).".pdf";
        move_uploaded_file($_FILES["file"]['tmp_name'],$path.$file_name);
    }
}

//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
    
$consulta="INSERT INTO ESTADO_EXPEDIENTES (FECHA,FECHA_HORA,NUMERO_ID,AREA,OPERADOR,MOTIVO,FOLIOS,ESTADO,CON_PASE_A,MOTIVO_PASE,ARCHIVO) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$date,PDO::PARAM_STR);
$resultado->bindParam(2,$dateandtime,PDO::PARAM_STR);
$resultado->bindParam(3,$number_id,PDO::PARAM_INT);
$resultado->bindParam(4,$area,PDO::PARAM_STR);
$resultado->bindParam(5,$dni_user,PDO::PARAM_INT);
$resultado->bindParam(6,$procedure,PDO::PARAM_STR);
$resultado->bindParam(7,$folios,PDO::PARAM_INT);
$resultado->bindParam(8,$state,PDO::PARAM_INT);
$resultado->bindParam(9,$go_to_area,PDO::PARAM_STR);
$resultado->bindParam(10,$reason_pass,PDO::PARAM_STR);
$resultado->bindParam(11,$file_name,PDO::PARAM_STR);
$resultado->execute();
?>
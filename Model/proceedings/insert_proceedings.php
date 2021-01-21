<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();
$consulta="INSERT INTO EXPEDIENTES (NUMERO,AÑO,FECHA,DNI_SOLICITANTE,TRAMITE,ESTADO,FOLIOS,DOCUMENTACION,ARCHIVO,AREA,DNI_OPERADOR) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
//Nombre para el archivo que se almacenara
$file="$number_id"."-"."$year".".pdf";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$number_id,PDO::PARAM_INT);
$resultado->bindParam(2,$year,PDO::PARAM_INT);
$resultado->bindParam(3,$date,PDO::PARAM_STR);
$resultado->bindParam(4,$dni_petitioner,PDO::PARAM_INT);
$resultado->bindParam(5,$procedure,PDO::PARAM_INT);
$resultado->bindParam(6,$state,PDO::PARAM_INT);
$resultado->bindParam(7,$folios,PDO::PARAM_INT);
$resultado->bindParam(8,$documentation,PDO::PARAM_STR);
$resultado->bindParam(9,$file,PDO::PARAM_STR);
$resultado->bindParam(10,$area,PDO::PARAM_STR);
$resultado->bindParam(11,$dni_user,PDO::PARAM_INT);
$resultado->execute();
//Retorna el numero de expediente ingresado, y se usara para generar el pdf caratula....
//$number_id= $conexion->lastInsertId();

//Busca el nombre del tramite, ya que solo el id se inserto en la BD. obtener el nombre permitira crear el pdf de mejor manera 
$sql="SELECT NOMBRE FROM TRAMITES WHERE ID=?";
$resultado=$conexion->prepare($sql);
$resultado->execute(array($procedure));
$busqueda=$resultado->fetch(PDO::FETCH_OBJ);
$procedure=$busqueda->NOMBRE;
$resultado->closeCursor();

$path = $_SERVER["DOCUMENT_ROOT"] . "/SISTEMA EXPEDIENTES/FILES_UPLOADS/$number_id-$year/";
//Comprobando que la carpeta no existe
if (!is_dir($path)) {
    //Creando la carpeta
    mkdir($path, 0777, true);
    //mOVER del directorio temporal a la carpeta de destino
    move_uploaded_file($_FILES["file"]['tmp_name'],$path.$file_name);
    //Renombrando el archivo cargado, para que coincida con el del numero del expediente
    rename("$path/$file_name","$path/$number_id-$year.pdf");

}else{
      //mOVER del directorio temporal a la carpeta de destino
      move_uploaded_file($_FILES["file"]['tmp_name'],$path.$file_name);
      //Renombrando el archivo cargado, para que coincida con el del numero del expediente
      rename("$path/$file_name","$path/$number_id-$year.pdf");
}

?>
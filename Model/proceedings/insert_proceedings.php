<?php
//Incorporando el archivo conect para conectar la base de datos
require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
$conexion=Conexion::Conect();

    
$consulta="INSERT INTO EXPEDIENTES (NUMERO,AÑO,FECHA,DNI_SOLICITANTE,TRAMITE,ESTADO,FOLIOS,DOCUMENTACION,AREA,DNI_OPERADOR) VALUES (NULL,?,?,?,?,?,?,?,?,?)";
//Realizando la insercion de datos
$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$year,PDO::PARAM_INT);
$resultado->bindParam(2,$date,PDO::PARAM_STR);
$resultado->bindParam(3,$dni_petitioner,PDO::PARAM_INT);
$resultado->bindParam(4,$procedure,PDO::PARAM_INT);
$resultado->bindParam(5,$state,PDO::PARAM_INT);
$resultado->bindParam(6,$folios,PDO::PARAM_INT);
$resultado->bindParam(7,$documentation,PDO::PARAM_STR);
$resultado->bindParam(8,$area,PDO::PARAM_STR);
$resultado->bindParam(9,$dni_user,PDO::PARAM_INT);
$resultado->execute();
//Busca el nombre del tramite, ya que solo el id se inserto en la BD. obtener el nombre permitira crear el pdf de mejor manera 
$sql="SELECT NOMBRE FROM TRAMITES WHERE ID=?";
$resultado=$conexion->prepare($sql);
$resultado->execute(array($procedure));
$busqueda=$resultado->fetch(PDO::FETCH_OBJ);
$procedure=$busqueda->NOMBRE;
//Retorna el numero de expediente ingresado, el cual es autoincrement y se usara para generar el pdf caratula. 
$number_id= $conexion->lastInsertId();
$resultado->closeCursor();
?>
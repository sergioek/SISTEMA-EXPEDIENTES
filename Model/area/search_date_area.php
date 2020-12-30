<?php
//Conectar con la base de datos para buscar los datos para editar un area

try{
    require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
    $conexion=Conexion::Conect();

    $sql="SELECT *FROM AREA WHERE NOMBRE=?";
   $resultado=$conexion->prepare($sql);
   $resultado->execute(array($_POST["search_name"]));
   while($area=$resultado->fetch(PDO::FETCH_ASSOC)){
    $name_area=$area["NOMBRE"];
    $description_area=$area["DESCRIPCION"];
    $chief_area=$area["JEFE"];
    $telephone_area=$area["TELEFONO"];
    $email_area=$area["CORREO"];
   }
}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>


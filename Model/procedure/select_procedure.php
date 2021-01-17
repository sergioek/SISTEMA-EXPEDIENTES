<?php
//Conectar con la base de datos para buscar los datos para editar un area

try{
    require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
    $conexion=Conexion::Conect();
    $ID=$_POST["id"];
    $sql="SELECT *FROM TRAMITES WHERE ID=?";
   $resultado=$conexion->prepare($sql);
   $resultado->execute(array($ID));
   while($procedure=$resultado->fetch(PDO::FETCH_ASSOC)){
    $id=$procedure["ID"];
    $name=$procedure["NOMBRE"];
    $date=$procedure["FECHA"];
    $area_procedure=$procedure["AREA_TRAMITE"];
    $requeriments=$procedure["REQUISITOS"];
   }
}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>


<?php

require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/conect.php");
//Llamando a la funcion conect de la clase conexion 
$conexion=Conexion::Conect();
        

    
$consulta="DELETE FROM SOLICITANTE WHERE DNI=?";


$resultado=$conexion->prepare($consulta);
$resultado->bindParam(1,$dni,PDO::PARAM_INT);
$resultado->execute();
//Contando la cant de registros afectados por la consulta 
$registro=$resultado->rowCount();

if($registro==1){
    echo'<script language="javascript">alert("Se elimino un solicitante");</script>';
}else{
    echo'<script language="javascript">alert("No se pudo eliminar un solicitante. Verifique DNI");</script>';
}
//Cerrando la conexion
$resultado->closeCursor();



?>
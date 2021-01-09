<?php
//Conectar con la base de datos para pasar las areas de la base de datos al archivo new user 

try{
    require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/conect.php");
    $conexion=Conexion::Conect();

	//Elimina los carcateres especiales para evitar inyeccion sql
    $dni=htmlentities(addslashes($_POST["dni"]));
    $password=htmlentities(addslashes($_POST["password"]));

 

    $sql="SELECT *FROM OPERADORES WHERE DNI=?";
   
    $resultado=$conexion->prepare($sql);
    $resultado->bindParam(1,$dni,PDO::PARAM_INT);

    $resultado->execute();

    //cRERAR LA VARIABLE CONTADOR PARA VERIFICAR SI LA CONSTRASEÑA INTRODUCIDA COINCIDE CON LA CONTRASEÑA ENCRIPTADA DE LA BD.
	$CONTADOR=0;
    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
        //cOMPROBAR SI LA CONSTRASEÑA COINICIDE CON LA CONTRASEÑA ENCRIPTADA
        $resultado->closeCursor();
        $registro["CONTRASEÑA"];
        //Si las contraseñas coinciden es decir el hash con la introducida por el usuario se incrementa la variable contrador y se almacenan los nombres y dni en dos variables (user,dni,AREA Y ROL)
        if(password_verify($password,$registro["CONTRASEÑA"])){
            $CONTADOR++;
            $user=$registro["NOMBRES"];
            $dni=$registro["DNI"];
            $area=$registro["AREA"];
            $rol=$registro["ROL"];
        }

    }
            
}catch(Exception $e){
    //Matando el error
    die('Error:' . $e->GetMessage());
}finally{
//Vaciando la memoria
    $base=null;
}

?>

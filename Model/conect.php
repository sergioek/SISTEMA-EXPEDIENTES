<?php

//Definiendo la clase conexion y la funcion conect
class Conexion{ 
    static function Conect(){
        try{
            $conexion= new PDO('mysql:host=localhost;dbname=expedientes','sergioek','kefotopc01');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

        }catch(Exception $e){
            //Matar error con die
        die('Error' . $e->getMessage());
        echo "El error es" . $e->getLine();
    }
    //Retorna la conexion para ser usada en las consultas a de bd
    return $conexion;
}

}
?>


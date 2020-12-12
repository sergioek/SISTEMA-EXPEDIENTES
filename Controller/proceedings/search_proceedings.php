<?php
//Conectar con la base de datos para pasar las areas de la base de datos al archivo manage proceedings

if(isset($_POST["search"])){
    try{
        $number_proceedings=$_POST["number"];
        $year=$_POST["year"];
        require_once($_SERVER['DOCUMENT_ROOT'] ."/SISTEMA EXPEDIENTES/Model/proceedings/search_proceedings.php");

    }catch(Exception $e){
        //Matando el error
        die('Error:' . $e->GetMessage());
    }finally{
        //Vaciando la memoria
        $base=null;
}

}
?>


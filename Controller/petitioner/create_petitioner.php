<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["save"])){
            //Obteniendo valores del formulario
            $name=$_POST["name"];
            $dni=$_POST["dni"];
            $date=$_POST["date"];
            $home=$_POST["home"];
            $telephone=$_POST["telephone"];
            $email=$_POST["email"];
           
            //Iniciando comprobaciones
            switch($name){

                case(empty($name)):
                   $v1=FALSE;
                break;
                case (strlen($name)>50):
                    $v1=FALSE;
                break;
             
                default:
                $v1=TRUE;}

            //Comprobando dni

            switch($dni){
                case(!filter_var($dni,FILTER_VALIDATE_INT)):
                   $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }

//Validacion de fecha.. equita / y luego se evalua si tiene mas de 3 elementos.. luego se comprueba si tiene formato de fecha
            $value_date=explode('/',$date);
            switch($value_date){
                case(count($value_date)>3 && !checkdate($value_date[0],$value_date[1],$value_date[2])):
                    $v3=FALSE;
                break;
                default:
                $v3=TRUE;
                }

            switch($home){

                case(empty($home)):
                    $v4=FALSE;
                break;
                case (strlen($home)>50):
                    $v4=FALSE;
                break;

                default:
                $v4=TRUE;
                }

            switch($telephone){
                case(!filter_var($telephone,FILTER_VALIDATE_INT)):
                        $v5=FALSE;
                break;
                default:
                $v5=TRUE;
                }

            switch($email){
                case(!filter_var($email,FILTER_VALIDATE_EMAIL)):
                    $v6=FALSE;
                break;
                default:
                $v6=TRUE;
                }

//Si todas las validaciones son verdaderas se incorpora el archivo para hacer la insercion            
            if($v1 && $v2 && $v3&& $v4 && $v5 && $v6==TRUE){

                try{
                
                include($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/petitioner/insert_new_petitioner.php");
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al registrar. El DNI ya existe en la base de datos");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }

}



$call=new Validation;

?>


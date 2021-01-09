<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["submit"])){
            //Obteniendo valores del formulario
            $name=$_POST["name"];
            $dni=$_POST["dni"];
            $date=$_POST["date"];
            $home=$_POST["home"];
            $telephone=$_POST["telephone"];
            $email=$_POST["email"];
            $area=$_POST["area"];
            $charge=$_POST["charge"];
            $rol=$_POST["rol"];
            $password=$_POST["password"];
            $password_verify=$_POST["password_verify"];
    
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

            switch($area){
                case(empty($area)):
                    $v7=FALSE;
                break;
                default:
                $v7=TRUE;
                }


            switch($charge){
                case(empty($charge)):
                    $v8=FALSE;
                break;
                case (strlen($charge)>50):
                    $v8=FALSE;
                break;
                default:
                $v8=TRUE;
               }

            switch($password){
                case(empty($password)):
                    $v9=FALSE;
                break;
                case(strlen($password)>10):
                    $v9=FALSE;
                break;
                case(strlen($password)<8):
                    $v9=FALSE;
                break;
                case(is_numeric($password)):
                    $v9=FALSE;
                break;
                case($password==$dni):
                    $v9=FALSE;
                break;
                default:
                $v9=TRUE;
               }

            switch($password_verify){
                case($password_verify!=$password):
                    $v10=FALSE;
                break;
                default:
                $v10=TRUE;
                }
            
            if($v1 && $v2 && $v3&& $v4 && $v5 && $v6 && $v7 && $v8 && $v9 && $v10==TRUE){

                try{
                
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/user/insert_new_user.php");
                }catch(Exception $e){
                    echo $e->getLine();
                    echo $e->getMessage();
                    echo'<script language="javascript">alert("Error al registrar usuario. El DNI ya existe en la base de datos");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }

}


//Instanciando la clase para ejecutar el constructor
$call=new Validation;

?>


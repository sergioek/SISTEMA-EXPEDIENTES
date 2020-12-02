<?php


//---------------------------------------------------------------------------/
//Si el usuario pulsa el boton actualizar se hara la comprobacion si la contraseña indicada como actual por el usuario coincide con la existente en la base de datos. en el imput siguiente el usuario podra repetir la contraseña o cambiar la existente

    if(isset($_POST["update"])){
        if(password_verify($_POST["password_actual"],$password_actual)){

            //Obteniendo valores del formulario
            $name=$_POST["name"];
            $dni=$_SESSION["dni"];
            $date=$_POST["date"];
            $home=$_POST["home"];
            $telephone=$_POST["telephone"];
            $email=$_POST["email"];
            $area=$_POST["area"];
            $charge=$_POST["charge"];
            $password_nuevo=$_POST["password_nuevo"];

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

            switch($password_nuevo){
                case(empty($password_nuevo)):
                    $v9=FALSE;
                break;
                case(strlen($password_nuevo)>10):
                    $v9=FALSE;
                break;
                case(strlen($password_nuevo)<8):
                    $v9=FALSE;
                break;
                case(is_numeric($password_nuevo)):
                    $v9=FALSE;
                break;
                case($password_nuevo==$dni):
                    $v9=FALSE;
                break;
                default:
                $v9=TRUE;
               }

            
                if($v1 && $v2 && $v3&& $v4 && $v5 && $v6 && $v7 && $v8 && $v9==TRUE){

                    try{
                //realizando el update
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/user/update_exist_user.php");
                //destruyendo la sesion para volver a inicar luego del update
                require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php");
                    }catch(Exception $e){
                        echo  $e->getLine();
                        echo $e->getMessage();
                    echo'<script language="javascript">alert("Error al realizar la actualizacion de datos");</script>';}

                }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }else{
                echo'<script language="javascript">alert("Su contraseña actual no coincide con la especificada en la base de datos");</script>';
            }

    }

?>
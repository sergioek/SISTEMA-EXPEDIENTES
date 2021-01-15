<?php


//---------------------------------------------------------------------------/
//Si el usuario pulsa el boton actualizar se hara la comprobacion si la contraseña indicada como actual por el usuario coincide con la existente en la base de datos. en el imput siguiente el usuario podra repetir la contraseña o cambiar la existente

        if(isset($_POST["update"])){
         
            //Obteniendo valores del formulario
         
            $dni=$_POST["dni"];
            $area=$_POST["area"];
            $charge=$_POST["charge"];
            $rol=$_POST["rol"];
           

            //Iniciando comprobaciones
            //Comprobando dni

            switch($dni){
                case(!filter_var($dni,FILTER_VALIDATE_INT)):
                   $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }


            switch($area){
                case(empty($area)):
                    $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }


            switch($charge){
                case(empty($charge)):
                    $v3=FALSE;
                break;
                case (strlen($charge)>50):
                    $v3=FALSE;
                break;
                default:
                $v3=TRUE;
               }

               
            switch($rol){
                case(!filter_var($rol,FILTER_VALIDATE_INT)):
                   $v4=FALSE;
                break;
                default:
                $v4=TRUE;
                }

        
                if($v1 && $v2 && $v3&& $v4==TRUE){

                    try{
                //realizando el update
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/user/update_exist_user(admin).php");
                //destruyendo la sesion para volver a inicar luego del update
                    }catch(Exception $e){
                        echo  $e->getLine();
                        echo $e->getMessage();
                    echo'<script language="javascript">alert("Error al realizar la actualizacion de datos");</script>';}

                }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';
                }
            
  
            }
?>

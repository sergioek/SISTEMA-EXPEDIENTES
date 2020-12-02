<?php


        if(isset($_POST["delete"])){
            if(password_verify($_POST["password_actual"],$password_actual)){

            //Obteniendo valores de la sesion
           
            $dni=$_SESSION["dni"];
            //Iniciando comprobaciones
         
            //Comprobando dni

            switch($dni){
                case(!filter_var($dni,FILTER_VALIDATE_INT)):
                   $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }

            if($v1==TRUE){

                try{
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/user/delete_exist_user.php");
                //destruyendo la sesion para volver a inicar luego del update
                require($_SERVER["DOCUMENT_ROOT"]."/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php");
                }catch(Exception $e){
                    echo $e->getLine();
                    echo $e->getMessage();
                    echo'<script language="javascript">alert("Error al eliminar cuenta de usuario");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos");</script>';}
            
            }else{
                echo'<script language="javascript">alert("Error en los datos. Las contraseña actual no es correcta");</script>';

            }

    }


?>


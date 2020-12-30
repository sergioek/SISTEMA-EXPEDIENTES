<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["update"])){
            //Obteniendo valores del formulario. el nombre en mayus
            //Variable vacia por si no se completa el campo
            $email_area="sinmail@gmail.com";
            //...................................
            $name_area=strtoupper($_POST["name"]);
            $description_area=$_POST["description"];
            $chief_area=$_POST["chief"];
            $email_area=$_POST["email"];
            $telephone_area=$_POST["telephone"];

            //Iniciando comprobaciones
           switch ($name_area) {
               case (strlen($name_area)>50):
                   $v1=FALSE;
                   break;
                case (empty($name_area)):
                    $v1=FALSE;
                    break;
                case (!is_string($name_area)):
                    $v1=FALSE;
                    
               default:
                   $v1=TRUE;
                   break;
           }

           switch ($description_area) {
            case (strlen($description_area)>200):
                $v2=FALSE;
                break;
             case (empty($description_area)):
                 $v2=FALSE;
                 break;
             case (!is_string($description_area)):
                 $v2=FALSE;
            default:
                $v2=TRUE;
                break;
        }

        switch ($chief_area) {
            case (strlen($chief_area)>50):
                $v3=FALSE;
                break;
             case (empty($chief_area)):
                 $v3=FALSE;
                 break;
             case (!is_string($chief_area)):
                 $v3=FALSE;
            default:
                $v3=TRUE;
                break;
        }

        switch ($email_area) {
            case (!filter_var($email_area,FILTER_VALIDATE_EMAIL)):
                $v4=FALSE;
                break;
            default:
                $v4=TRUE;
                break;
        }

        switch ($telephone_area) {
            case (!filter_var($telephone_area,FILTER_VALIDATE_INT)):
                $v5=FALSE;
                break;
            case (empty($telephone_area)):
                $v5=FALSE;
                break;
            default:
                $v5=TRUE;
                break;
        }




//Si todas las validaciones son verdaderas se incorpora el archivo para hacer la actualizacion            
            if($v1 && $v2 && $v3&& $v4 && $v5==TRUE){

                try{   
                //Llamando a los archivo para actualizar el area
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/area/update_exists_area.php");
                
                echo'<script language="javascript">alert("Área actualizada con éxito.");</script>';
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al actualizar un área.");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }
}
$call=new Validation;
?>


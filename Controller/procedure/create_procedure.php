<?php
class Validation{
    public function __construct(){
        
        if(isset($_POST["save"])){
            //Obteniendo valores del formulario. el nombre en mayus
            //Variable vacia por si no se completa el campo
            $name=strtoupper($_POST["name"]);
            $area_procedure=$_POST["area"];
            $requeriments=$_POST["requeriments"];
            //Obteniendo fecha
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
            $date = $Object->format("Y-m-d");  

            //Iniciando comprobaciones
           switch ($name){
               case (strlen($name)>50):
                   $v1=FALSE;
                   break;
                case (empty($name)):
                    $v1=FALSE;
                    break;
                case (!is_string($name)):
                    $v1=FALSE;
                    
               default:
                   $v1=TRUE;
                   break;
           }

           switch ($area_procedure) {
            case (strlen($area_procedure)>50):
                $v2=FALSE;
                break;
             case (empty($area_procedure)):
                 $v2=FALSE;
                 break;
             case (!is_string($area_procedure)):
                 $v2=FALSE;
            default:
                $v2=TRUE;
                break;
        }

        switch ($requeriments) {
            case (strlen($requeriments)>300):
                $v3=FALSE;
                break;
             case (empty($requeriments)):
                 $v3=FALSE;
                 break;
            default:
                $v3=TRUE;
                break;
             }

//Si todas las validaciones son verdaderas se incorpora el archivo para hacer la insercion      
            if($v1 && $v2 && $v3==TRUE){
                
                try{   
                //Llamando a los archivo para insertar el area
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/procedure/insert_new_procedure.php");
                
                echo'<script language="javascript">alert("Trámite creado con éxito.");</script>';
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al crear un trámite.");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }
}

$call=new Validation;
?>


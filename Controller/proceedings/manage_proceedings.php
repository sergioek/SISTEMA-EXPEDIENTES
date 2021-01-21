<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["gestionar"])){
            //Obteniendo fecha y hora - fecha
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
            $dateandtime = $Object->format("Y-m-d H:i:s");
            $date = $Object->format("Y-m-d");  
            $number_id=$_POST["number"];
            $dni_user=$_SESSION["dni"];
            $area=$_SESSION["area"];
            $state=$_POST["estado"];
            $procedure=$_POST["tramite"];
            $folios=$_POST["folios"];
            $go_to_area=$_POST["area"];
            $reason_pass=$_POST["motivo_pase"];
            $year=$_POST["year"];
            //Recibiendo archivo PDF y determinando sus atributos. en el caso de no cargarse archivo, se toman otros valores. pero en la bd no se introducira nada por lo cual el campo archivo quedara vacio
            if(!empty($_FILES["file"]['name'])){
                $file_name=$_FILES["file"]['name'];
                $file_type=$_FILES["file"]['type'];
                $file_size=$_FILES["file"]['size'];
            }else{
                $file_name="";
                $file_type="application/pdf";
                $file_size=2;
            }

            //Iniciando comprobaciones
            switch($number_id){
                case(!filter_var($number_id,FILTER_VALIDATE_INT)):
                   $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }

            switch($dni_user){
                case(!filter_var($dni_user,FILTER_VALIDATE_INT)):
                   $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }

            switch($area){
                case(empty($area)):
                    $v3=FALSE;
                break;
                default:
                $v3=TRUE;
                }
        

            switch($state){
                case(!filter_var($state,FILTER_VALIDATE_INT)):
                    $v4=FALSE;
                break;
                default:
                $v4=TRUE;
                }
            

            switch($procedure){
                case(empty($procedure)):
                    $v5=FALSE;
                break;
                case (strlen($procedure)>150):
                    $v5=FALSE;
                break;
                default:
                $v5=TRUE;
                }

            switch($folios){
                case(!filter_var($folios,FILTER_VALIDATE_INT)):
                    $v6=FALSE;
                break;
                case($folios<1):
                    $v6=FALSE;
                break;
                case($folios>999):
                    $v6=FALSE;
                default:
                $v6=TRUE;
                }
            
 
            switch($go_to_area){
                case(empty($go_to_area)):
                    $v7=FALSE;
                break;
                case (strlen($go_to_area)>50):
                    $v7=FALSE;
                break;
                default:
                $v7=TRUE;
                }

                switch($reason_pass){
                    case(empty($reason_pass)):
                        $v8=FALSE;
                    break;
                    case (strlen($reason_pass)>150):
                        $v8=FALSE;
                    break;
                    default:
                    $v8=TRUE;
                    }

            //Verificando el formato
                 switch($file_type){
                    case($file_type!=="application/pdf"):
                        $v9=FALSE;
                    break;
                    default:
                    $v9=TRUE;
                    }

            //Verificando el tamaño en bytes
                switch($file_size){
                    case($file_size>3000000):
                        $v10=FALSE;
                    break;
                    default:
                    $v10=TRUE;
                    }

            //Verificando el tamaño en bytes
                switch($file_name){
                    case(strlen($file_name>10)):
                        $v11=FALSE;
                    break;
                    default:
                    $v11=TRUE;
                    }

                switch($year){
                    case(!filter_var($year,FILTER_VALIDATE_INT)):
                        $v12=FALSE;
                    break;
                    default:
                    $v12=TRUE;
                    }
        

//Si todas las validaciones son verdaderas se incorpora el archivo para hacer la insercion            
            if($v1 && $v2 && $v3&& $v4 && $v5 && $v6  && $v7  && $v8 && $v9 && $v10 && $v11 && $v12==TRUE){

                try{
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/proceedings/insert_manage_proceedings.php");
                echo'<script language="javascript">alert("Se gestiono con exito el expediente N° '.$number_id.' ");</script>';
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al gestionar el expediente");</script>';}
            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato de los datos y el archivo");</script>';}
            
            }    
        }
}
$call=new Validation;
?>


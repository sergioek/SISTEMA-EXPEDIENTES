<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["registrar"])){
            //Obteniendo valores del formulario o creando variables
            $number_id=$_POST["number_proceedings"];
            $year=$_POST["year_proceedings"];
            $dni_user=$_SESSION["dni"];
            $area=$_SESSION["area"];
            //Obteniendo fecha
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
            $date = $Object->format("Y-m-d");  
            $name_petitioner=$_POST["name"];
            $dni_petitioner=$_POST["dni"];
            $procedure=$_POST["tramite"];
            $state=$_POST["estado"];
            $folios=$_POST["folios"];
            $documentation=$_POST["documentacion"];
            //Nombre del usuario servira luego para el pdf, no para la bd
            $name_user=$_SESSION["user"];
            //Recibiendo archivo PDF y determinando sus atributos
            $file_name=$_FILES["file"]['name'];
            $file_type=$_FILES["file"]['type'];
            $file_size=$_FILES["file"]['size'];
        
         

            //Iniciando comprobaciones

            
            switch($number_id){
                case(!filter_var($number_id,FILTER_VALIDATE_INT)):
                    $v0=FALSE;
                break;
                default:
                $v0=TRUE;
                }

            switch($dni_user){
                case(!filter_var($dni_user,FILTER_VALIDATE_INT)):
                   $v1=FALSE;
                break;
                case(empty($name_user)):
                    $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }

            switch($dni_petitioner){
                case(!filter_var($dni_petitioner,FILTER_VALIDATE_INT)):
                    $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }

            switch($year){
                case(!filter_var($year,FILTER_VALIDATE_INT)):
                    $v3=FALSE;
                break;
                default:
                $v3=TRUE;
                }
            
            switch($area){
                case(empty($area)):
                    $v4=FALSE;
                break;
                default:
                $v4=TRUE;
                }
        
            $value_date=explode('/',$date);
            switch($value_date){
                case(count($value_date)>3 && !checkdate($value_date[0],$value_date[1],$value_date[2])):
                    $v5=FALSE;
                break;
                default:
                $v5=TRUE;
                }
            
            switch($state){
                case(!filter_var($state,FILTER_VALIDATE_INT)):
                    $v6=FALSE;
                break;
                default:
                $v6=TRUE;
                }

            switch($procedure){
                case(!filter_var($procedure,FILTER_VALIDATE_INT)):
                    $v7=FALSE;
                break;
                default:
                $v7=TRUE;
                }
    
            switch($folios){
                case(!filter_var($folios,FILTER_VALIDATE_INT)):
                    $v8=FALSE;
                break;
                case($folios<1):
                    $v8=FALSE;
                break;
                case($folios>999):
                    $v8=FALSE;
                default:
                $v8=TRUE;
                }
            
            switch($documentation){
                case(empty($documentation)):
                    $v9=FALSE;
                break;
                case (strlen($documentation)>300):
                    $v9=FALSE;
                break;
                default:
                $v9=TRUE;
                }

            switch($name_petitioner){
                case(empty($name_petitioner)):
                    $v10=FALSE;
                break;
                case (strlen($name_petitioner)>50):
                    $v10=FALSE;
                break;
                default:
                $v10=TRUE;
                }
            //Verificando el formato
            switch($file_type){
                case($file_type!=="application/pdf"):
                    $v11=FALSE;
                break;
                default:
                $v11=TRUE;
                }

            //Verificando el tamaño en bytes
            switch($file_size){
                case($file_size>10485760):
                    $v12=FALSE;
                break;
                default:
                $v12=TRUE;
                }

            //Verificando el nombre
            switch($file_name){
                case(strlen($file_name>10)):
                    $v13=FALSE;
                break;
                default:
                $v13=TRUE;
                }

         
//Si todas las validaciones son verdaderas se incorpora el archivo para hacer la insercion            
    if($v0 && $v1 && $v2 && $v3&& $v4 && $v5 && $v6  && $v7  && $v8  && $v9 && $v10 && $v11 && $v12 && $v13==TRUE){
       

        try{
             require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/proceedings/insert_proceedings.php");
            //Llamando a los archivos para crear pdf.. el insert_proceedings retorna el number_id QUE PERMITE SABER QUE SE HA REALIZADO LA INSERCION DE UN NUEVO REGISTRO Y DETERMINAR SU ID
        
            if(isset($number_id)){
                //Buscando el Nombre del tramite por el id, para crear la caratula
                require_once($_SERVER["DOCUMENT_ROOT"] . "/SISTEMA EXPEDIENTES/Controller/reportPDF/create_caratula.php"); return'<script language="javascript">alert("Se registro un expediente");</script>';
                } 
               
        
         }catch(Exception $e){
             echo'<script language="javascript">alert("Error al registrar el expediente.Ya existe un expediente con ese número en la base de datos");</script>';
            }

    }else{
        echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato de los datos y el tamaño de los archivos cargados.");</script>';
    }
    
}

}
}

$call=new Validation;
?>

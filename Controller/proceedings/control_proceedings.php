<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["search"])){
            //Obteniendo valores del formulario 
            $area=$_POST["area"];
            $date_initial=$_POST["date_initial"];
            $date_end=$_POST["date_end"];
            $filter=$_POST["filter"];
            //Cambiando de formato la fecha, para adaptarla a la BD
            $date_1=date_create($date_initial);
            $date_initial=date_format($date_1,"Y-m-d");

            $date_2=date_create($date_end);
            $date_end=date_format($date_2,"Y-m-d");

            //Iniciando comprobaciones
            switch($area){
                case(empty($area)):
                    $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }
        
            $value_date=explode('/',$date_initial);
            switch($value_date){
                case(count($value_date)>3 && !checkdate($value_date[0],$value_date[1],$value_date[2])):
                    $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }

            $value_date=explode('/',$date_end);
            switch($value_date){
                case(count($value_date)>3 && !checkdate($value_date[0],$value_date[1],$value_date[2])):
                    $v3=FALSE;
                break;
                default:
                $v3=TRUE;
                }

            switch($filter){
                case(empty($filter)):
                    $v4=FALSE;
                break;
                default:
                $v4=TRUE;
                }
            
//Si todas las validaciones son verdaderas se incorpora el archivo
            if($v1 && $v2 && $v3 && $v4==TRUE){

                try{
                    if($filter=="EXPEDIENTES INICIADOS"){
                        require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/proceedings/control_proceedings/proceedings_initial.php");
                        //Incorporando el formulario que mostrara datos
                        include($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/forms_control_proceedings/form_proceedings_control.php");
                    
                    }

                    if($filter=="EXPEDIENTES GESTIONADOS"){
                        require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/proceedings/control_proceedings/proceedings_manage.php");
                        //Incorporando el formulario que mostrara datos
                        include($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/forms_control_proceedings/form_proceedings_control.php");
                    
                    }
              
                }catch(Exception $e){
                    echo'<script language="javascript">alert("No se encontraron resultados para su busqueda");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados.");</script>';}
            
            }

    }
}
$call=new Validation;
?>


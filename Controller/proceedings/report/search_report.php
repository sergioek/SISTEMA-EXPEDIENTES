<?php

class Validation{
    public function __construct(){
        
        if(isset($_GET["search"])){
            //Obteniendo valores del formulario o creando variables
            $number=$_GET["proceedings"];
            $year=$_GET["year"];

            //Iniciando comprobaciones
            switch($number){
                case(!filter_var($number,FILTER_VALIDATE_INT)):
                   $v1=FALSE;
                break;
                default:
                $v1=TRUE;
                }

            switch($year){
                case(!filter_var($year,FILTER_VALIDATE_INT)):
                    $v2=FALSE;
                break;
                default:
                $v2=TRUE;
                }
    
//Si todas las validaciones son verdaderas se realiza la busqueda           
            if($v1 && $v2==TRUE){

                try{
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/proceedings/report/search_report.php");
                //Si se encontro un reporte en search report del model se incorpora la parte grafica para mostrar esos datos
                    if($numeros_expediente==1){
                        require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/proceedings/report/report.php");
                    }else{
                        echo'<script language="javascript">alert("El numero y año de expedientes no se encuentran en la base de datos.");</script>';
                    }
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al buscar el expediente");</script>';}
            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }    
        }
}
$call=new Validation;
?>


<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["update"])){
            //Obteniendo valores del formulario.
            $requeriments=$_POST["requeriments"]; 
            $id=$_POST["id"];
            $name=$_POST["name"];
            //Obteniendo fecha
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
            $date = $Object->format("Y-m-d");  

        switch ($requeriments) {
            case (strlen($requeriments)>300):
                $v1=FALSE;
                break;
             case (empty($requeriments)):
                 $v1=FALSE;
                 break;
            default:
                $v1=TRUE;
                break;
             }

        switch ($id){
            case(empty($id)):
                $v2=FALSE;
                break;
            case(!filter_var($id,FILTER_VALIDATE_INT)):
                $v2=FALSE;
            default:
                $v2=TRUE;
                break;
        }

        switch ($name) {
            case (strlen($name)>50):
                $v3=FALSE;
                break;
             case (empty($name)):
                 $v3=FALSE;
                 break;
            default:
                $v3=TRUE;
                break;
             }

        

//Si todas las validaciones son verdaderas se incorpora el archivo           
            if($v1 && $v2 && $v3==TRUE){

                try{   
                //Llamando a los archivo para hacer el update
                require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/procedure/update_procedure.php");
                
                echo'<script language="javascript">alert("Trámite editado con éxito.");</script>';
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al editar un trámite.");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }
}
$call=new Validation;
?>


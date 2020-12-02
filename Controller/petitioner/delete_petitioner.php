<?php

class Validation{
    public function __construct(){
        
        if(isset($_POST["delete"])){
            //Obteniendo valores del formulario
            $dni=$_POST["dni"];
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
                
                include($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/Model/petitioner/delete_new_petitioner.php");
                }catch(Exception $e){
                    echo'<script language="javascript">alert("Error al borrar.Verifique que los datos sean correctos.");</script>';}

            }else{
                echo'<script language="javascript">alert("Error en los datos ingresados. Verifique el formato");</script>';}
            
            }

    }

}

$call=new Validation;

?>


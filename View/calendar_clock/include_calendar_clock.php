<?php
//Se busca saber si hay conexion a internet para poder cargar el reloj y el calendario que necesitan del mismo.. con @fsckopen se logra saber eso
class Validaciones{
  function Internet(){
    //Direccion de prueba
    $url="www.google.com";
    
    $validar=@fsockopen($url,80,$errno, $errstr, 20);

    if($validar){
      include($_SERVER['DOCUMENT_ROOT'] . "/SISTEMA EXPEDIENTES/View/calendar_clock/calendar_clock.php");
    }
    

}
}
$objeto= new Validaciones();
$objeto->Internet();



?>
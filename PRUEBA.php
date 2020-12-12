<?php

//$date=date("Y-m-d G:i:s");
$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
$DateAndTime = $Object->format("Y-m-d H:i:s");  
echo "La hora y dia en argentina es  $DateAndTime.\n";
//Comparando fechas
$vieja="2020-12-11 16:55:43";

if($DateAndTime>$vieja){
    echo "Fecha mayor";
}
?>

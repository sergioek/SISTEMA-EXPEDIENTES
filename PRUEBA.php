<?php
$value="01-11-2021";
//$date=date("Y-m-d G:i:s");
$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
$Date= $Object->format("d-m-Y");
echo "La hora y dia en argentina es  $Date.\n";

$date=date_create($value);
echo date_format($date,"Y-m-d");

?>

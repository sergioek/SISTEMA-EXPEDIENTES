<?php
//Incorpora la estructura HTML y CSS de la caratula
require($_SERVER["DOCUMENT_ROOT"] . "/SISTEMA EXPEDIENTES/View/plantillaPDF/caratula/caratula.php");
//Icorpora el documento autoload de la libreria MPDF
require_once($_SERVER["DOCUMENT_ROOT"] . "/SISTEMA EXPEDIENTES/View/mpdf/vendor/autoload.php");
//Genera un objeto con el formato A4
$mpdf=new \Mpdf\Mpdf([
    "format"=>"A4"
]);
//Genera el documento PDF a partir de la variable caratula del archivo caratula.php
$mpdf->WriteHTML($caratula,\Mpdf\HTMLParserMode::HTML_BODY);
//Agrega paginacion
$mpdf->SetFooter('{PAGENO}');
//Salida del documento para que se guarde con el numero de expediente (number_id)
$mpdf->Output("CARATULA EXPEDIENTE N°".$number_id.".PDF","D");
?>


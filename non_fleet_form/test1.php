<?php
use  Dompdf\Dompdf;
require 'vendor/autoload.php';
$html = "here is the text";
$codeHTML = utf8_encode($html);
$dompdf = new Dompdf();
$dompdf->load_html($codeHTMl);
$dompdf->setPaper('A4','landscape');
$dompdf->set_option('defaultFont','courier');
ini_set('memory_limit','128M');
$dompdf->render();
$dompdf->stream('invoice.pdf');



?>
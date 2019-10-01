<?php

echo __DIR__ . '/vendor/autoload.php';
exit();
$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();


?>
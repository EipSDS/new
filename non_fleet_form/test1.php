<?php

// Using default PHP curl library
$ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=7ZFW82HETUNMVPKI4SA27OG9JY30L36B056QR49CD11X85&content=http://givesurance.herokuapp.com/non_fleet_form/non_fleet_form.php/?phone=45364563&contact_id=4098623000001221042&margin=10&html_width=1024&title=My PDF Title');

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
?>
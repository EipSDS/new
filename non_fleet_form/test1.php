<?php

// Using default PHP curl library
$ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=7ZFW82HETUNMVPKI4SA27OG9JY30L36B056QR49CD11X85&content=http://www.google.com/&margin=10&html_width=1024&title=My PDF Title');

echo $response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
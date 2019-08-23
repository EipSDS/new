<?php
$str='9404 HIGHWAY 57 MC INTYRE, GA 31054';

$test=(preg_split('#(?<=\d )(?=[a-z])#i', $str));
echo"<pre>";
print_r($test);
echo"</pre>";
 $street=$test[0];
$street2=$test[1];
echo$street3=$street.$street2;
echo"<br>";
 $city=$test[2];
 $City_value=(explode(",",$city));
 print_r($City_value);
echo $City_value[0];
echo"<br>";
echo $City_value[1];

?>
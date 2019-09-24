<?php
$dataform=$_POST['dataform'];
print_r($dataform);
echo "<br>";
echo $dataform['contactId'];
echo $dataform['Tractors2'];
echo $data = json_decode($_POST['dataform']);
echo $jsondata = json_encode($data);
echo "<br>";
echo "break";
print_r($jsondata);
/* exit();
	if(ISSET($_POST['savedata']) && $_POST['savedata']=='success'){
		echo $data = json_encode($_POST);
	} */
	
?>
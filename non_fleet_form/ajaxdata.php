<?php
$dataform=$_POST['dataform'];
echo $dataform;
echo "<br>";
echo $dataform['contactId'];
echo $dataform['Tractors2'];
echo $data = json_decode($_POST['dataform']);
/* exit();
	if(ISSET($_POST['savedata']) && $_POST['savedata']=='success'){
		echo $data = json_encode($_POST);
	} */
	
?>
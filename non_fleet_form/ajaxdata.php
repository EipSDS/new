<?php
echo $_POST;

	if(ISSET($_POST['savedata']) && $_POST['savedata']=='success'){
		echo $data = json_encode($_POST);
	}
	
?>
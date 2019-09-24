<?php

	if(ISSET($_POST['CargoRelated_next']) && $_POST['CargoRelated_next']=='success'){
		echo json_encode($_POST);
		exit();
	}
	
?>
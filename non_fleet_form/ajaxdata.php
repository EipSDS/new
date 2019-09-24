<?php

	if(ISSET($_POST['CargoRelated_next']) && $_POST['CargoRelated_next']=='success'){
		echo json_encode($_POST);
	echo '<script type="text/javascript">alert("' . $_POST . '")</script>';
	
echo '<script language="javascript">';
echo 'alert("'.$_POST.'")';
echo '</script>';
	}
	
?>
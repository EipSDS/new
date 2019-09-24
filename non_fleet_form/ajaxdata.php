<?php

	if(ISSET($_POST['CargoRelated_next']) && $_POST['CargoRelated_next']=='success'){
		echo $data = json_encode($_POST);
	echo '<script type="text/javascript">alert("' . $data . '")</script>';
	
echo '<script language="javascript">';
echo 'alert("'.$data.'")';
echo '</script>';
	}
	
?>
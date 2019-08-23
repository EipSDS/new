<?php
error_reporting(E_ERROR | E_PARSE);
include('functions.php');
$handleFunctionsObject = new handleFunctions;
if(ISSET($_POST['queryCarrierSnapshot']) && !empty($_POST['odtNumber'])){
	$response=$handleFunctionsObject->getDataFromSafer($_POST['odtNumber']);
	if($response==0){
		$message='The record matching USDOT Number = '.$_POST['odtNumber'].' is INACTIVE in the SAFER database';	
	}else{
	echo '<pre>';
	print_r($response);
	echo '<pre>';
	}
}
?>



<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
		<div class="col-md-3">
		 </div>
        <div class="col-md-6">
    		<form method='POST'>
			<div id="contact-form" class="form-container" data-form-container style="color: rgb(46, 125, 50); background: rgb(200, 230, 201);">
			<div class="row">
				<?php if(ISSET($message)){
					echo ' 
					<div class="alert alert-warning">
						<strong>Warning!</strong>'.$message.'
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
					';
				}
				?>
				<div class="form-title">
					<span>Please fill your ODT Number </span>
				</div>
			</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input valid" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input your post title."> </span>
						<input type="text" data-min-length="6" placeholder="Enter Dot Number" name='odtNumber' >
					</span>
				</div>
				<div class="row submit-row">
					<button type="submit" class="btn btn-block submit-form valid" name='queryCarrierSnapshot'>Submit</button>
				</div>
			</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
<?php
error_reporting(E_ERROR | E_PARSE);
include('functions.php');
 $trelloListId	= '5d2901e0207a1126d1d915ea' ;
$trelloApiKey	= '1164815231d570ac9de8d17de3ec7715' ;
   $trelloToken	= 'ceb1f6872aac2666dd8a92332305e2ade498f18ad27f829a5cec641d925d9957' ;
$handleFunctionsObject = new handleFunctions;
if(ISSET($_POST['queryCarrierSnapshot']) && !empty($_POST['odtNumber'])){
	$response=$handleFunctionsObject->getDataFromSafer($_POST['odtNumber']);
	if($response==0){
		$message='The record matching USDOT Number = '.$_POST['odtNumber'].' is INACTIVE in the SAFER database';	
	}else{
		/*  echo '<pre>';
		print_r($response);
		echo '</pre>'; */
		
	//die();
	$getcustomefiledData = $handleFunctionsObject->getTrelloData('https://api.trello.com/1/boards/5d28c82085d34435e9d1869f/customFields?key='.$trelloApiKey.'&token='.$trelloToken.'');
	
	
	foreach($getcustomefiledData as $key => $value){
		if($value['name'] == 'Entity Type')
		{
			if(!empty($response['Entity_Type'])){
			
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Entity_Type'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		
		
		if($value['name'] == 'Safer Phone')
		{
			if(!empty($response['phone'])){
			
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['phone'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'DUNS Number')
		{
			
			if(!empty($response['duns_Number'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['duns_Number'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'MC/MX/FF Number(s)')
		{
			
			if($response['mc_mx_ff_nmumber']!=''){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			echo $data='{
			  "value": {"'.$value['type'].'": "'.$response['mc_mx_ff_nmumber'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'State Carrier ID Number')
		{
			
			if(!empty($response['state_carrier_ID_Number'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"number": "'.$response['state_carrier_ID_Number'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Cargo Carried')
		{
			
			if(!empty($response['Cargo_Carried'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Cargo_Carried'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'MCS-150 Form Mileage')
		{
			
			if(!empty($response['MCS_150_Mileage_year'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['MCS_150_Mileage_year'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'MCS-150 Form Date')
		{
			
			if(!empty($response['MCS_150_Form_Date'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['MCS_150_Form_Date'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Power Units')
		{
			
			if(!empty($response['power_units'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['power_units'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Operation Classification')
		{
			
			if(!empty($response['Operation_Classification'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Operation_Classification'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Drivers')
		{
			
			if(!empty($response['drivers'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"number": "'.$response['drivers'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Mailing Address')
		{
			
			if(!empty($response['mailing_address'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['mailing_address'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'DOT')
		{
			
			if(!empty($response['usdot_number'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"'.$value['type'].'": "'.$response['usdot_number'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Carrier Operation')
		{
			
			if(!empty($response['Carrier_Operation'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Carrier_Operation'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Company Name')
		{
			
			if(!empty($response['legal_name'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['legal_name'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Garaging Street')
		{
			
			if(!empty($response['physical_address'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['physical_address'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Operating Status')
		{
			
			if(!empty($response['operating_status'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['operating_status'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		if($value['name'] == 'Out of Service Date')
		{
			
			
			if(!empty($response['Out_of_Service_date']) &&  $response['Out_of_Service_date']!='None' ){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Out_of_Service_date'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';
			}else{
				$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['Out_of_Service_date'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';
				
			}
			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			
		}
		if($value['name'] == 'DBA Name')
		{
			
			if(!empty($response['dba_name'])){
			$url='https://api.trello.com/1/cards/'.$_POST['cardId'].'/customField/'.$value ['id'].'/item?key='.$trelloApiKey.'&token='.$trelloToken.'';
			$data='{
			  "value": {"text": "'.$response['dba_name'].'"},
			  "key": "'.$trelloApiKey.'",
			  "token": "'.$trelloToken.'"
			}';

			$getcustomefiledData = $handleFunctionsObject->updateTrelloCardCustomFields($url,$data);
			}
		}
		
		$message='Thanks for submitting Dot Number.';
		
	}
	}
}
 
if(ISSET($_GET['u']) && !empty($_GET['u'])){
 $email=$_GET['u'];
	$trelloLists = $handleFunctionsObject->getTrelloData('https://api.trello.com/1/lists/'.$trelloListId.'/cards?key='.$trelloApiKey.'&token='.$trelloToken.'');
	 
	foreach($trelloLists as $trallolist){
		$check = explode("_",$trallolist['name']);
		if($check[2]==$email){
			$card_id=$trallolist['id'];
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
						<input type="text"  placeholder="Enter Dot Number" name='odtNumber' >
						<input type="hidden"  name='customerEmail' value='<?php echo $email ;?>'>
						<input type="hidden" name='cardId' value='<?php echo $card_id ;?>'>
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
<?php }
?>

<?php
error_reporting(E_ERROR | E_PARSE);
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
 $old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
//https://accounts.zoho.com/oauth/v2/auth?scope=ZohoCRM.modules.contacts.ALL&client_id=1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH&response_type=code&access_type=offline&redirect_uri=https://givesurance.herokuapp.com/collectdot.php
 
$handleFunctionsObject = new handleFunctions;
if(ISSET($_POST['queryCarrierSnapshot']) && !empty($_POST['odtNumber']) && !empty($_POST['contactId'])){
	$response=$handleFunctionsObject->getDataFromSafer($_POST['odtNumber']);
	if($response==0){
		$message='The record matching USDOT Number = '.$_POST['odtNumber'].' is INACTIVE in the SAFER database';	
	}else{
		/*   echo '<pre>';
		print_r($response);
		echo '</pre>';  */
		if(!empty($response['MCS_150_Form_Date']) &&  $response['MCS_150_Form_Date']!='None' ){
		 $MCS_150_Form_Date=date("Y-m-d", strtotime($response['MCS_150_Form_Date']));
		}else{
			$MCS_150_Form_Date='';
		}
		
		if(!empty($response['Out_of_Service_date']) &&  $response['Out_of_Service_date']!='None' ){
		 $Out_of_Service_date=date("Y-m-d", strtotime($response['Out_of_Service_date']));
		}else{
			$Out_of_Service_date='';
		}	
			 $url = "Contacts/".$_POST['contactId'];
			 $data = '{
			"data": [{
			"Entity_Type": "'.$response['Entity_Type'].'",
            "Operating_Status": "'.$response[''].'", 
            "Drivers":  "'.$response['drivers'].'", 
            "Carrier_Operation":  "'.$response['Carrier_Operation'].'", 
            "Power_Units":  "'.$response['power_units'].'", 
            "DBA_Name":  "'.$response['dba_name'].'", 
            "DUNS_Number":  "'.$response['duns_Number'].'", 
            "Garaging_Street":  "'.$response['physical_address'].'", 
            "DOT":  "'.$response['usdot_number'].'", 
            "Out_of_Service_Date":  "'.$Out_of_Service_date.'", 
            "Safer_Phone":  "'.$response['phone'].'", 
            "MC_MX_FF_Number_s":  "'.$response['mc_mx_ff_nmumber'].'", 
            "Operation_Classification":  "'.$response['Operation_Classification'].'", 
            "Cargo_Carried":  "'.$response['Cargo_Carried'].'", 
            "MCS_150_FormDate":  "'.$MCS_150_Form_Date.'", 
            "Operating_Status":  "'.$response['operating_status'].'", 
            "MCS_150_Form_Mileage":  "'.$response['MCS_150_Mileage_year'].'", 
            "State_Carrier_ID_Number":  "'.$response['state_carrier_ID_Number'].'", 
            "Mailing_Street":  "'.$response['mailing_address'].'", 
            "Company_Name":  "'.$response['legal_name'].'" 
			}]}'; 
			
			$response=  $handleFunctionsObject->zoho_curl($url,"PUT",$data,$old_access_token);
			/* echo '<pre>';
			print_R($response);
			echo '</pre>'; */
			$message='Thanks for submitting Dot Number.';
		
	}
}
if(ISSET($_GET['code']))
{
$code = $_GET['code'];
$url = "token";
$data = array("code"=>$code,"redirect_uri"=>"https://givesurance.herokuapp.com/collectdot.php","client_id"=>"".$zoho_client_id."","client_secret"=>"".$zoho_client_secret."","grant_type"=>"authorization_code");
$get_token = $handleFunctionsObject->zoho_auth($url,"POST",$data);
file_put_contents("access_token.txt", $get_token['access_token']); 
file_put_contents("refresh_token.txt", $get_token['refresh_token']); 
 echo $old_access_token = file_get_contents("access_token.txt");
}
 
if(ISSET($_GET['u']) && !empty($_GET['u'])){
  $email=$_GET['u'];
	 $url = "Contacts/search?email=".$email."";
	$data = "";
	$check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
	 $check_token_valid['code'];
if($check_token_valid['code'] == "INVALID_TOKEN" || $check_token_valid['code'] == "AUTHENTICATION_FAILURE"){
	$url = "token";
	$data = array("refresh_token"=>$refresh_token,"client_id"=>"".$zoho_client_id."","client_secret"=>"".$zoho_client_secret."","grant_type"=>"refresh_token");
	$get_new_token = $handleFunctionsObject-> zoho_auth($url,"POST",$data);
	if(isset($get_new_token['access_token'])){
		file_put_contents("access_token.txt",$get_new_token['access_token']);
	}
	if(isset($get_new_token['refresh_token'])){
		file_put_contents("refresh_token.txt",$get_new_token['refresh_token']);
	}
	$old_access_token = file_get_contents("access_token.txt");
	$url = "Contacts/search?email=".$email."";
	$data = "";
	$check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
	
	  $contactId=$check_token_valid['data'][0]['id'];
} else{
	/* echo '<pre>';
	print_r($check_token_valid);
	echo '</pre>'; */
	  $contactId=$check_token_valid['data'][0]['id'];
}
?>




<link href="css/style.css" rel="stylesheet">
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
						<input type="hidden" name='contactId' value='<?php echo $contactId ;?>'>
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

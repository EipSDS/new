<?php
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");

$contact_id=$_GET['contact_id'];
$phone_number=$_GET['phone'];

echo $contact_id;
echo $phone_number;


if($contact_id!== ''){
	
				$url = "Contacts/search?$contact_id";
			$data = "";
			$check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
	
	
}











?>
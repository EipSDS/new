<?php
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
//$contact_id=$_GET['contact_id'];
//echo $contact_id;
echo $phone_number;
$phone_number=$_GET['phone'];

if(!empty($phone_number)){		
		echo "Contact ID found";	
				$url = "Contacts/search?phone=$phone_number";
			$data = "";
			 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
			if($check_token_valid['code']== "INVALID_TOKEN"){
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
				 $url = "Contacts/search?phone=$phone_number";
				$data = "";
				 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
	$contact_id=$check_token_valid['data'][0]);
	$first_name=$check_token_valid['data'][0]['First_Name']);
	$effective_date=$check_token_valid['data'][0]['Policy_Effective_Date']);
	$garaging_address=$check_token_valid['data'][0]['Home_Address']);
	$USDOT_Assigned_to=$check_token_valid['data'][0]['USDOT_Assigned_to']);
	$garaging_City=$check_token_valid['data'][0]['City']);
	$garaging_State=$check_token_valid['data'][0]['State']);
	$garaging_ZIP_Code=$check_token_valid['data'][0]['ZIP_Code']);
	$Yrs_in_business=$check_token_valid['data'][0]['Yrs_in_business']);
	$Mailing_Address=$check_token_valid['data'][0]['Mailing_Address']);
	$City_Two=$check_token_valid['data'][0]['City_Two']);
	$State_Two=$check_token_valid['data'][0]['State_Two']);
	$ZIP_Code_Two=$check_token_valid['data'][0]['ZIP_Code_Two']);
	$E_mail_Address=$check_token_valid['data'][0]['E_mail_Address']);
	$Radious_0_50_miles=$check_token_valid['data'][0]['Radious_0_50_miles']);
	$Radious_50_200_miles=$check_token_valid['data'][0]['Radious_50_200_miles']);
	
	echo "<pre>";			 0
	print_r($check_token_valid['data'][0]);
    echo "</pre>";
	
	
}
else{
	echo "<pre>";
	echo "valid taken";
	echo $check_token_valid['code'];
	echo "</pre>";
}	
}







else{
	echo "contact not found";
}



?>
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
echo $contact_id=$check_token_valid['data'][0];
echo $first_name=$check_token_valid['data'][0]['First_Name'];
echo $effective_date=$check_token_valid['data'][0]['Policy_Effective_Date'];
echo $garaging_address=$check_token_valid['data'][0]['Home_Address'];
echo $USDOT_Assigned_to=$check_token_valid['data'][0]['USDOT_Assigned_to'];
echo $garaging_City=$check_token_valid['data'][0]['City'];
echo $garaging_State=$check_token_valid['data'][0]['State'];
echo $garaging_ZIP_Code=$check_token_valid['data'][0]['ZIP_Code'];
echo $Yrs_in_business=$check_token_valid['data'][0]['Yrs_in_business'];
echo $Mailing_Address=$check_token_valid['data'][0]['Mailing_Address'];
echo $City_Two=$check_token_valid['data'][0]['City_Two'];
echo $State_Two=$check_token_valid['data'][0]['State_Two'];
echo $ZIP_Code_Two=$check_token_valid['data'][0]['ZIP_Code_Two'];
echo $E_mail_Address=$check_token_valid['data'][0]['E_mail_Address'];
echo $Radious_0_50_miles=$check_token_valid['data'][0]['Radious_0_50_miles'];
echo $Radious_50_200_miles=$check_token_valid['data'][0]['Radious_50_200_miles'];
echo $Radious_400_miles=$check_token_valid['data'][0]['Radious_200_miles'];
echo $Radious_600_miles=$check_token_valid['data'][0]['Radious_600_miles'];
	
	echo "<pre>";			 
	print_r($check_token_valid);
    echo "</pre>";
	
	
}
else{
	 $url = "Contacts/search?phone=$phone_number";
	 $data = "";
	 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
echo $contact_id=$check_token_valid['data'][0];
echo $first_name=$check_token_valid['data'][0]['First_Name'];
echo $effective_date=$check_token_valid['data'][0]['Policy_Effective_Date'];
echo $garaging_address=$check_token_valid['data'][0]['Home_Address'];
echo $USDOT_Assigned_to=$check_token_valid['data'][0]['USDOT_Assigned_to'];
echo $garaging_City=$check_token_valid['data'][0]['City'];
echo $garaging_State=$check_token_valid['data'][0]['State'];
echo $garaging_ZIP_Code=$check_token_valid['data'][0]['ZIP_Code'];
echo $Yrs_in_business=$check_token_valid['data'][0]['Yrs_in_business'];
echo $Mailing_Address=$check_token_valid['data'][0]['Mailing_Address'];
echo $City_Two=$check_token_valid['data'][0]['City_Two'];
echo $State_Two=$check_token_valid['data'][0]['State_Two'];
echo $ZIP_Code_Two=$check_token_valid['data'][0]['ZIP_Code_Two'];
echo $E_mail_Address=$check_token_valid['data'][0]['E_mail_Address'];
echo $Radious_0_50_miles=$check_token_valid['data'][0]['Radious_0_50_miles'];
echo $Radious_50_200_miles=$check_token_valid['data'][0]['Radious_50_200_miles'];
echo $Radious_400_miles=$check_token_valid['data'][0]['Radious_200_miles'];
echo $Radious_600_miles=$check_token_valid['data'][0]['Radious_600_miles'];	
echo $DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];	
echo $Name1=$check_token_valid['data'][0]['Name1'];	
	
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
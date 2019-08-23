<?php
include('functions.php');
 $trelloListId	= '5d2901e0207a1126d1d915ea' ;
$trelloApiKey	= '1164815231d570ac9de8d17de3ec7715' ;
$trelloToken	= 'ceb1f6872aac2666dd8a92332305e2ade498f18ad27f829a5cec641d925d9957' ;
$trelloboard	= '5d28c82085d34435e9d1869f' ;
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
$handleFunctionsObject = new handleFunctions;
$data = file_get_contents("php://input");
file_put_contents('zohoinput.txt',$data)  ; 
$get_string=file_get_contents('zohoinput.txt');
parse_str($get_string, $get_array);

if($get_array['dot']){
	$response=$handleFunctionsObject->getDataFromSafer($get_array['dot']);
	if($response==0){
		//echo $message='The record matching USDOT Number = '.$get_array['dot'].' is INACTIVE in the SAFER database';	
	}else{
		  /*  echo '<pre>';
		print_r($response);
		echo '</pre>';  
		*/
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
			$contacturl = "Contacts/".$get_array['ContactId'];
			 $Contactdata = '{
			"data": [{
			"Entity_Type": "'.$response['Entity_Type'].'",
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
			
			$response =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if(isset($response['code'])&& $response['code'] == "INVALID_TOKEN" || $response['code'] == "AUTHENTICATION_FAILURE"){
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
				
				$response=  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			}
			
			
		
	}
}
?>

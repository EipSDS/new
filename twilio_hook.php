<?php

include('functions.php');

$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");


/* $dataPOST = (file_get_contents('php://input'));
$body = $_POST['Memory'];
$currenttask = $_POST['CurrentTask'];

$array = json_decode($body,TRUE); */


 $phone_number = $array["twilio"]["sms"]["From"];
 $driver_first_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_first_name"]["answer"];
 $driver_last_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_last_name"]["answer"];
$dot_number="54444444";
 //$dot_number=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["type_your_dot_number"]["answer"];
 $phone_number= "912544444";
 //$phone_number = $array["twilio"]["sms"]["From"];
 $messagesid = $array["twilio"]["sms"]["MessageSid"];
 $array["twilio"]["collected_data"]["vehicles_questions"]["answer"];
 $driver_first_name ="simran tests"
 $driver_last_name ="simran tests"
// $driver_first_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_first_name"]["answer"];
 $driver_last_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_last_name"]["answer"];
 $vin_number_of_vehicle = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["vin_number_of_vehicle"]["answer"];
 
 $dob=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["date_of_birth_of_driver"]["answer"];
 $licence_number=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["license_number_of_driver"]["answer"];
 $linsance_test=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["license_number_of_driver"];
 //$test=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"];
 //$date_completed=$array["twilio"]["collected_data"]["vehicles_questions"]["date_completed"];
 //$date_started=$array["twilio"]["collected_data"]["vehicles_questions"]["date_started"];
 $status=$array["twilio"]["collected_data"]["vehicles_questions"]["status"];


/*  $url = "Contacts/search?phone=$phone_number";
 $data = "";
 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
 		if(ISSET($check_token_valid['code']) && $check_token_valid['code'] == "INVALID_TOKEN"){ */
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

					 $contactId=$check_token_valid['data'][0]['id'];	
					$contacturl = "Contacts/".$contactId;
					 $Contactdata = '{
								"data": [{
								"Phone":  "'.$phone_number.'" ,
								"Last_Name":  "'.$driver_last_name.'" ,
								"First_Name":  "'.$driver_first_name.'", 
								"USDOT_associated_with_the_insured_s_business": "'.$dot_number.'"
								}]}'; 
						
						
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"POST",$Contactdata,$old_access_token);



/* 					else{
						echo "failed";
			

 } */

/* else{
					 $contactId=$check_token_valid['data'][0]['id'];
					$url = "Contacts/".$contactId;
			 $Contact = '{
			"data": [{
			"Phone":  "'.$from.'" ,
			"Last_Name":  "'.$driver_first_name.'" ,
			"First_Name":  "'.$driver_last_name.'" ,
			}]}';	
								
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($url,"POST",$Contact,$old_access_token); */
					

?>
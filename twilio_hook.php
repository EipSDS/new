<?php

include('functions.php');

$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");

$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");

/*   $driver_last_name ="simran ";
 $driver_first_name ="simrantwest";
 $phone_number= 11155672;
 $dot_number="5444444";
 $DOB="19/07/2019";
 $LicenceNo="11223355";
 $vin_number="VIN 123456";  */

 $dataPOST = (file_get_contents('php://input'));
$body = $_POST['Memory'];
$currenttask = $_POST['CurrentTask'];

$array = json_decode($body,TRUE);  


 $phone_number = preg_replace("/[^0-9]/", "",$array["twilio"]["sms"]["From"]);
 $driver_first_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_first_name"]["answer"];
 $driver_last_name = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["driver_last_name"]["answer"];
 $dot_number=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["type_your_dot_number"]["answer"];
 $vin_number = $array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["vin_number_of_vehicle"]["answer"];
 $DOB=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["date_of_birth_of_driver"]["answer"];
 $LicenceNo=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["license_number_of_driver"]["answer"];
 $linsance_test=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["license_number_of_driver"]; 
 $DOB_LicenceNo=$DOB.','.$LicenceNo;
 
 //$test=$array["twilio"]["collected_data"]["vehicles_questions"]["answers"];
 //$date_completed=$array["twilio"]["collected_data"]["vehicles_questions"]["date_completed"];
 //$date_started=$array["twilio"]["collected_data"]["vehicles_questions"]["date_started"];
 //$messagesid = $array["twilio"]["sms"]["MessageSid"];
 //$array["twilio"]["collected_data"]["vehicles_questions"]["answer"];
 //$status=$array["twilio"]["collected_data"]["vehicles_questions"]["status"]; 

 if(!empty($array["twilio"]["collected_data"]["vehicles_questions"]["answers"]["license_number_of_driver"]["answer"]) && (!empty($phone_number))){
 $url = "Contacts/search?phone=$phone_number";
 $data = "";
 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
  
 if(ISSET($check_token_valid['code']) && $check_token_valid['code'] == "INVALID_TOKEN"){  
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
                    if(!empty($check_token_valid['data'][0]['id'])){
 					$contactId=$check_token_valid['data'][0]['id']; 
					$contacturl = "Contacts/".$contactId;
					$Contactdata = '{
								"data": [{
								"Phone":  "'.$phone_number.'" ,
								"Last_Name":  "'.$driver_last_name.'" ,
								"First_Name":  "'.$driver_first_name.'",
								"USDOT_associated_with_the_insured_s_business":  "'.$dot_number.'"
								}]}'; 
						
						
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
					
					}
					
 
 			else{ 	
					$contacturl = "Contacts";
					 $Contactdata = '{
								"data": [{
					"Phone":  "'.$phone_number.'" ,
					"Last_Name":  "'.$driver_last_name.'" ,
					"First_Name":  "'.$driver_first_name.'",
                    "USDOT_associated_with_the_insured_s_business":  "'.$dot_number.'"
								}]}'; 
								
					@$contactresponse =  $handleFunctionsObject->zoho_curl($contacturl,"POST",$Contactdata,$old_access_token);
				
 					  if(!empty($contactresponse['data'][0]['details']['id'])){
				    $Id=$contactresponse['data'][0]['details']['id'];

	    $url = "Contacts/".$Id;
 
 	    $DOB_LicenceNo=$DOB.$LicenceNo;
		$new_array=array(
		"Name1"=>$driver_last_name,"DOB_Age_MaritalStatus_Points_LicenceNo" => $DOB_LicenceNo
		) ;
		$driversData[0]=$new_array;
			$dd=json_encode($driversData);
			  $data1 = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
			@$response =  $handleFunctionsObject->zoho_curl($url,"PUT",$data1,$old_access_token);
 
			$qry = "SELECT contact_id FROM public.contact_vehicles where contact_id=".$Id."";
			$rs = pg_query($qry);
			$rows = pg_num_rows($rs);
			if($rows){
			echo "data already exists";
			}
 				else{
	
				}	
 
					  } 

	}

}
 else{
                    if(!empty($check_token_valid['data'][0]['id'])){
 					$contactId=$check_token_valid['data'][0]['id']; 
					$contacturl = "Contacts/".$contactId;
					$Contactdata = '{
								"data": [{
								"Phone":  "'.$phone_number.'" ,
								"Last_Name":  "'.$driver_last_name.'" ,
								"First_Name":  "'.$driver_first_name.'",
								"USDOT_associated_with_the_insured_s_business":  "'.$dot_number.'"
								}]}'; 
						
						
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
					
					}
 			else{
					$contacturl = "Contacts";
					 $Contactdata = '{
								"data": [{
					"Phone":  "'.$phone_number.'" ,
					"Last_Name":  "'.$driver_last_name.'" ,
					"First_Name":  "'.$driver_first_name.'",
                    "USDOT_associated_with_the_insured_s_business":  "'.$dot_number.'"
                    }]}';
								
					@$contactresponse =  $handleFunctionsObject->zoho_curl($contacturl,"POST",$Contactdata,$old_access_token);
				
 					  if(!empty($contactresponse['data'][0]['details']['id'])){
				    $Id=$contactresponse['data'][0]['details']['id'];
       
	   $url = "Contacts/".$Id;
 
 	    $DOB_LicenceNo=$DOB.$LicenceNo;
		$new_array=array(
		"Name1"=>$driver_last_name,"DOB_Age_MaritalStatus_Points_LicenceNo" => $DOB_LicenceNo
		) ;
		$driversData[0]=$new_array;
			$dd=json_encode($driversData);
			  $data1 = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
			
				$Contactdata = '{
			  "data": ['.json_encode($d).']
			}';
			
			@$zresponse =  $handleFunctionsObject->zoho_curl($url,"PUT",$data1,$old_access_token);
			$qry = "SELECT contact_id FROM public.contact_vehicles where contact_id=".$Id."";
			$rs = pg_query($qry);
			$rows = pg_num_rows($rs);
			if($rows){
			echo "data already exists";
			}
 				else{
					$query = "INSERT INTO public.contact_vehicles(contact_id,vin) VALUES ('$Id','$vin_number')";
					$result = pg_query($query);	
				}
					} 
 
 
				} 
				
}  

			
}



/* 		}

				else{
						echo "failed";
			

 }  */

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
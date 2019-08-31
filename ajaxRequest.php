 <?php
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
	if(ISSET($_POST['form_zero_step']) && $_POST['form_zero_step']=='success'){
		
		echo json_encode($_POST);
	}


	if(ISSET($_POST['getZohoContact']) && $_POST['getZohoContact']=='success'){
		//$response=array();
		$phone_number=preg_replace("/[^0-9]/", "", $_POST['phone_number']);
		$firstname=$_POST['contact_first_name'];
		$lastname=$_POST['contact_last_name'];
		$quick_quote_for_insurance=$_POST['quick_quote_for_insurance'];
		
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
								"Last_Name":  "'.$lastname.'" ,
								"First_Name":  "'.$firstname.'" 
								
								}]}'; 
								
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
					$dot = $check_token_valid['data'][0]['USDOT_associated_with_the_insured_s_business'];
					$mc	=	$check_token_valid['data'][0]['MC_MX_FF_Number_s'];
					$url = "Contacts/$contactId";
					$data = "";
					$contactdata =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);	
					$contactDataGet=$handleFunctionsObject->GetContactData($contactId);
					$d='';
					$Specify_Commodities_Hauled=explode("~",$contactdata['data'][0]['Specify_Commodities_Hauled']);
					$filtered_Specify_Commodities_Hauled = array_filter($Specify_Commodities_Hauled); 
					foreach($filtered_Specify_Commodities_Hauled as $Specify){
						$commoditiesdata=  $handleFunctionsObject->GetContactcommoditeies($contactId,$Specify);
						if($commoditiesdata!=0){
						$d.='<div class="col-sm-4">
						<label>'.$commoditiesdata[0]['name'].'</label>
						<input type="number" name="'.$commoditiesdata[0]['name'].'"  value="'.$commoditiesdata[0]['value'].'" min="0">
						</div>';
						}
					}
					$vehicles=$handleFunctionsObject->GetContactVehicles($contactId);
			
					$response=array('contactId'=>$contactId,'Dot'=>$dot,'MC'=>$mc,'conatctData'=>$contactdata['data'][0],'contactData'=>$contactDataGet,'commodities_data'=>$d,'vehicles_data'=>$vehicles);
				}else{
					
					$url = "Contacts";
					$Contactdata = '{
					"data": [{
					"Phone":  "'.$phone_number.'" ,
					"Last_Name":  "'.$lastname.'" ,
					"First_Name":  "'.$firstname.'" ,
					"Would_you_like_quick_quote_for_insurance_today": "'.$quick_quote_for_insurance.'" 
				
					
					}]}';
					@$contactresponse =  $handleFunctionsObject->zoho_curl($url,"POST",$Contactdata,$old_access_token);
					  if(!empty($contactresponse['data'][0]['details']['id'])){
				    $contactId=$contactresponse['data'][0]['details']['id'];
				   
					$response=array('contactId'=>$contactId,'Dot'=>'','MC'=>'','conatctData'=>'','contactData'=>'','commodities_data'=>'','vehicles_data'=>0);
					}else{
						
						$response=0;
					}  
				} 
			} else{
				
			 	if(!empty($check_token_valid['data'][0]['id'])){
					 $contactId=$check_token_valid['data'][0]['id'];
					$contacturl = "Contacts/".$contactId;
					 $Contactdata = '{
								"data": [{
								"Last_Name":  "'.$lastname.'" ,
								"First_Name":  "'.$firstname.'" 
								
								}]}'; 
								
					@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
					
				   
					$dot=$check_token_valid['data'][0]['USDOT_associated_with_the_insured_s_business'];
					$mc=$check_token_valid['data'][0]['MC_MX_FF_Number_s'];
					
					
					$url = "Contacts/$contactId";
					$data = "";
					$contactdata =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);	
					$contactDataGet=$handleFunctionsObject->GetContactData($contactId);
					$Specify_Commodities_Hauled=explode("~",$contactdata['data'][0]['Specify_Commodities_Hauled']);
					$d='';
					$filtered_Specify_Commodities_Hauled = array_filter($Specify_Commodities_Hauled); 
					foreach($filtered_Specify_Commodities_Hauled as $Specify){
						$commoditiesdata=  $handleFunctionsObject->GetContactcommoditeies($contactId,$Specify);
						if($commoditiesdata!=0){
						$d.='<div class="col-sm-4">
						<label>'.$commoditiesdata[0]['name'].'</label>
						<input type="number" name="'.$commoditiesdata[0]['name'].'"  value="'.$commoditiesdata[0]['value'].'" min="0">
						</div>';
						}
					}
					$vehicles=$handleFunctionsObject->GetContactVehicles($contactId);
			
					$response=array('contactId'=>$contactId,'Dot'=>$dot,'MC'=>$mc,'conatctData'=>$contactdata['data'][0],'contactData'=>$contactDataGet,'commodities_data'=>$d,'vehicles_data'=>$vehicles);
				}else{
					$url = "Contacts";
					$Contactdata = '{
					"data": [{
					"Phone":  "'.$phone_number.'" ,
					"Last_Name":  "'.$lastname.'" ,
					"First_Name":  "'.$firstname.'" ,
					"Would_you_like_quick_quote_for_insurance_today": "'.$quick_quote_for_insurance.'"
					}]}';
					@$contactresponse =  $handleFunctionsObject->zoho_curl($url,"POST",$Contactdata,$old_access_token);
					  if(!empty($contactresponse['data'][0]['details']['id'])){
						   $contactId=$contactresponse['data'][0]['details']['id'];
					$response=array('contactId'=>$contactId,'Dot'=>'','MC'=>'','conatctData'=>'','contactData'=>'','commodities_data'=>'','vehicles_data'=>0);
					}else{
						
						$response=0;
					}  
				} 
				
			}
			
			echo json_encode($response);
	}
	if(ISSET($_POST['intro_data_next']) && $_POST['intro_data_next']=='success'){
		 $contact = $_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
			
		@$zohoResponse =  $handleFunctionsObject->insertintroconatctdata($contact,$form_data);
		if($zohoResponse == 1){
				echo json_encode($zohoResponse);
		} 
		echo json_encode($zohoResponse);
	}
 
 
 
	if(ISSET($_POST['getSaferData']) && $_POST['getSaferData']=='success'){
		@$response=$handleFunctionsObject->getDataFromSafer($_POST['searchedNumber']);
		if($response==0){
			echo 0;	
		}else{
		
			 $contacturl = "Contacts/".$_POST['contactId'];
			 $Contactdata = '{
			"data": [{
            "USDOT_associated_with_the_insured_s_business":  "'.$_POST['searchedNumber'].'" ,
			"Do_you_want_a_new_DOT_number":  " " ,
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
		
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($response);
			}
			
			
		}
	}
	if(ISSET($_POST['getMcData']) && $_POST['getMcData']=='success'){
		 $contacturl = "Contacts/".$_POST['contactId'];
		 if($_POST['already']==1){
			 $Contactdata = '{
			"data": [{
            "MC_MX_FF_Number_s":  "'.$_POST['mc'].'" ,
			"Do_you_want_a_new_DOT_number":  "'.$_POST['need_new_DOT_number'].'" ,
			"USDOT_associated_with_the_insured_s_business":  "'.$_POST['searchedNumber'].'" 
			}]}';  
			 
			}else if($_POST['updatemc']==1){
			 $Contactdata = '{
			"data": [{
            "MC_MX_FF_Number_s":  "'.$_POST['mc'].'" 
			}]}'; 
			
			}
			 else{
			 $Contactdata = '{
			"data": [{
            "MC_MX_FF_Number_s":  "'.$_POST['mc'].'" ,
			"Do_you_want_a_new_DOT_number":  "'.$_POST['need_new_DOT_number'].'" ,
			"USDOT_associated_with_the_insured_s_business":  "'.$_POST['searchedNumber'].'" 
			}]}'; 
		 }
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
		
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			} 
		
	}
	if(ISSET($_POST['physical_address']) && $_POST['physical_address']=='success'){
		 $contacturl = "Contacts/".$_POST['contactId'];
			 $Contactdata = '{
			"data": [{
            "Home_Address":  "'.$_POST['physicaladdress'].'" 
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
		
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}
	}
	if(ISSET($_POST['mailing_address']) && $_POST['mailing_address']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
			 $Contactdata = '{
			"data": [{
            "Mailing_Address":  "'.$_POST['mailingaddress'].'" ,
            "ZIP_Code_Two":  "'.$_POST['mailing_Postal'].'" ,
            "State_Two":  "'.$_POST['mailing_state'].'" ,
            "City_Two":  "'.$_POST['mailing_city'].'" 
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
		
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}
	}
	if(ISSET($_POST['safer_data_next']) && $_POST['safer_data_next']=='success'){
		 $contacturl = "Contacts/".$_POST['contactId'];
			/*  $Contactdata = '{
			"data": [{
            "Mailing_Address":  "'.$_POST['mailingaddress'].'" ,
            "ZIP_Code_Two":  "'.$_POST['mailingaddress'].'" ,
            "State_Two":  "'.$_POST['mailing_state'].'" ,
            "City_Two":  "'.$_POST['mailing_city'].'" ,
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
		
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			} */
		 
		 echo json_encode($_POST);
		 
	}
	if(ISSET($_POST['general_data_next']) && $_POST['general_data_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
		  /* echo '<pre>';
			print_r($form_data);
		echo '<pre>'; */ 
		$filtered_Specify_Commodities_Hauled_filtered = array_filter($form_data['Specify_Commodities_Hauled']); 
		$Specify_Commodities_Hauled=implode("~",$filtered_Specify_Commodities_Hauled_filtered);
		
		foreach($filtered_Specify_Commodities_Hauled_filtered as $comm){
				  $databaseRes =  $handleFunctionsObject->insertcommoditiesconatctdata($_POST['contactId'],$comm,'');
			
		}
		
		if($form_data['Contact_Insured_phone']==''){
			$phone=$form_data['Contact_Insured_phone_hidden'];
			
		}else{
			$phone=$form_data['Contact_Insured_phone'];
		}
		
		 $d=array(
            "Policy_Effective_Date"=>  "". date("Y-m-d", strtotime($form_data['Policy_Effective']))."" ,
            "Is_the_customer_currently_insured_with_Progressive"=>  "".trim($form_data['customer_Progressive_Commercial'])."" ,
            "Structure" =>  "".trim($form_data['Business_Organization_Structure'])."" ,
            "Business_Type_Category"=>  "".trim($form_data['Business_type'])."" ,
            "Do_you_have_a_DBA"=>  "".trim($form_data['have_DBA'])."" ,
            "DBA_Name"=>  "".trim($form_data['DBA_NAME'])."" ,
            "USDOT_Assigned_to"=>  "".trim($form_data['USDOT_Assigned_to'])."" ,
            "Does_the_information_assigned_to_this_USDOT_match"=>  "".trim($form_data['is_match_USDOT'])."" ,
            "First_Name1"=>  "".trim($form_data['Insured_first_name'])."" ,
            "Middle_Initial"=>  "".trim($form_data['Insured_Middle_name'])."" ,
			"DOB"=>  "".date("Y-m-d", strtotime($form_data['Insured_DOB']))."" ,
            "Last_Name1"=>  "".trim($form_data['Insured_Last_name'])."" ,
            "Suffix"=>  "".trim($form_data['Insured_Suffix'])."" ,
            "First_Name_Two"=>  "".trim($form_data['Financial_First_name'])."" ,
            "Last_Name_Two"=>  "".trim($form_data['Financial_Last_name'])."" ,
            "Suffix_Two"=>  "".trim($form_data['Financial_Suffix'])."" ,
			"ZIP_Code"=>  "".trim($form_data['Financial_zipcode'])."" ,
			"City"=>  "".trim($form_data['Financial_City'])."" ,
			"State"=>  "".trim($form_data['Financial_State'])."" ,
			"Home_Address"=>  "".trim($form_data['Financial_Home_address'])."" ,
            "Involved_in_the_daily_operation_of_the_business"=>  "".trim($form_data['is_Involved_daily_operation'])."" ,
            "Designate_Spouse_as_a_Named_Insured"=>  "".trim($form_data['Insured_Designate_Spouse'])."" ,
            "Specify_Commodities_Hauled"=>  "".trim($Specify_Commodities_Hauled)."" ,
            "Are_any_listed_vehicles_used_to_haul_steel"=>  "".trim($form_data['is_vehicles_haul_steel'])."" ,
            "listed_vehicles_or_the_load_require_a_placard"=>  "".trim($form_data['is_vehicles_placard'])."" ,
            "Insured_s_Phone"=>  "".trim($phone)."" ,
            "Mailing_Address"=>  "".trim($form_data['Contact_Insured_Mailing'])."" ,
            "State_Two"=>  "".trim($form_data['Contact_Insured_State'])."" ,
            "ZIP_Code_Two"=>  "".trim($form_data['Contact_Insured_ZIP_code'])."" ,
            "City_Two"=>  "".trim($form_data['Contact_Insured_City'])."", 
            "E_mail_Address"=>  "".trim($form_data['Contact_Insured_email'])."", 
            "Date_Two"=>  "".date("Y-m-d", strtotime($form_data['Financial_dob']))."" ,
            "Yrs_in_Trucking_Industry"=>  "".trim($form_data['Yrs_in_Trucking_Industry'])."" ,
            "Yrs_in_business"=>  "".trim($form_data['Yrs_in_business'])."" ,
            "If_New_Venture_Please_list_previous_industry_emplo"=>  "".trim($form_data['previous_industry_employment'])."" ,
            "List_Filing"=>  "".trim($form_data['List_Filing'])."",
            "Filing_State"=>  "".trim($form_data['List_Filing_state'])."",
            "Business_Name_1"=>  "".trim($form_data['business_name'])."",
            "Business_Name_2"=>  "".trim($form_data['business_name1'])."",
            "EIN"=>  "".trim($form_data['ein'])."",
            "DBA_Partnership_Corporation"=>  "".trim($form_data['have_DBA_partner_cop'])."",
            "DBA_Name_Partner_cop"=>  "".trim($form_data['partner_cop_DBA_NAME']).""
		);
		
			  $Contactdata = '{
			  "data": ['.json_encode($d).']
			}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if (ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}
			else{
				echo 0;
				
			} 
			
	}

	if(ISSET($_POST['delete_voilation_next']) && $_POST['delete_voilation_next']=='success'){
		$contactid = $_POST['contactId'];
		$violation_id = $_POST['violation_id'];
					$data = "";
					$contactdata =  $handleFunctionsObject->deleteviolation($violation_id);
			
				echo $contactdata;
			 
	}
	
	if(ISSET($_POST['vehicles_data_next']) && $_POST['vehicles_data_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
			$data = "";
			$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
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
				$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
				
			}
			
			$d='';
			$Specify_Commodities_Hauled=explode("~",$contactdata['data'][0]['Specify_Commodities_Hauled']);
			foreach($Specify_Commodities_Hauled as $Specify){
				$commoditiesdata=  $handleFunctionsObject->GetContactcommoditeies($_POST['contactId'],$Specify);
				if($commoditiesdata!=0){
				$d.='<div class="col-sm-4">
				<label>'.$commoditiesdata[0]['name'].'</label>
				<input type="number" name="'.$commoditiesdata[0]['name'].'"  value="'.$commoditiesdata[0]['value'].'" min="0">
				</div>';
				}
			}
			
			echo json_encode(array('commodities_data'=>$d));
	}

	if(ISSET($_POST['drivers_data_next']) && $_POST['drivers_data_next']=='success'){
			$contacturl = "Contacts/".$_POST['contactId'];
			$data = "";
			$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
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
				
			}		
			$d= $handleFunctionsObject->businessviolation($_POST['contactId']);
			if($d!=0){
				$i=0;
				foreach($d as $ddd){
					$dd=$ddd['accident_violation'];
				?>
				<tr id='tr_id_<?php echo $i;?>' data-id ='<?php echo $ddd['id'];?>' class='tr_violation'>
				  <td class="td-padding">
				  <select id='select_Accident_<?php echo $i;?>'>
					<option value="AAF" <?php if($dd=='AAF'){echo 'selected';}?>>AAF - At Fault Accident</option>
					<option value="BOT" <?php if($dd=='BOT'){echo 'selected';}?>>BOT - Open Bottle/Container</option>
					<option value="CRD" <?php if($dd=='CRD'){echo 'selected';}?>>CRD - Careless/Improper Op of Vehicle</option>
					<option value="DEQ" <?php if($dd=='DEQ'){echo 'selected';}?>>DEQ - Defective Equipment</option>
					<option value="DEV" <?php if($dd=='DEV'){echo 'selected';}?>>DEV - Disregard Traffic Device/Sign</option>
					<option value="DR" <?php if($dd=='DR'){echo 'selected';}?>>DR  - Drag Racing</option>
					<option value="DWI" <?php if($dd=='DWI'){echo 'selected';}?>>DWI - Driving Under the Influence</option>
					<option value="EQP" <?php if($dd=='EQP'){echo 'selected';}?>>EQP - Equipment Violations</option>
					<option value="FAR" <?php if($dd=='FAR'){echo 'selected';}?>>FAR - False Report to Official/Perjury</option>
					<option value="FEL" <?php if($dd=='FEL'){echo 'selected';}?>>FEL - Auto Theft / Felony</option>
					<option value="FLE" <?php if($dd=='FLE'){echo 'selected';}?>>FLE - Flee/Elude Police</option>
					<option value="FRA" <?php if($dd=='FRA'){echo 'selected';}?>>FRA - Failure to Report Accident</option>
					<option value="FTC" <?php if($dd=='FTC'){echo 'selected';}?>>FTC - Following Too Close</option>
					<option value="FTY" <?php if($dd=='FTY'){echo 'selected';}?>>FTY - Failure to Yield</option>
					<option value="HOM" <?php if($dd=='HOM'){echo 'selected';}?>>HOM - Homicide/Assault w/ Vehicle</option>
					<option value="IBK" <?php if($dd=='IBK'){echo 'selected';}?>>IBK - Improper Backing</option>
					<option value="IP" <?php if($dd=='IP'){echo 'selected';}?>>IP  - Improper Passing</option>
					<option value="IT" <?php if($dd=='IT'){echo 'selected';}?>>IT  - Improper Turn/U-Turn</option>
					<option value="LIC" <?php if($dd=='LIC'){echo 'selected';}?>>LIC - License/Credentials Violation</option>
					<option value="LTS" <?php if($dd=='LTS'){echo 'selected';}?>>LTS - Leaving the Scene</option>
					<option value="MMV" <?php if($dd=='MMV'){echo 'selected';}?>>MMV - Other Minor Moving Violations</option>
					<option value="NAF" <?php if($dd=='NAF'){echo 'selected';}?>>NAF - Not At Fault Accident</option>
					<option value="REF" <?php if($dd=='REF'){echo 'selected';}?>>REF - Refusal to Test</option>
					<option value="RKD" <?php if($dd=='RKD'){echo 'selected';}?>>RKD - Reckless Driving</option>
					<option value="SAF" <?php if($dd=='SAF'){echo 'selected';}?>>SAF - Safety Violation</option>
					<option value="SCH" <?php if($dd=='SCH'){echo 'selected';}?>>SCH - Passing School Bus</option>
					<option value="SPD" <?php if($dd=='SPD'){echo 'selected';}?>>SPD - Speeding</option>
					<option value="SUS" <?php if($dd=='SUS'){echo 'selected';}?>>SUS - Driving w/ Susp/Rev/Canc License</option>
					<option value="WOC" <?php if($dd=='WOC'){echo 'selected';}?>>WOC - Operate w/o Owner's Consent</option>
					<option value="WSR" <?php if($dd=='WSR'){echo 'selected';}?>>WSR - Wrong Side of Road</option>
				 </select>
				</td>
				 <td class="text-center td-padding"> <input type="text" value="<?php echo  date("m/d/Y", strtotime($ddd['date']));?>" placeholder="" id='Accident_date_<?php echo $i;?>' class='datepicker'>				
					</td>
				  <td class='td-padding'><button class='delete_voilation btn' data-id="<?php echo $i;?>" data-contact_id='<?php echo $ddd['id'];?>' type='button'>Delete</button></td>
				</tr>
				
				
			<?php	
			$i++;	
			}
			}else{?>
				<tr id='tr_id_0'>
				  <td class="td-padding">
				  <select id="select_Accident_0">
					<option selected="selected" value="">None</option>
					<option value="AAF">AAF - At Fault Accident</option>
					<option value="BOT">BOT - Open Bottle/Container</option>
					<option value="CRD">CRD - Careless/Improper Op of Vehicle</option>
					<option value="DEQ">DEQ - Defective Equipment</option>
					<option value="DEV">DEV - Disregard Traffic Device/Sign</option>
					<option value="DR">DR  - Drag Racing</option>
					<option value="DWI">DWI - Driving Under the Influence</option>
					<option value="EQP">EQP - Equipment Violations</option>
					<option value="FAR">FAR - False Report to Official/Perjury</option>
					<option value="FEL">FEL - Auto Theft / Felony</option>
					<option value="FLE">FLE - Flee/Elude Police</option>
					<option value="FRA">FRA - Failure to Report Accident</option>
					<option value="FTC">FTC - Following Too Close</option>
					<option value="FTY">FTY - Failure to Yield</option>
					<option value="HOM">HOM - Homicide/Assault w/ Vehicle</option>
					<option value="IBK">IBK - Improper Backing</option>
					<option value="IP">IP  - Improper Passing</option>
					<option value="IT">IT  - Improper Turn/U-Turn</option>
					<option value="LIC">LIC - License/Credentials Violation</option>
					<option value="LTS">LTS - Leaving the Scene</option>
					<option value="MMV">MMV - Other Minor Moving Violations</option>
					<option value="NAF">NAF - Not At Fault Accident</option>
					<option value="REF">REF - Refusal to Test</option>
					<option value="RKD">RKD - Reckless Driving</option>
					<option value="SAF">SAF - Safety Violation</option>
					<option value="SCH">SCH - Passing School Bus</option>
					<option value="SPD">SPD - Speeding</option>
					<option value="SUS">SUS - Driving w/ Susp/Rev/Canc License</option>
					<option value="WOC">WOC - Operate w/o Owner's Consent</option>
					<option value="WSR">WSR - Wrong Side of Road</option>
				 </select>
				</td>
				 <td class="text-center td-padding"> <input type="text" value=" " placeholder="When did it happen?" class="datepicker" id="Accident_date_0">				
					</td>
				  <td class="td-padding"></td>
				</tr>
				
			<?php }
						
					
			
	}
	
	
	if(ISSET($_POST['violations_data_next']) && $_POST['violations_data_next']=='success'){
		 $form_data=json_decode($_POST['voilationsdata']);
		$form_data = json_decode(json_encode($form_data), true);
		/* echo '<pre>';
		print_R($form_data);
		 echo '</pre>'; */
		if($form_data){
			foreach($form_data as $d){
				if(isset($d['Accident_id']) && $d['Accident_id']!=''){
				$d= $handleFunctionsObject->updateviolation($_POST['contactId'],trim($d['Accident_id']),date("Y-m-d", strtotime($d['Accident_date'])),trim($d['Accident']));	
				}elseif(!empty($d['Accident']) && $d['Accident_date']){
				$d= $handleFunctionsObject->insertviolation($_POST['contactId'],trim($d['Accident']),date("Y-m-d", strtotime($d['Accident_date'])));
				}else{
					$d=0;
				}
			}
			
			if($d==1){
				echo json_encode($form_data);
			}else{
				echo 0;
			}
			
		}
		
			
	}
	if(ISSET($_POST['underwriting_data_next']) && $_POST['underwriting_data_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
		
		if($form_data['currently_insured']=='Yes'){
			$What_is_your_Current_Liability_Limit=$form_data['Current_Liability_limit'];
			$What_is_your_Current_Policy_Effective_Date=date("Y-m-d", strtotime($form_data['current_policy_Effective_date']));
			$Current_Policy_Number = $form_data['Current_Policy_Number'];
			$What_is_your_Current_Policy_Expiration_Date=date("Y-m-d", strtotime($form_data['current_policy_Expiration_date']));
			$Has_insured=$form_data['continuous_coverage'];
			if($form_data['who_are_you_insured']=='Not Listed'){
			$Who_are_you_insured_enter=$form_data['Who_are_you_insured_enter'];
			
			}else{
				$Who_are_you_insured_enter='';
				
			}
		}else{
			$What_is_your_Current_Liability_Limit='';
			$What_is_your_Current_Policy_Effective_Date='';
			$Current_Policy_Number='';
			$What_is_your_Current_Policy_Expiration_Date='';
			$Has_insured='';
			$Who_are_you_insured_enter='';
		}
		
		
		$d= array(
		"Proof_of_Prior_Insurance" =>  "".trim($form_data['currently_insured'])."" ,
		"What_is_your_Current_Liability_Limit" =>  "".trim($What_is_your_Current_Liability_Limit)."" ,
		"What_is_your_Current_Policy_Effective_Date" => "".$What_is_your_Current_Policy_Effective_Date."" ,
		"What_is_your_Current_Policy_Number" =>  "".$Current_Policy_Number."" ,
	"What_is_your_Current_Policy_Expiration_Date" => "".$What_is_your_Current_Policy_Expiration_Date."" ,
	"Who_are_you_insured_with" =>  "".$form_data['who_are_you_insured']."" ,
	"Not_Listed_Name" =>  "".$Who_are_you_insured_enter."" ,
	"Has_insured_had_continuous_coverage_for_at_least_o" => "".$Has_insured."" ,
      "Does_the_insured_have_General_Liability_Insurance"=>  "".trim($form_data['Proof_Insurance'])."" ,
            "Number_of_Additional_Insureds"=>  "".trim($form_data['Additional_Insureds'])."" ,
            "Number_of_Waivers_of_Subrogation"=>  "".trim($form_data['Waivers_Subrogation'])."" ,
            "Is_the_customer_required_to_maintain_hours"=>  "".trim($form_data['customer_required_to_maintain_hours'])."" ,
            "Year_current_business_was_established"=>  "".trim($form_data['Year_current_business'])."" ,
            "Are_any_state_or_federal_filings_required"=>  "".trim($form_data['federal_filings_required'])."" ,
            "Do_we_insure_all_commercial_vehicles_the_insured"=>  "".trim($form_data['commercial_vehicles'])."" ,
            "Do_we_insure_all_vehicles_that_the_insured_uses"=>  "".trim($form_data['insured_uses_business'])."" ,
            "Federal"=>  "".trim($form_data['Federal'])."" ,
            "Federal_Cargo_BMC_34"=>  "".trim($form_data['Federal_Cargo'])."" ,
            "How_often_are_MVRs_reviewed"=>  "".trim($form_data['MVRs_reviewed'])."" ,
            "Are_all_vehicles_listed_owned_registered_to_appl"=>  "".trim($form_data['vehicles_listed_owned'])."" ,
            "Any_vehicles_titled_to_an_individual_instead_of_bs"=>  "".trim($form_data['individual_instead_of_business'])."" ,
			 "CA_Authority_Number"=>  "".trim($form_data['CA_Authority_Number'])."" ,
            "Other"=>  "".$form_data['fil_othr_cnt']."", 
            "State_Cargo_Form_H"=>  "".trim($form_data['fil_formh_cnt'])."" ,
			"MCS90"=>  "".trim($form_data['MCS90_val'])."",
			"State_FT"=>  "".trim($form_data['fil_State'])."", 			
            "Details"=>  "".trim($form_data['explanations'])."",
			"State_Filing_Number"=>  "".trim($form_data['State_Filling_Number']).""
			);	
			
			$Contactdata = '{
			  "data": ['.json_encode($d).']
			}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}else{
				echo json_encode($zohoResponse);;
			}
			
			
			
					
	}
	
	if(ISSET($_POST['OperationDescription']) && $_POST['OperationDescription']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
		 
		/* 	print_r($form_data); */
	 
			   $d = array(
            "Radious_0_to_100_miles"=>  "".trim($form_data['percentage_one'])."" ,
            "Radious_101_to_300_miles"=>  "".trim($form_data['percentage_two'])."" ,
            "Radious_301_to_600_miles"=>  "".trim($form_data['percentage_three'])."" ,
            "Radious_600_miles"=>  "".trim($form_data['percentage_four'])."" ,
            "EstimateAverage_Radius"=>  "".trim($form_data['Estimates_one'])."" ,
            "Estimate_Longest_Radius"=>  "".trim($form_data['Estimates_two'])."" ,
            "Estimate_Furthest_City"=>  "".trim($form_data['Estimates_three'])."" ,
            "Common_Percentage"=>  "".trim($form_data['Business_one_name'])."" ,
            "Private_Percentage"=>  "".trim($form_data['Business_Private'])."" ,
            "Other_Percentage"=>  "".trim($form_data['Business_Other'])."" ,
            "Non_Trucking"=>  "".trim($form_data['Non_Trucking'])."" ,
            "household_or_commercial_mover"=>  "".trim($form_data['Operations_radio'])."" 
			); 

			$Contactdata = '{
			  "data": ['.json_encode($d).']
			}';
/* 			echo "<pre>";
			print_r($Contactdata);
		echo "</pre>"; */
			
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}else{
				echo 0;
			} 
	}
	
	
		if(ISSET($_POST['InsuranceHistory']) && $_POST['InsuranceHistory']=='success'){
		/* @$response=$handleFunctionsObject->getDataFromSafer($_POST['searchedNumber']);
		if($response==0){
			echo 0;	
		}else{
			/* echo '<pre>';
			print_r($response);
			echo '</pre>'; 
			$contacturl = "Contacts/".$_POST['contactId'];
			
			 $Contactdata = '{
			"data": [{
            "USDOT_associated_with_the_insured_s_business":  "'.$response['usdot_number'].'" 
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			echo json_encode($response);
			
		} */
		echo json_encode($_POST);
	}
	
	if(ISSET($_POST['Coverage_Limit_Information']) && $_POST['Coverage_Limit_Information']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
		/*  echo '<pre>';
			print_r($form_data);
		echo '<pre>'; */
			
			if($form_data['know_the_limit_required_motor']=='No'){
				$know_the_limit_required_motor='';
			}else{
				if($form_data['enter_the_limit_required_motor']=='other'){
				$know_the_limit_required_motor=$form_data['enter_the_limit_required_motor_other'];
				}else{
				$know_the_limit_required_motor='';
				}
				
			}
			
		
			   $d = array(
			"Auto_Liability"=> "".trim($form_data['Auto_Liability'])."" ,
            "AL_Deductible"=> "".trim($form_data['AL_Deductible_text'])."" ,
            "UM_UIM1"=> "".trim($form_data['UM_UIM_value'])."" ,
            "UM_PD"=> "".trim($form_data['UM_Pd_value'])."" ,
            "Medical_Payment"=> "".trim($form_data['Medical_Payments'])."" ,
            "PIP"=> "".trim($form_data['PIP'])."",
            "Rejected"=> "".trim($form_data['Motor_Truck_Rejected'])."",
            "Do_you_need_Trailer_Interchange_coverage"=> "".trim($form_data['Trailer_Interchange_coverage'])."",
            "Do_you_need_a_Limit_of_100_000_for_the_Motor_Truc"=> "".trim($form_data['need_Limit_Motor_Truck_CArgo'])."",
            "Motor_Truck_Cargo_limit_value"=> "".trim($form_data['need_Limit_Motor_Truck_CArgo_other'])."",
            "Limit_For_Interchange_coverage"=> "".trim($form_data['enter_the_limit_required'])."",
            "do_you_know_the_limit_required"=> "".trim($form_data['know_the_limit_required'])."",
            "Do_you_need_1_000_000_Combined_Single_Limit_for_A"=> "".trim($form_data['Combined_Single_Limit'])."",
            "Non_trucks"=> "".trim($form_data['select_Non_trucks'])."",
            "Do_you_know_the_Motor_Cargo_limit_required"=> "".trim($form_data['know_the_limit_required_motor'])."",
            "Motor_Truck_Cargo_Limit"=> "".$form_data['enter_the_limit_required_motor']."",
            "Motor_Truck_Cargo_Limit_other" => "".$know_the_limit_required_motor.""
			
			);
			$Contactdata = '{
			  "data": ['.json_encode($d).']
			}';
			
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}else{
				echo 0;
			} 
	}	
	if(ISSET($_POST['Commodities_next']) && $_POST['Commodities_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		
		parse_str($_POST['dataform'], $form_data);
		
		 foreach($form_data as $key => $comm){
			if($key!='' && $comm!='' ){
			  $new_string = str_replace('_', ' ', $key);
				  $databaseRes =  $handleFunctionsObject->insertcommoditiesconatctdata($_POST['contactId'],$new_string,$comm);
			}
		}
		echo json_encode($databaseRes);	 
	}	
	if(ISSET($_POST['CargoRelated_next']) && $_POST['CargoRelated_next']=='success'){
		/* @$response=$handleFunctionsObject->getDataFromSafer($_POST['searchedNumber']);
		if($response==0){
			echo 0;	
		}else{
			/* echo '<pre>';
			print_r($response);
			echo '</pre>'; 
			$contacturl = "Contacts/".$_POST['contactId'];
			
			 $Contactdata = '{
			"data": [{
            "USDOT_associated_with_the_insured_s_business":  "'.$response['usdot_number'].'" 
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			echo json_encode($response);
			
		} */
		echo json_encode($_POST);
	}

		if(ISSET($_POST['PDFData_next']) && $_POST['PDFData_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		parse_str($_POST['dataform'], $form_data);
		/*  echo '<pre>';
			print_r($form_data);
		echo '<pre>'; 
		/* "policy":  "'.$form_data['Policy_Surety_Number'].'" ,
		*/ 
			$d = array(
           "Form"=>  "".trim($form_data['Form'])."" ,
            "Type"=>  "".trim($form_data['Type'])."" ,
            "Posted_Date"=>  "".trim(date("Y-m-d", strtotime($form_data['Posted'])))."" ,  
            "Coverage_From"=>  "".trim($form_data['Coverage'])."" ,
            "To"=>  "".trim($form_data['To'])."" ,
            "Cancellation_Date"=>  "".trim($form_data['Cancellation'])."" ,
            "Effective_Date"=>  "".trim($form_data['Effective'])."" ,
			"policy"=>  "".trim($form_data['Policy_Surety_Number'])."" ,
            "Insurance_Carrier"=>  "".trim($form_data['Insurence'])."" 
           );
			$Contactdata = '{
			  "data": ['.json_encode($d).']
			}';			
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}else{
				echo 0;
			} 
	}
	
	if(ISSET($_POST['CargoFinal_next']) && $_POST['CargoFinal_next']=='success'){
		/* @$response=$handleFunctionsObject->getDataFromSafer($_POST['searchedNumber']);
		if($response==0){
			echo 0;	
		}else{
			/* echo '<pre>';
			print_r($response);
			echo '</pre>'; 
			$contacturl = "Contacts/".$_POST['contactId'];
			
			 $Contactdata = '{
			"data": [{
            "USDOT_associated_with_the_insured_s_business":  "'.$response['usdot_number'].'" 
            
			}]}'; 
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			echo json_encode($response);
			
		} */
		echo json_encode($_POST);
	}


	
	if(ISSET($_POST['new_drive_add']) && $_POST['new_drive_add']=='success'){
		parse_str($_POST['dataform'], $form_data);
		$contacturl = "Contacts/".$_POST['contactId'];
		 $data = "";
		$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
		$driversData = $contactdata['data'][0]['Drivers1'];
		$drivername = $form_data['new_driver_first']. ' '.$form_data['new_driver_middle'].' '.$form_data['new_driver_last'];
		$driverDOb=date("Y-m-d", strtotime($form_data['new_driver_dob']));
		$merital_status=$form_data['new_driver_marital_status'];
		$new_driver_Exp=$form_data['new_driver_Exp'];
		$Date_of_Hire=date("Y-m-d", strtotime($form_data['new_driver_hire_date']));
		$points=$form_data['new_driver_points'];
		$Owner_Driver=$form_data['add_driver_Owner'];
		$add_driver_Backup=$form_data['add_driver_Backup'];
		$age = (date('Y') - date('Y',strtotime($driverDOb)));
		$DOB_Age_MaritalStatus_Points_LicenceNo=$driverDOb.','.$age .','.$merital_status.','.$points.','.$form_data['new_driver_licence'];
		$new_array=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo,"SR22"=>$form_data['new_driver_SR22'],"Name1"=>$drivername,"Back_up_Driver"=>"".$add_driver_Backup."","Owner_Driver"=>$Owner_Driver,"License_State"=>$form_data['new_driver_license_state'],"Experience_Years"=>"".$new_driver_Exp."","Hire_Date"=>"".$Date_of_Hire.""
		) ;
		$driversData[]=$new_array;
			$dd=json_encode($driversData);
			  $Contactdata = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token); 
			
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
					$id=$zohoResponse['data'][0]['details']['id'];
				$new_array['driverId'] = $id;
			echo json_encode($new_array);
			}else{
				echo 0;
			}
			
			
	}
	
	if(ISSET($_POST['update_driver']) && $_POST['update_driver']=='success'){
		parse_str($_POST['dataform'], $form_data);
		$contacturl = "Contacts/".$_POST['contactId'];
		 $data = "";
		$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
		$driversData = $contactdata['data'][0]['Drivers1'];
		$key = array_search($form_data['id_driver_to_update'], array_column($driversData, 'id'));

		 $drivername = $form_data['edit_driver_first']. ' '.$form_data['edit_driver_middle'].' '.$form_data['edit_driver_last'];
		$driverDOb=date("Y-m-d", strtotime($form_data['edit_driver_dob']));
		$merital_status=$form_data['edit_driver_marital_status'];
		$new_driver_Exp=$form_data['edit_driver_Exp'];
		$Date_of_Hire=date("Y-m-d", strtotime($form_data['edit_driver_hire_date']));
		$points=$form_data['edit_driver_points'];
		$Owner_Driver=$form_data['edit_driver_Owner'];
		$add_driver_Backup=$form_data['edit_driver_Backup'];
		$age = (date('Y') - date('Y',strtotime($driverDOb)));
		$DOB_Age_MaritalStatus_Points_LicenceNo=$driverDOb.','.$age .','.$merital_status.','.$points.','.$form_data['edit_driver_licence'];
		$new_array=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo,"SR22"=>$form_data['edit_driver_SR22'],"Name1"=>$drivername,"Back_up_Driver"=>"".$add_driver_Backup."","Owner_Driver"=>$Owner_Driver,"License_State"=>$form_data['edit_driver_license_state'],"Experience_Years"=>"".$new_driver_Exp."","Hire_Date"=>"".$Date_of_Hire.""
		) ;
		$driversData[0]=$new_array;
			$dd=json_encode($driversData);
			  $Contactdata = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token); 
			
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				$contacturl = "Contacts/".$_POST['contactId'];
				$data = "";
				$contactdata =  $handleFunctionsObject->zoho_curl($contacturl,"GET",$data,$old_access_token);
			echo json_encode($contactdata['data'][0]);
			}
			else{
				echo 0;
			}
			
			
			
	}
	
	if(ISSET($_POST['new_vehicle_add']) && $_POST['new_vehicle_add']=='success'){
		parse_str($_POST['dataform'], $form_data);
		$contactid = $_POST['contactId'];
		 	$contactdata =  $handleFunctionsObject->insertVehicle($contactid,$form_data);
			if($contactdata!=0){
				echo json_encode($contactdata);
			}else{
				echo json_encode(array());
			}
		
			
			
			
			
	}







	if(ISSET($_POST['get_make']) && $_POST['get_make']=='success'){
		if($_POST['vehicle_subcat']==''){
		$response_vehicles_Make=$handleFunctionsObject->VehicleMake($_POST['vehicle_cat']);
		
		if($response_vehicles_Make!=0){ ?>
			<option value=""></option>
						<?php					
							foreach($response_vehicles_Make as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['make'];?>"><?php echo $responsedata['make'];?></option>
						<?php }
						?>
					
		<?php }else{
			
							
				echo $response_vehicles_Make;
						
					
		 }
		}else{
			$response_vehicles_subMake=$handleFunctionsObject->VehiclesubMake($_POST['vehicle_subcat']);
		
		if($response_vehicles_subMake!=0){ ?>
			<option value=""></option>
						<?php					
							foreach($response_vehicles_subMake as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['make'];?>"><?php echo $responsedata['make'];?></option>
						<?php }
						?>
					
		<?php }else{
			
							
				echo $response_vehicles_subMake;
						
					
		 }
			
			
		}
	}
	if(ISSET($_POST['get_vehicle_category']) && $_POST['get_vehicle_category']=='success'){
		$response_vehicles_cat=$handleFunctionsObject->VehicleCategory($_POST['vehicle_type']);
		if($response_vehicles_cat!=0){?>
			<option value=""></option>
						<?php 					
							foreach($response_vehicles_cat as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['category'];?>"><?php echo $responsedata['category'];?></option>
						<?php }
						?>
					
			<?php 
		}else{?>
		<option value="N/A">N/A</option>
			
		<?php }
	}
	
	if(ISSET($_POST['get_year']) && $_POST['get_year']=='success'){
		$category=$_POST['vehicle_cat'];
		
		$response_vehicles_year=$handleFunctionsObject->Vehicleyears($category);
		if($response_vehicles_year!=0){?>
			<option value=""></option>
						<?php 					
							foreach($response_vehicles_year as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['year'];?>" 
							<?php if(ISSET($_POST['vehicle_year']) && $_POST['vehicle_year']!='' && $_POST['vehicle_year']==$responsedata['id']){echo 'selected';} ?>><?php echo $responsedata['year'];?></option>
						<?php }
						?>
					
			<?php 
		}else{?>
		<option value="N/A">N/A</option>
			
		<?php }
	}
	
	if(ISSET($_POST['get_vehicle_model']) && $_POST['get_vehicle_model']=='success'){
		$vehicle_make=$_POST['vehicle_make'];
		$year = $_POST['vehicle_year'];
		$vehicle_cat=$_POST['vehicle_cat'];
		$response_vehicles_model=$handleFunctionsObject->VehicleModel($vehicle_cat,$year,$vehicle_make);
		if($response_vehicles_model!=0){?>
			<option value=""></option>
						<?php 					
							foreach($response_vehicles_model as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['model_name'];?>"><?php echo $responsedata['model_name'];?></option>
						<?php }
						?>
					
			<?php 
		}else{
		echo $response_vehicles_model;
			
		 }
	}
	
	if(ISSET($_POST['get_vehicle_body']) && $_POST['get_vehicle_body']=='success'){
		$vehicle_make=$_POST['vehicle_make'];
		$year = $_POST['vehicle_year'];
		$vehicle_cat=$_POST['vehicle_cat'];
		$vehicle_model=$_POST['vehicle_model'];
		$response_VehicleBodyStyle=$handleFunctionsObject->VehicleBodyStyle($vehicle_cat,$year,$vehicle_make,$vehicle_model);
		if($response_VehicleBodyStyle!=0){?>
			<option value=""></option>
						<?php 					
							foreach($response_VehicleBodyStyle as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['body_style'];?>"><?php echo $responsedata['body_style'];?></option>
						<?php }
						?>
					
			<?php 
		}else{?>
		 <option value="N/A">N/A</option>
			
		 <?php }
	}
	
	
	
	
	
	
	
	
	if(ISSET($_POST['get_business_sub']) && $_POST['get_business_sub']=='success'){
		$businessSubCategories=$handleFunctionsObject->businessSubCategories($_POST['business_cat']);
		
		if($businessSubCategories!=0){ ?>
			<option value=""></option>
						<?php					
							foreach($businessSubCategories as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['sub_category'];?>"><?php echo $responsedata['sub_category'];?></option>
						<?php }
						?>
					
		<?php }else{		
				echo $businessSubCategories;
		 }
	} 
	if(ISSET($_POST['get_vehicle_sub']) && $_POST['get_vehicle_sub']=='success'){
		$VehicleSubCategory=$handleFunctionsObject->VehicleSubCategory($_POST['vehicle_cat']);
		
		if($VehicleSubCategory!=0){ ?>
		
			<option value=""></option>
						<?php					
							foreach($VehicleSubCategory as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['sub_category'];?>"><?php echo $responsedata['sub_category'];?></option>
						<?php }
						?>
					
		<?php }else{		
				echo $VehicleSubCategory;
		 }
	} 



if(ISSET($_POST['update_vehicle']) && $_POST['update_vehicle']=='success'){
		parse_str($_POST['dataform'], $form_data);
		$contactid = $_POST['contactId'];
		 	$contactdata =  $handleFunctionsObject->updateVehicle($contactid,$form_data);
			if($contactdata!=0){
				echo json_encode($contactdata);
			}else{
				echo json_encode(array());
			}
			
	}

	if(ISSET($_POST['business_request']) && $_POST['business_request']=='success'){
		$businessType = ucfirst($_POST['businessType']);
		$response = $handleFunctionsObject->business_search($businessType);
		if(!empty($response)){
			$html = '';
			$html .='<ul>';
			foreach($response as $value){
				$html .='<li data-id="'.$value['description'].'" class="Business_types_select">'.$value['category'].'</li>';
			}
			$html .='</ul>';
			echo $html;
		}else{
			$html = '';
			$html .='<ul>';
			$html .='<li>No Data found</li>';
			$html .='</ul>';
			echo $html;
	}
} 
	if(ISSET($_POST['get_vehicle']) && $_POST['get_vehicle']=='success'){
		
		$contactid = $_POST['contactId'];
		$vehicleid = $_POST['vehicleid'];
		 	$contactdata =  $handleFunctionsObject->GetContactSingeVehicles($contactid,$vehicleid);
			if($contactdata!=0){
				echo json_encode($contactdata);
			}else{
				echo json_encode(array());
			}
			
	}
	
	if(ISSET($_POST['get_contact_last_vehicle']) && $_POST['get_contact_last_vehicle']=='success'){
		
		$contactid = $_POST['contactId'];
		
		 	$contactdata =  $handleFunctionsObject->GetContactlastVehicles($contactid);
			if($contactdata!=0){
				echo json_encode($contactdata);
			}else{
				echo json_encode(array());
			}
			
	}
	
	
	if(ISSET($_POST['thankyou_next']) && $_POST['thankyou_next']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		$alternate_phone_number = $_POST['alternate_phone_number'];
		
		/*  echo '<pre>';
			print_r($form_data);
		echo '<pre>'; 
		/* "policy":  "'.$form_data['Policy_Surety_Number'].'" ,
		*/ 
			$d = array(
           "Alternate_Phone"=>  "".$alternate_phone_number.""
           
           );
			$Contactdata = '{
			  "data": ['.json_encode($d).']
			}';			
			
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
			}else{
				echo json_encode($zohoResponse);
			} 
	}
	
	
	
	if(ISSET($_POST['is_owner_driver_add']) && $_POST['is_owner_driver_add']=='success'){
		$contacturl = "Contacts/".$_POST['contactId'];
		$data = "";
		$drivername = $_POST['contact_first_name']. ' '.$_POST['contact_last_name'];
		$new_array=array(
		"Name1"=>$drivername
		) ;
		$driversData[]=$new_array;
			$dd=json_encode($driversData);
			  $Contactdata = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token); 
			
			if(ISSET($zohoResponse['code']) && $zohoResponse['code'] == "INVALID_TOKEN"){
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
				@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
				if($zohoResponse['data'][0]['code'] == "SUCCESS"){
				echo json_encode($zohoResponse);
				}
			}elseif(($zohoResponse) && $zohoResponse['data'][0]['code'] == "SUCCESS"){
					$id=$zohoResponse['data'][0]['details']['id'];
				$new_array['driverId'] = $id;
			echo json_encode($new_array);
			}else{
				echo 0;
			}
	}

<?php
$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
$contact_id=$_GET['contact_id'];
$contact_id;
$phone_number;
$phone_number=$_GET['phone'];



if(!empty($phone_number)){			
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
		$url = "Contacts/$contact_id";
		$data = "";
$check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);		 
 $id=$check_token_valid['data'][0];
 $contact_name=$check_token_valid['data'][0]['First_Name_Two'];
 $first_name=$check_token_valid['data'][0]['First_Name'];
 $last_name=$check_token_valid['data'][0]['Last_Name'];
 $effective_date=$check_token_valid['data'][0]['Policy_Effective_Date'];
 $garaging_address=$check_token_valid['data'][0]['Home_Address'];
 $USDOT_Assigned_to=$check_token_valid['data'][0]['USDOT_associated_with_the_insured_s_business'];
 $garaging_City=$check_token_valid['data'][0]['City'];
 $garaging_State=$check_token_valid['data'][0]['State'];
 $garaging_ZIP_Code=$check_token_valid['data'][0]['ZIP_Code'];
 $Yrs_in_business=$check_token_valid['data'][0]['Yrs_in_business'];
 $Mailing_Address=$check_token_valid['data'][0]['Mailing_Address'];
 $City_Two=$check_token_valid['data'][0]['City_Two'];
 $State_Two=$check_token_valid['data'][0]['State_Two'];
 $ZIP_Code_Two=$check_token_valid['data'][0]['ZIP_Code_Two'];
 $E_mail_Address=$check_token_valid['data'][0]['E_mail_Address'];
 $Radious_0_50_miles=$check_token_valid['data'][0]['Radious_0_50_miles'];
 $Radious_50_200_miles=$check_token_valid['data'][0]['Radious_50_200_miles'];
 $Radious_400_miles=$check_token_valid['data'][0]['Radious_200_miles'];
 $Radious_600_miles=$check_token_valid['data'][0]['Radious_600_miles'];

 $count=count($check_token_valid['data'][0]['Drivers1']);
 "exit";

 $drivername=$check_token_valid['data'][0]['Drivers1'][0]['Name1'];
$DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['Drivers1'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo); 

 $DOB=$str_arr[0]; 

 $Age=$str_arr[1]; 

 $MaritalStatus=$str_arr[2]; 

 $Points=$str_arr[3]; 

 $LicenceNo=$str_arr[4];

 $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
$Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];
$License_State=$check_token_valid['data'][0]['Drivers1'][0]['License_State'];
$Owner_Driver=$check_token_valid['data'][0]['Drivers1'][0]['Owner_Driver'];

// $str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo);  
// echo $DOB=$str_arr[0]; 
// echo"<br>";
// echo $Age=$str_arr[1]; 
// echo"<br>";
// echo $MaritalStatus=$str_arr[2]; 
// echo"<br>";
// echo $Points=$str_arr[3]; 
// echo"<br>";
// echo $LicenceNo=$str_arr[4]; 

// echo $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
// echo $Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];


// New [1] driver data 
 $driver_Name11=$check_token_valid['data'][0]['Drivers1'][1]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo1=$check_token_valid['data'][0]['Drivers1'][1]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr1 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo1);  
 $DOB1=$str_arr1[0]; 

 $Age1=$str_arr1[1]; 

 $MaritalStatus1=$str_arr1[2]; 

 $Points1=$str_arr1[3]; 

 $LicenceNo1=$str_arr1[4]; 

 $Experience_Years1=$check_token_valid['data'][0]['Drivers1'][1]['Experience_Years'];	
 $License_State1=$check_token_valid['data'][0]['Drivers1'][1]['License_State'];	
 $Hire_Date1=$check_token_valid['data'][0]['Drivers1'][1]['Hire_Date'];
 $Owner_Driver1=$check_token_valid['data'][0]['Drivers1'][1]['Owner_Driver'];
// New [2] driver data 
 $driver_Name12=$check_token_valid['data'][0]['Drivers1'][2]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo2=$check_token_valid['data'][0]['Drivers1'][2]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr2 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo2);  
 $DOB2=$str_arr2[0]; 

 $Age2=$str_arr2[1]; 

 $MaritalStatus2=$str_arr2[2]; 

 $Points2=$str_arr2[3]; 

 $LicenceNo2=$str_arr2[4]; 

 $Experience_Years2=$check_token_valid['data'][0]['Drivers1'][2]['Experience_Years'];	
 $Hire_Date2=$check_token_valid['data'][0]['Drivers1'][2]['Hire_Date'];	
 $License_State2=$check_token_valid['data'][0]['Drivers1'][2]['License_State'];
 $Owner_Driver2=$check_token_valid['data'][0]['Drivers1'][2]['Owner_Driver'];

// New [3] driver data 
 $driver_Name13=$check_token_valid['data'][0]['Drivers1'][3]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo3=$check_token_valid['data'][0]['Drivers1'][3]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr3 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo3);  
 $DOB3=$str_arr3[0]; 

 $Age3=$str_arr3[1]; 

 $MaritalStatus3=$str_arr3[2]; 

 $Points3=$str_arr3[3]; 

 $LicenceNo3=$str_arr3[4]; 

 $Experience_Years3=$check_token_valid['data'][0]['Drivers1'][3]['Experience_Years'];	
 $Hire_Date3=$check_token_valid['data'][0]['Drivers1'][3]['Hire_Date'];
 $License_State3=$check_token_valid['data'][0]['Drivers1'][3]['License_State'];	
 $Owner_Driver3=$check_token_valid['data'][0]['Drivers1'][3]['Owner_Driver'];	
// New [4] driver data 
 $driver_Name14=$check_token_valid['data'][0]['Drivers1'][4]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo4=$check_token_valid['data'][0]['Drivers1'][4]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr4= preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo4);  
 $DOB4=$str_arr4[0]; 

 $Age4=$str_arr4[1]; 

 $MaritalStatus4=$str_arr4[2]; 

 $Points4=$str_arr4[3]; 

 $LicenceNo4=$str_arr4[4]; 

 $Experience_Years4=$check_token_valid['data'][0]['Drivers1'][4]['Experience_Years'];	
 $Hire_Date4=$check_token_valid['data'][0]['Drivers1'][4]['Hire_Date'];	
$License_State4=$check_token_valid['data'][0]['Drivers1'][4]['License_State'];
$Owner_Driver4=$check_token_valid['data'][0]['Drivers1'][4]['Owner_Driver'];
// New [5] driver data 
 $driver_Name15=$check_token_valid['data'][0]['Drivers1'][5]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo5=$check_token_valid['data'][0]['Drivers1'][5]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr5= preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo5);  
 $DOB5=$str_arr5[0]; 

 $Age5=$str_arr5[1]; 

 $MaritalStatus5=$str_arr5[2]; 

 $Points5=$str_arr4[3]; 

 $LicenceNo5=$str_arr5[4]; 

 $Experience_Years5=$check_token_valid['data'][0]['Drivers1'][5]['Experience_Years'];	
 $Hire_Date5=$check_token_valid['data'][0]['Drivers1'][5]['Hire_Date'];	
$License_State5=$check_token_valid['data'][0]['Drivers1'][5]['License_State'];
}
else{



	
	

	 $url = "Contacts/$contact_id";
	 $data = "";
	 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
 $contact_id=$check_token_valid['data'][0];
 $first_name=$check_token_valid['data'][0]['First_Name'];
 $last_name=$check_token_valid['data'][0]['Last_Name'];
 $effective_date=$check_token_valid['data'][0]['Policy_Effective_Date'];
 $garaging_address=$check_token_valid['data'][0]['Home_Address'];
 $USDOT_Assigned_to=$check_token_valid['data'][0]['USDOT_Assigned_to'];
 $garaging_City=$check_token_valid['data'][0]['City'];
 $garaging_State=$check_token_valid['data'][0]['State'];
 $garaging_ZIP_Code=$check_token_valid['data'][0]['ZIP_Code'];
 $Yrs_in_business=$check_token_valid['data'][0]['Yrs_in_business'];
 $Mailing_Address=$check_token_valid['data'][0]['Mailing_Address'];
 $City_Two=$check_token_valid['data'][0]['City_Two'];
 $State_Two=$check_token_valid['data'][0]['State_Two'];
 $ZIP_Code_Two=$check_token_valid['data'][0]['ZIP_Code_Two'];
 $E_mail_Address=$check_token_valid['data'][0]['E_mail_Address'];
 $Radious_0_50_miles=$check_token_valid['data'][0]['Radious_0_50_miles'];
 $Radious_50_200_miles=$check_token_valid['data'][0]['Radious_50_200_miles'];
 $Radious_400_miles=$check_token_valid['data'][0]['Radious_200_miles'];
 $Radious_600_miles=$check_token_valid['data'][0]['Radious_600_miles'];	
//Number [0] driver data 
// echo $driver_Name1=$check_token_valid['data'][0]['Drivers1'][0]['Name1'];
// echo $DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['Drivers1'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];

 $count=count($check_token_valid['data'][0]['Drivers1']);
 "start";
for($i = 0; $i<$count; $i++){
 $drivername=$check_token_valid['data'][0]['Drivers1'][0]['Name1'];
$DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['Drivers1'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo); 

 $DOB=$str_arr[0]; 

 $Age=$str_arr[1]; 

 $MaritalStatus=$str_arr[2]; 

 $Points=$str_arr[3]; 

 $LicenceNo=$str_arr[4];

 $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
$Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];
$License_State=$check_token_valid['data'][0]['Drivers1'][0]['License_State'];
$Owner_Driver=$check_token_valid['data'][0]['Drivers1'][0]['Owner_Driver'];
}
// New [1] driver data 
 $driver_Name11=$check_token_valid['data'][0]['Drivers1'][1]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo1=$check_token_valid['data'][0]['Drivers1'][1]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr1 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo1);  
 $DOB1=$str_arr1[0]; 

 $Age1=$str_arr1[1]; 

 $MaritalStatus1=$str_arr1[2]; 

 $Points1=$str_arr1[3]; 

 $LicenceNo1=$str_arr1[4]; 

 $Experience_Years1=$check_token_valid['data'][0]['Drivers1'][1]['Experience_Years'];	
 $License_State1=$check_token_valid['data'][0]['Drivers1'][1]['License_State'];	
 $Hire_Date1=$check_token_valid['data'][0]['Drivers1'][1]['Hire_Date'];
 $Owner_Driver1=$check_token_valid['data'][0]['Drivers1'][1]['Owner_Driver'];
// New [2] driver data 
 $driver_Name12=$check_token_valid['data'][0]['Drivers1'][2]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo2=$check_token_valid['data'][0]['Drivers1'][2]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr2 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo2);  
 $DOB2=$str_arr2[0]; 

 $Age2=$str_arr2[1]; 

 $MaritalStatus2=$str_arr2[2]; 

 $Points2=$str_arr2[3]; 

 $LicenceNo2=$str_arr2[4]; 

 $Experience_Years2=$check_token_valid['data'][0]['Drivers1'][2]['Experience_Years'];	
 $Hire_Date2=$check_token_valid['data'][0]['Drivers1'][2]['Hire_Date'];	
 $License_State2=$check_token_valid['data'][0]['Drivers1'][2]['License_State'];
 $Owner_Driver2=$check_token_valid['data'][0]['Drivers1'][2]['Owner_Driver'];
// New [3] driver data 
 $driver_Name13=$check_token_valid['data'][0]['Drivers1'][3]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo3=$check_token_valid['data'][0]['Drivers1'][3]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr3 = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo3);  
 $DOB3=$str_arr3[0]; 

 $Age3=$str_arr3[1]; 

 $MaritalStatus3=$str_arr3[2]; 

 $Points3=$str_arr3[3]; 

 $LicenceNo3=$str_arr3[4]; 

 $Experience_Years3=$check_token_valid['data'][0]['Drivers1'][3]['Experience_Years'];	
 $Hire_Date3=$check_token_valid['data'][0]['Drivers1'][3]['Hire_Date'];
 $License_State3=$check_token_valid['data'][0]['Drivers1'][3]['License_State'];	
 $Owner_Driver3=$check_token_valid['data'][0]['Drivers1'][3]['Owner_Driver'];
// New [4] driver data 
 $driver_Name14=$check_token_valid['data'][0]['Drivers1'][4]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo4=$check_token_valid['data'][0]['Drivers1'][4]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr4= preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo4);  
 $DOB4=$str_arr4[0]; 

 $Age4=$str_arr4[1]; 

 $MaritalStatus4=$str_arr4[2]; 

 $Points4=$str_arr4[3]; 

 $LicenceNo4=$str_arr4[4]; 

 $Experience_Years4=$check_token_valid['data'][0]['Drivers1'][4]['Experience_Years'];	
 $Hire_Date4=$check_token_valid['data'][0]['Drivers1'][4]['Hire_Date'];	
$License_State4=$check_token_valid['data'][0]['Drivers1'][4]['License_State'];
$Owner_Driver4=$check_token_valid['data'][0]['Drivers1'][4]['Owner_Driver'];
// New [5] driver data 
 $driver_Name15=$check_token_valid['data'][0]['Drivers1'][5]['Name1'];
 $DOB_Age_MaritalStatus_Points_LicenceNo5=$check_token_valid['data'][0]['Drivers1'][5]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr5= preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo5);  
 $DOB5=$str_arr5[0]; 

 $Age5=$str_arr5[1]; 

 $MaritalStatus5=$str_arr5[2]; 

 $Points5=$str_arr4[3]; 

 $LicenceNo5=$str_arr5[4]; 

 $Experience_Years5=$check_token_valid['data'][0]['Drivers1'][5]['Experience_Years'];	
 $Hire_Date5=$check_token_valid['data'][0]['Drivers1'][5]['Hire_Date'];	
$License_State5=$check_token_valid['data'][0]['Drivers1'][5]['License_State'];
// $str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo);  
// echo $DOB=$str_arr[0]; 
// echo"<br>";
// echo $Age=$str_arr[1]; 
// echo"<br>";
// echo $MaritalStatus=$str_arr[2]; 
// echo"<br>";
// echo $Points=$str_arr[3]; 
// echo"<br>";
// echo $LicenceNo=$str_arr[4]; 

// echo $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
// echo $Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];

}

	
	

$query3 = "SELECT * FROM public.contact_vehicles where contact_id='".$_GET['contact_id']."' AND vehicle_type='Trailer'  ORDER BY id";
$result3 = pg_query($query3);
$row9 = pg_fetch_assoc($result3);

	while ($row3 = pg_fetch_assoc($result3)) {
 if($row3['vehicle_type'] == 'Trailer'){
	 $arrid[]=$row3['id'];
	 $arrvin[]=$row3['vin'];
	 $arryear[]=$row3['year'];
	 $arrmake[]=$row3['make'];
	 $arrvalue[]=$row3['value'];
 }
}

 $row9['id'];
 $arrid[0];
$arrid[1];
$arrid[2];
$arrid[3];
 $row9['vin'];
 $arrvin[0];
 $arrvin[1];
 $arrvin[2];
 $arrvin[3];
 $row9['year'];
 $arryear[0];
 $arryear[1];
 $arryear[2];
 $arryear[3];
$row9['make'];
$arrmake[0];
$arrmake[1];
$arrmake[2];
$arrmake[3];
$row9['value'];
$arrvalue[0];
$arrvalue[1];
$arrvalue[2];
$arrvalue[3];

$query5 = "SELECT * FROM public.contact_vehicles where contact_id='".$_GET['contact_id']."' AND vehicle_type !='Trailer' ORDER BY id";
$res5 = pg_query($query5);
$row6 = pg_fetch_assoc($res5);

	while ($row5 = pg_fetch_assoc($res5)) {
 if($row5['vehicle_type'] !== 'Trailer'){
	 $arrayid[]=$row5['id'];
	 $arrayvin[]=$row5['vin'];
	 $arrayyear[]=$row5['year'];
	 $arraymake[]=$row5['make'];
	 $arrayvalue[]=$row5['value'];
 }
}

 $row6['id'];
 $arrayid[0];
 $arrayid[1];
 $arrayid[2];
 $arrayid[3];

 $row6['vin'];
 $arrayvin[0];
 $arrayvin[1];
 $arrayvin[2];
 $arrayvin[3];
 $row6['year'];
 $arrayyear[0];
 $arrayyear[1];
 $arrayyear[2];
 $arrayyear[3];
 $row6['make'];
 $arraymake[0];
 $arraymake[1];
 $arraymake[2];
 $arraymake[3];
 $row6['value'];
 $arrayvalue[0];
 $arrayvalue[1];
 $arrayvalue[2];
 $arrayvalue[3];
 
$query = "SELECT * FROM public.contact_commodities where contact_id='".$_GET['contact_id']."' ORDER BY id";
$result = pg_query($query);
$row4 = pg_fetch_assoc($result);
$rows = pg_num_rows($result);
if($rows>=1){
	while ($row = pg_fetch_assoc($result)) { 
	 $array_id[]=$row['id'];
	 $array_name[]=$row['name'];
	 $array_value[]=$row['value'];
	 $max_value[]=$row['max_value'];
	 $average_value[]=$row['average_value'];

		 
	}
}
	 $row4['id'];
	 $array_id[0];
	 $array_id[1];
	 $array_id[2];
	 $array_id[3];
	
	 $row4['name'];
	 $array_name[0];
	 $array_name[1];
	 $array_name[2];
	 $array_name[3];	
	 $row4['value'];
	 $array_value[0];
	 $array_value[1];
	 $array_value[2];
	 $array_value[3];		

	 $row4['max_value'];
	 $max_value[0];
	 $max_value[1];
	 $max_value[2];
	 $max_value[3];		
	 $row4['average_value'];
	 $average_value[0];
	 $average_value[1];
	 $average_value[2];
	 $average_value[3];		
	
$query22 = "SELECT * FROM public.operation_history where contact_id='".$_GET['contact_id']."' ORDER BY id";
$result22 = pg_query($query22);
$rows22 = pg_num_rows($result22);
if($rows22>=1){
	while ($row22 = pg_fetch_assoc($result22)) {
	  $array3_id[]=$row22['id'];
	  $array3_units[]=$row22['of_power_units'];
	  $array3_miles[]=$row22['total_miles'];
	  $array3_receipts[]=$row22['gross_receipts'];	 
	}
}

	 $array3_id[0];
	 $array3_id[1];
	 $array3_id[2];
	 $array3_id[3];

	 $array3_units[0];
	 $array3_units[1];
	 $array3_units[2];
	 $array3_units[3];	
	 
	 $array3_miles[0];
	 $array3_miles[1];
	 $array3_miles[2];
	 $array3_miles[3];	

	 $array3_receipts[0];
	 $array3_receipts[1];
	 $array3_receipts[2];
	 $array3_receipts[3];		
	
$query33 = "SELECT * FROM public.loss_history where contact_id='".$_GET['contact_id']."' ORDER BY id";
$result33 = pg_query($query33);
$rows33 = pg_num_rows($result33);
if($rows33>=1){
	while ($row33 = pg_fetch_assoc($result33)) {
	 $loss_id[]=$row33['id'];

$liability_of_losses[]=$row33['liability_of_losses'];

 $total_incurred[]=$row33['total_incurred'];

	  $physical_damage_losses[]=$row33['physical_damage_losses'];
		 
	 $physical_total_incurred[]=$row33['physical_total_incurred'];
	// echo '<br>';	
         $truck_cargo_losses[]=$row33['truck_cargo_losses'];
	// echo '<br>';
	$truck_cargo_total_incurred[]=$row33['truck_cargo_total_incurred'];
	// echo '<br>';		
	}
}
	 $loss_id[0];
	 $loss_id[1];
	 $loss_id[2];

	 $liability_of_losses[0];
	 $liability_of_losses[1];
	 $liability_of_losses[2];

	 $total_incurred[0];
	 $total_incurred[1];
	 $total_incurred[2];		

	 $physical_damage_losses[0];
	 $physical_damage_losses[1];
	 $physical_damage_losses[2];		
	
	 $physical_total_incurred[0];
	 $physical_total_incurred[1];
	 $physical_total_incurred[2];			
	
	 $truck_cargo_losses[0];
	 $truck_cargo_losses[1];
	 $truck_cargo_losses[2];		
	
	 $truck_cargo_total_incurred[0];
	 $truck_cargo_total_incurred[1];
	 $truck_cargo_total_incurred[2];		
	
$query55 = "SELECT * FROM public.liability_damage_truck_cargo_coverage where contact_id='".$_GET['contact_id']."'";
$result55 = pg_query($query55);
$row55 = pg_fetch_assoc($result55);
if($row55>=1){
	while ($row56 = pg_fetch_assoc($result55)) {
    $new_id=$row56['id'];
	$csl=$row56['csl'];
	$um_uim=$row56['um_uim'];
 	$pip=$row56['pip'];
 	$deductible=$row56['deductible'];
 	$comprehensive=$row56['comprehensive'];
 	$specified_perils=$row56['specified_perils'];
 	$limit=$row56["cargo_limit"];
 	$truck_cargo_deductible=$row56['truck_cargo_deductible'];
 	$reefer_breakdown=$row56['reefer_breakdown'];	
	}
}	

    $row55['id'];
  	$row55['csl'];
  	$row55['um_uim'];
   	$row55['pip'];
   	$row55['deductible'];
      $row55['comprehensive'];
      $row55['specified_perils'];
   	$row55["cargo_limit"];
      $row55['truck_cargo_deductible'];
   	$row55['reefer_breakdown'];
	
$query66 = "SELECT * FROM public.additional_coverages where contact_id='".$_GET['contact_id']."' ORDER BY id DESC";
$result66 = pg_query($query66);
$row67 = pg_fetch_assoc($result66);
if($row67>=1){
	while ($row66 = pg_fetch_assoc($result66)) {
	}
}

	$new1_id=$row67['id'];
    $hired_auto=$row67['hired_auto'];
	$non_owned_auto=$row67['non_owned_auto'];
	$truckers_gl=$row67['truckers_gl'];
 	
	$cost_of_hire=$row67['cost_of_hire'];
 	$of_employees=$row67['of_employees'];
 	$non_driver_payroll=$row67['non_driver_payroll'];
 	$of_owners=$row67['of_owners'];
	
 	$trailer_interchange=$row67["trailer_interchange"];
 	
	$additional_coverage_limit=$row67['additional_coverage_limit'];
 	$of_trailers=$row67['of_trailers'];	
 	$of_days_active=$row67['of_days_active'];
	
 	$interchange_agreement=$row67['interchange_agreement'];
 	$interchange_agreement_no=$row67['no_interchange'];
	
 	$schedule_yes=$row67['schedule_yes'];
 	$schedule_no=$row67['schedule_no'];
 	$loaned_yes=$row67['loaned_yes'];
 	$loaned_no=$row67['loaned_no'];
 	$canceled_yes=$row67['canceled_yes'];
 	$canceled_no=$row67['canceled_no'];


$query1 = "SELECT * FROM public.violation where contact_id='".$contact_id."' ORDER BY id ";
$result1 = pg_query($query1);
$rows1 = pg_num_rows($result1);
if($rows1>=1){
	while ($row1 = pg_fetch_assoc($result1)) {
		
	  $arr_accident_violation[]=$row1['accident_violation'];
	  $arr_e_o[]=$row1['e_o'];		 
	}
}	
	  $accident_violation[]=$row1['accident_violation'];
      $e_o=$row1['e_o'];
	 
$query255 = "SELECT * FROM public.additional_info where contact_id='".$_GET['contact_id']."' ORDER BY id DESC";
$result255 = pg_query($query255);
$rows88 = pg_fetch_assoc($result255);
$row88 = pg_num_rows($result255);
if($row88>=1){
	while ($row99 = pg_fetch_assoc($result255)) {
	 
	}
}	 
 $rows88['id'];	 
 $rows88['agency_name'];	 
 $rows88['contact_person'];	 
 $rows88['print_name'];	 
 $rows88['applicant_sig'];	 
 $rows88['agent_sig'];	 
 $rows88['date1'];	 
 $rows88['title'];	 
 $rows88['date2'];	 
 $rows88['major_cities'];	  



//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<html>
<head>
	<title>
		Microsoft Word - 38118152_ATU+Non-Fleet+App+(1-5+units)
	</title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body{
	margin:0;
	font-family: Arial;
	}
	  <script src="html2pdf.bundle.min.js"></script>
	</style>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="http://givesurance.herokuapp.com/non_fleet_form/js/script.js"></script>

	</head>
	<body>
	<form action="" method="post">
	<div id="invoice">
	
	<fieldset class="dataform">

	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="50%" align="left" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left">		
	<img src="http://givesurance.herokuapp.com/non_fleet_form/img/logo.png" alt="logo"/>
	</td>
	</tr>
	</table>
	<table width="50%" align="right" cellpadding="0" cellspacing="0">
	<tr>
	<td align="right" style="font-size:18px;color: #5081bd;height: 30px;">		
	<b>ATU Non-Fleet Application (1-5 Units)</b>
	</td>
	</tr>
	<tr>
	<td align="right" style="font-size: 14px;color: #5081bd;">		
	<i>Auto Liability – Cargo – Physical Damage – General Liability </i>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" height="6" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1">
	<tr>
	<td>
	<table width="100%" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Agency Information</b>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left">				
	<table align="left" width="60%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-right: 1px solid #000000;">	
	<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30"  style="font-size:12px;">
			Submitting Agency:
		</td>
	</tr>
	</table>
	<table align="left" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
	         <input type="hidden" name="agency_id" class="agency_id" id="agency_id" value="'.$rows88['id'].'"/>	
			<input type="text" name="submitting_agency" class="submitting_agency" id="submitting_agency" value="'.$rows88['agency_name'].'" width="100%" style="width:314px;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="right" width="40%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-left: 1px solid #000000;">		
	<table align="left" width="140" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Contact Person:
		</td>
	</tr>
	</table>
	<table align="left" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="Contact_Person" class="Contact_Person" id="Contact_Person"  value="'.$rows88["contact_person"].'" width="100%" style="width:160px;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" height="10">
	<tr>
	<td>
	</td>
	</tr>
	</table>
	';
$myhtml1 = '
		<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #000000; border-bottom:0;">
	<tr>
	<td>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Applicant Information</b>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-bottom:2px solid #000;">
	<tr>
	<td align="left">				
	<table align="left" width="65%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-right: 1px solid #000000;">	
			<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						Applicant Name:
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Applicant_Name" class="applicant_name" id="applicant_name" value="'.$first_name.'" width="49%" style="width:180px;border: 0;font-size:14px;"/>
						<input type="text" name="applicant_lastname" class="applicant_lastname" id="applicant_lastname" value="'.$last_name.'" width="49%" style="width:179px;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<table align="right" width="35%" height="30"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" height="30"  width="140" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" style="font-size:12px;">
						Effective Date: 
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="effective_date" class="effective_date" id="effective_date" value="'.$effective_date.'" width="100%" style="width:125px;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-bottom:2px solid #000;">
	<tr>
	<td align="left">				
	<table align="left" width="65%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-right: 1px solid #000000;">	
			<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						Garaging Address:
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Garaging_Address" class="garaging_address" id="garaging_address" value="'.$garaging_address.'" width="100%" style="width:360px;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<table align="right" width="35%" height="30"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" height="30" cellpadding="6" cellspacing="0" width="140px" bgcolor="#eeece1">
				<tr>
					<td align="center" style="font-size:12px;">
						DOT #: 
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="DOT" class="dot" id="dot" width="100%" value="'.$USDOT_Assigned_to.'" style="width:125px;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-bottom:2px solid #000;">
	<tr>
	<td align="left">				
	<table align="left" width="65%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-right: 1px solid #000000;">	
			<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						City, State, Zip: 
					</td>
				</tr>
			</table>
<table align="left" cellpadding="6" cellspacing="0">
			<tr>
				<td align="center">
					<input type="text" name="City" class="City" id="City" value="'.$garaging_City.'"  style="width:74px;border: 0;font-size:14px;"/>
				</td>
				<td align="center">
					<input type="text" name="State" class="State" id="State" value="'.$garaging_State.'" style="width:74px;border: 0;font-size:14px;"/>
				</td>
				<td align="center">
					<input type="text" name="Zip" class="Zip" id="Zip" value="'.$garaging_ZIP_Code.'" style="width:73px;border: 0;font-size:14px;"/>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	</table>
	<table align="right" width="35%" height="30"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" height="30"  width="140" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" style="font-size:12px;">
						Years in Bus:
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Years in Bus:" class="years_in_bus:" id="years_in_bus" value="'.$Yrs_in_business.'" width="100%" style="width:125px;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');
	


}


else{
	echo "contact not found";
}

?>
	 
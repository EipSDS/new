<?php

$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");

if(ISSET($_POST['savedata']) && $_POST['savedata']=='success'){
$contact_Id=$_POST['contact_id'];
$_POST['Phone'];

// $_POST['garaging_address'];
//echo $_POST['dot'];

$submitting_agency=$_POST['submitting_agency'];
$Contact_Person=$_POST['Contact_Person'];
//applicant info
$Applicant_Name=$_POST['Applicant_Name'];
$Applicant_lastName=$_POST['Applicant_lastName'];
$effective_date=date("Y-m-d", strtotime($_POST['effective_date']));
$garaging_address=$_POST['garaging_address'];
$dot=$_POST['dot'];
$City=$_POST['City'];
$State=$_POST['State'];
$Zip=$_POST['Zip'];
$years_in_bus=$_POST['years_in_bus'];
$mailing_address=$_POST['mailing_address'];
$City2=$_POST['City2'];
$State2=$_POST['State2'];
$Zip2=$_POST['Zip2'];
$contact_name=$_POST['contact_name'];
$e_mail=$_POST['e_mail'];
$Phone=$_POST['Phone'];
//Applicant Information for miles zoho

$miles=$_POST['miles'];
$miles_2=$_POST['miles_2'];
$miles_3=$_POST['miles_3'];
$miles_4=$_POST['miles_4'];
$major=$_POST['major'];

// Auto Liability Coverage for database table
// public.liability_damage_truck_cargo_coverage

// (Column) id, csl, um_uim, pip, deductible, comprehensive, specified_perils, "limit", truck_cargo_deductible, reefer_breakdown, contact_id	FROM public.liability_damage_truck_cargo_coverage

$csl=$_POST['csl'];
$um_uim=$_POST['um_uim'];
$pip=$_POST['pip'];
$limit=$_POST['limit'];
$deductible=$_POST['deductible'];
$motor_deductible=$_POST['motor_deductible'];

    //INSERT INTO public.additional_coverages(id, contact_id, hired_auto, non_owned_auto, truckers_gl, cost_of_hire, of_employees, non_driver_payroll, of_owners, trailer_interchange, additional_coverage_limit, of_trailers, of_days_active, interchange_agreement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
 
$cost=$_POST['cost'];
$employees=$_POST['employees'];
$payroll=$_POST['payroll'];
$owners=$_POST['owners'];
$limit=$_POST['limit'];
$trailers=$_POST['trailers'];
$active=$_POST['active'];

// Tractors (Year, Make) data save in database in  
// INSERT INTO public.contact_vehicles(id, contact_id, vehicle_type, vin, gross_weight, longest_trip, city_of_destination, category, year, make, model, body_style, garaging_zip_code, radius, is_business, is_comprehensive, value, loss_payee, trailer_type, non_owned_value, name, address, need_modification, vehicle_number, trailer_number, sub_category, power_unit, city_percent, physical_damage_coverage, is_owner_operator, is_team_driven, estimated_annual_miles)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);

$Tractors1id=$_POST['Tractors1id'];
$Tractors1=$_POST['Tractors1'];
$make1=$_POST['make1'];
$VIN1=$_POST['VIN1'];
$Stated1=$_POST['Stated1'];

$Tractors2id=$_POST['Tractors2id'];
$Tractors2=$_POST['Tractors2'];
$make2=$_POST['make2'];
$vin2=$_POST['vin2'];
$Stated2=$_POST['Stated2'];


$Tractors3id=$_POST['Tractors3id'];
$Tractors3=$_POST['Tractors3'];
$make3=$_POST['make3'];
$vin3=$_POST['vin3'];
$Stated3=$_POST['Stated3'];

$Tractors4id=$_POST['Tractors4id'];
$Tractors4=$_POST['Tractors4'];
$make4=$_POST['make4'];
$vin4=$_POST['vin4'];
$Stated4=$_POST['Stated4'];

$Tractors5id=$_POST['Tractors5id'];
$Tractors5=$_POST['Tractors5'];
$make5=$_POST['make5'];
$vin5=$_POST['vin5'];
$Stated5=$_POST['Stated5'];

//Trailer (Year, Make) data save in database in 
// INSERT INTO public.contact_vehicles(id, contact_id, vehicle_type, vin, gross_weight, longest_trip, city_of_destination, category, year, make, model, body_style, garaging_zip_code, radius, is_business, is_comprehensive, value, loss_payee, trailer_type, non_owned_value, name, address, need_modification, vehicle_number, trailer_number, sub_category, power_unit, city_percent, physical_damage_coverage, is_owner_operator, is_team_driven, estimated_annual_miles) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);

//UPDATE public.contact_vehicles SET id=?, contact_id=?, vehicle_type=?, vin=?, gross_weight=?, longest_trip=?, city_of_destination=?, category=?, year=?, make=?, model=?, body_style=?, garaging_zip_code=?, radius=?, is_business=?, is_comprehensive=?, value=?, loss_payee=?, trailer_type=?, non_owned_value=?, name=?, address=?, need_modification=?, vehicle_number=?, trailer_number=?, sub_category=?, power_unit=?, city_percent=?, physical_damage_coverage=?, is_owner_operator=?, is_team_driven=?, estimated_annual_miles=? WHERE <condition>;
	
$trailer1id=$_POST['trailer1id'];
$trailer1=$_POST['trailer1'];
$trailer2=$_POST['trailer2'];
$trailermake1=$_POST['trailermake1'];
$trailer2id=$_POST['trailer2id'];
$trailermake2=$_POST['trailermake2'];
$trailer3id=$_POST['trailer3id'];
$trailer3=$_POST['trailer3'];
$trailermake3=$_POST['trailermake3'];
$trailer4id=$_POST['trailer4id'];
$trailer4=$_POST['trailer4'];
$trailermake4=$_POST['trailermake4'];
$trailer5id=$_POST['trailer5id'];
$trailer5=$_POST['trailer5'];
$trailermake5=$_POST['trailermake5'];
$VIN_new=$_POST['VIN_new'];
$VIN_new2=$_POST['VIN_new2'];
$VIN_new3=$_POST['VIN_new3'];
$VIN_new4=$_POST['VIN_new4'];
$VIN_new5=$_POST['VIN_new5'];
$Amount1=$_POST['Amount1'];
$Amount2=$_POST['Amount2'];
$Amount3=$_POST['Amount3'];
$Amount4=$_POST['Amount4'];
$Amount5=$_POST['Amount5'];

// Driver insertion in zoho driver fields

$name1id=$_POST['name1id'];
$name2id=$_POST['name2id'];
$name3id=$_POST['name3id'];
$name4id=$_POST['name4id'];
$name5id=$_POST['name5id'];

 $drivername=$_POST['Name1'];
 $eo1=$_POST['eo1'];
 $state_license1=$_POST['state_license1'];
 $Years_of_Experience1=$_POST['Years_of_Experience1'];
$birth1=$_POST['birth1'];
 $date1=$_POST['date1'];
$Violations1=$_POST['Violations1'];
 $License_State=$_POST['License_State'];
 $License_State1=$_POST['License_State1'];
 $License_State2=$_POST['License_State2'];
 $License_State3=$_POST['License_State3'];
 $License_State4=$_POST['License_State4'];

$testage="test";
$testmerital_status="test";

$DOB_Age_MaritalStatus_Points_LicenceNo=$birth1.','.$age .','.$merital_status.','.$points.','.$_POST['state_license1'];

//second 
$name2=$_POST['name2'];
$eo2=$_POST['eo2'];
$state_license2=$_POST['state_license2'];
$experience2=$_POST['experience2'];
$birth2=$_POST['birth2'];
$date2=$_POST['date2'];
$Violations2=$_POST['Violations2'];
//third
$name3=$_POST['name3'];
$eo3=$_POST['eo3'];
$state_license3=$_POST['state_license3'];
$experience3=$_POST['experience3'];
$birth3=$_POST['birth3'];
$date3=$_POST['date3'];
$Violations3=$_POST['Violations3'];
//thrid
$name4=$_POST['name4'];
$eo4=$_POST['eo4'];
$state_license4=$_POST['state_license4'];
$experience4=$_POST['experience4'];
$birth4=$_POST['birth4'];
$date4=$_POST['date4'];
$Violations4=$_POST['Violations4'];
//fourth
$name5=$_POST['name5'];
$eo5=$_POST['eo5'];
$state_license5=$_POST['state_license5'];
$experience5=$_POST['experience5'];
$birth5=$_POST['birth5'];
$date5=$_POST['date5'];
$Violations5=$_POST['Violations5'];

//Insert data in contact_commodities
// INSERT INTO public.contact_commodities(id, contact_id, name, value, max_value, average_value, percent)VALUES (?, ?, ?, ?, ?, ?, ?);
// UPDATE public.contact_commoditiesSET id=?, contact_id=?, name=?, value=?, max_value=?, average_value=?, percent=? WHERE <condition>;

$Commodity1id=$_POST['Commodity1id'];
$Commodity1=$_POST['Commodity1'];
$Commodity2id=$_POST['Commodity2id'];
$Commodity2=$_POST['Commodity2'];
$Commodity3id=$_POST['Commodity3id'];
$Commodity3=$_POST['Commodity3'];
$Commodity4id=$_POST['Commodity4id'];
$Commodity4=$_POST['Commodity4'];
$Commodity5id=$_POST['Commodity5id'];
$Commodity5=$_POST['Commodity5'];
$hauled1=$_POST['hauled1'];
$hauled2=$_POST['hauled2'];
$hauled3=$_POST['hauled3'];
$hauled4=$_POST['hauled4'];
$hauled5=$_POST['hauled5'];
$Value1=$_POST['Value1'];
$Value2=$_POST['Value2'];
$Value3=$_POST['Value3'];
$Value4=$_POST['Value4'];
$Value5=$_POST['Value5'];
$Stated_Amount1=$_POST['Stated_Amount1'];
$Stated_Amount2=$_POST['Stated_Amount2'];
$Stated_Amount3=$_POST['Stated_Amount3'];
$Stated_Amount4=$_POST['Stated_Amount4'];
$Stated_Amount5=$_POST['Stated_Amount5'];

// INSERT INTO public."operation_history "(id, contact_id, of_power_units, total_miles, gross_receipts) VALUES (?, ?, ?, ?, ?);
// UPDATE public."operation_history " SET id=?, contact_id=?, of_power_units=?, total_miles=?, gross_receipts=? WHERE <condition>;

$Units_box1id=$_POST['Units_box1id'];
$Units_box1=$_POST['Units_box1'];
$Total_Miles1=$_POST['Total_Miles1'];
$Receipts1=$_POST['Receipts1'];


$Units_box2id=$_POST['Units_box2id'];
$Units_box2=$_POST['Units_box2'];
$Total_Miles2=$_POST['Total_Miles2'];
$Receipts2=$_POST['Receipts2'];

$Units_box3id=$_POST['Units_box3id'];
$Units_box3=$_POST['Units_box3'];
$Total_Miles3=$_POST['Total_Miles3'];
$Receipts3=$_POST['Receipts3'];

$Units_box4id=$_POST['Units_box4id'];
$Units_box4=$_POST['Units_box4'];
$Total_Miles4=$_POST['Total_Miles4'];
$Receipts4=$_POST['Receipts4'];

// INSERT INTO public.loss_history (id, contact_id, liability_of_losses, "total_incurred ", physical_damage_losses, physical_total_incurred, truck_cargo_losses, truck_cargo_total_incurred) VALUES (?, ?, ?, ?, ?, ?, ?, ?);
// UPDATE public.loss_history SET id=?, contact_id=?, liability_of_losses=?, "total_incurred "=?, physical_damage_losses=?, physical_total_incurred=?, truck_cargo_losses=?, truck_cargo_total_incurred=? WHERE <condition>;

$loss1id=$_POST['loss1id'];
$loss2id=$_POST['loss2id'];
$loss3id=$_POST['loss3id'];

$Power_new2=$_POST['Power_new2'];
$Total_Incurred1=$_POST['Total_Incurred1'];
$Losses_Damage1=$_POST['Losses_Damage1'];
$Total_Incurred_1=$_POST['Total_Incurred_1'];
$Motor_Truck1=$_POST['Motor_Truck1'];
$Motor_Truck4=$_POST['Motor_Truck4'];

$Power_new3=$_POST['Power_new3'];
$Total_Incurred2=$_POST['Total_Incurred2'];
$Losses_Damage2=$_POST['Losses_Damage2'];
$Total_Incurred_2=$_POST['Total_Incurred_2'];
$Motor_Truck2=$_POST['Motor_Truck2'];
$Motor_Truck5=$_POST['Motor_Truck5'];

$Power_new4=$_POST['Power_new4'];
$Total_Incurred3=$_POST['Total_Incurred3'];
$Losses_Damage3=$_POST['Losses_Damage3'];
$Total_Incurred_3=$_POST['Total_Incurred_3'];
$Motor_Truck3=$_POST['Motor_Truck3'];
$Motor_Truck6=$_POST['Motor_Truck6'];


		 $contacturl = "Contacts/".$_POST['contact_id'];
			 $Contactdata = '{
			"data": [{
            "First_Name":"'.$_POST['Applicant_Name'].'", 
            "Last_Name":"'.$_POST['Applicant_lastName'].'", 
            "Policy_Effective_Date":"'.$_POST['effective_date'].'", 
            "Home_Address":"'.$_POST['garaging_address'].'", 
            "USDOT_associated_with_the_insured_s_business":"'.$_POST['dot'].'", 
            "City":"'.$_POST['City'].'", 
            "State":"'.$_POST['State'].'", 
            "ZIP_Code":"'.$_POST['Zip'].'", 
            "Yrs_in_business":"'.$_POST['years_in_bus'].'", 
            "Mailing_Address":"'.$_POST['mailing_address'].'", 
            "City_Two":"'.$_POST['City2'].'", 
            "State_Two":"'.$_POST['State2'].'", 
            "ZIP_Code_Two":"'.$_POST['Zip2'].'", 
            "First_Name_Two":"'.$_POST['contact_name'].'", 
            "E_mail_Address":"'.$_POST['e_mail'].'", 
            "Phone":"'.$_POST['Phone'].'", 
            "Radious_0_50_miles":"'.$_POST['miles'].'", 
            "Radious_50_200_miles":"'.$_POST['miles_2'].'", 
            "Radious_200_miles":"'.$_POST['miles_3'].'", 
            "Radious_600_miles":"'.$_POST['miles_4'].'"
			}]}'; 
			@$zohoResponse =  $handleFunctionsObject->zoho_curl($contacturl,"PUT",$Contactdata,$old_access_token);
			if($zohoResponse['data'][0]['code'] == "SUCCESS"){
		
			 json_encode($zohoResponse);
			}
			

if($drivername !== ""  or  $state_license1 !== "" or $date1 !== "" or $License_State !== ""){			
$testurl = "Contacts/".$_POST['contact_id'];
		$testdata = "";
		$testingdata =  $handleFunctionsObject->zoho_curl($testurl,"GET",$testdata,$old_access_token);			
$driversData = $testingdata['data'][0]['Drivers1'];	
		
$new_array=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo,"Name1"=>$_POST['Name1'],"Owner_Driver"=>$_POST['eo1'],"License_State"=>$_POST['License_State'],"Experience_Years"=>$_POST['Years_of_Experience1'],"Hire_Date"=>"".$date1.""
		);	
	
	$driversData[0]=$new_array;
 $dd=json_encode($driversData);
				  $Contdata = '{
			"data": [{
           "Drivers1":'.$dd.'
            
			}]}';
	@$driverResponse =  $handleFunctionsObject->zoho_curl($testurl,"PUT",$Contdata,$old_access_token);

}

$DOB_Age_MaritalStatus_Points_LicenceNo1=$birth2.','.$age .','.$merital_status.','.$points.','.$_POST['state_license2'];

if($name2 !== ""  or  $eo2 !== "" or $state_license2 !== "" or $License_State1 !== ""){			
$test1url = "Contacts/".$_POST['contact_id'];
		$test1data = "";
		$testing1data =  $handleFunctionsObject->zoho_curl($test1url,"GET",$test1data,$old_access_token);			
$driversnewData = $testing1data['data'][0]['Drivers1'];	
		
$new_arr=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo1,"Name1"=>$_POST['name2'],"Owner_Driver"=>$_POST['eo2'],"License_State"=>$_POST['License_State1'],"Experience_Years"=>$_POST['experience2'],"Hire_Date"=>"".$date2.""
		);	
	$driversnewData[1]=$new_arr;
	$dd1=json_encode($driversnewData);
				  $Cont1data = '{
			"data": [{
           "Drivers1":'.$dd1.'
            
			}]}';
	@$driver1Response =  $handleFunctionsObject->zoho_curl($test1url,"PUT",$Cont1data,$old_access_token);
}
$DOB_Age_MaritalStatus_Points_LicenceNo2=$birth3.','.$age .','.$merital_status.','.$points.','.$_POST['state_license3'];
if($name3 !== ""  or  $eo3 !== "" or $state_license3 !== "" or $date3 !== ""){			
$test2url = "Contacts/".$_POST['contact_id'];
		$test2data = "";
		$testing2data =  $handleFunctionsObject->zoho_curl($test2url,"GET",$test2data,$old_access_token);			
$drivers2Data = $testing2data['data'][0]['Drivers1'];	
		
$new1_arr=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo2,"Name1"=>$_POST['name3'],"Owner_Driver"=>$_POST['eo3'],"License_State"=>$_POST['License_State2'],"Experience_Years"=>$_POST['experience3'],"Hire_Date"=>"".$date3.""
		);	

	$drivers2Data[2]=$new1_arr;
	$dd2=json_encode($drivers2Data);
				  $Cont2data = '{
			"data": [{
           "Drivers1":'.$dd2.'
            
			}]}';
	@$driver2Response =  $handleFunctionsObject->zoho_curl($test2url,"PUT",$Cont2data,$old_access_token);
}
$DOB_Age_MaritalStatus_Points_LicenceNo3=$birth4.','.$age .','.$merital_status.','.$points.','.$_POST['state_license4'];
if($name4 !== ""  or  $eo4 !== "" or $state_license4 !== ""){			
$test3url = "Contacts/".$_POST['contact_id'];
		$test3data = "";
		$testing3data =  $handleFunctionsObject->zoho_curl($test3url,"GET",$test3data,$old_access_token);			
$drivers3Data = $testing3data['data'][0]['Drivers1'];	
		
$new3_arr=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo3,"Name1"=>$_POST['name4'],"Owner_Driver"=>$_POST['eo4'],"License_State"=>$_POST['License_State3'],"Experience_Years"=>$_POST['experience4'],"Hire_Date"=>"".$date4.""
		);	


	$drivers3Data[3]=$new3_arr;
	$dd3=json_encode($drivers3Data);
				  $Cont3data = '{
			"data": [{
           "Drivers1":'.$dd3.'
            
			}]}';
	@$driver3Response =  $handleFunctionsObject->zoho_curl($test3url,"PUT",$Cont3data,$old_access_token);
}
$DOB_Age_MaritalStatus_Points_LicenceNo4=$birth5.','.$age .','.$merital_status.','.$points.','.$_POST['state_license5'];
if($name5 !== ""  or  $eo5 !== "" or $state_license5 !== "" or $date5 !== ""){			
$test4url = "Contacts/".$_POST['contact_id'];
		$test4data = "";
		$testing4data =  $handleFunctionsObject->zoho_curl($test4url,"GET",$test4data,$old_access_token);			
$drivers4Data = $testing4data['data'][0]['Drivers1'];	
		
$new4_arr=array(
		"DOB_Age_MaritalStatus_Points_LicenceNo"=>$DOB_Age_MaritalStatus_Points_LicenceNo4,"Name1"=>$_POST['name5'],"Owner_Driver"=>$_POST['eo5'],"License_State"=>$_POST['License_State4'],"Experience_Years"=>$_POST['experience5'],"Hire_Date"=>"".$date5.""
		);	


	$drivers4Data[4]=$new4_arr;
    $dd4=json_encode($drivers4Data);
				  $Cont4data = '{
			"data": [{
           "Drivers1":'.$dd4.'
            
			}]}';
	@$driver4Response =  $handleFunctionsObject->zoho_curl($test4url,"PUT",$Cont4data,$old_access_token);
}
 if(!empty($Units_box1)){
	echo $query6 = "SELECT * FROM public.operation_history where contact_id='".$contact_Id."' AND id='".$Units_box1id."'";	
	$rs6 = pg_query($query6);
	echo $rows6 = pg_num_rows($rs6);
	if($rows6==1){
 			echo $query7 = "UPDATE  public.operation_history SET of_power_units='".$Units_box1."', total_miles='".$Total_Miles1."', gross_receipts='".$Receipts1."' WHERE contact_id='".$contact_Id."' AND id='".$Units_box1id."'";
           $result7 = pg_query($query7);	
	}
else{
		echo $query ="INSERT INTO public.operation_history(contact_id, of_power_units, total_miles, gross_receipts) VALUES ('$contact_Id','$Units_box1','$Total_Miles1', '$Receipts1')";
	$result = pg_query($query);
			if($result){
			echo "1 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
}	
}	
}	
   if(!empty($Units_box2)){
	echo $query8 = "SELECT * FROM public.operation_history where contact_id='".$contact_Id."' AND id='".$Units_box2id."'";	
	$rs8 = pg_query($query8);
	$rows8 = pg_num_rows($rs8);
	if($rows8==1){
 			echo $query9 = "UPDATE  public.operation_history SET of_power_units='".$Units_box2."', total_miles='".$Total_Miles2."', gross_receipts='".$Receipts2."' WHERE contact_id='".$contact_Id."' AND id='".$Units_box2id."'";
           $result8 = pg_query($query9);	
	}
	
	else{
		$query1 ="INSERT INTO public.operation_history(contact_id, of_power_units, total_miles, gross_receipts) VALUES ('$contact_Id','$Units_box2','$Total_Miles2', '$Receipts2')";
	$result1 = pg_query($query1);
			if($result1){
			echo "2 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
}
   }
  
   if(!empty($Units_box3)){
	echo $query11 = "SELECT * FROM public.operation_history where contact_id='".$contact_Id."' AND id='".$Units_box3id."'";	
	$rs11 = pg_query($query11);
	$rows11 = pg_num_rows($rs11);
	if($rows11==1){
 			echo $query12 = "UPDATE  public.operation_history SET of_power_units='".$Units_box3."', total_miles='".$Total_Miles3."', gross_receipts='".$Receipts3."' WHERE contact_id='".$contact_Id."' AND id='".$Units_box3id."'";
           $result12 = pg_query($query12);	
	}
	
	else{
	$query1 ="INSERT INTO public.operation_history(contact_id, of_power_units, total_miles, gross_receipts) VALUES ('$contact_Id','$Units_box3','$Total_Miles3', '$Receipts3')";
	$result1 = pg_query($query1);
			if($result1){
			echo "3 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
}
   }
   if(!empty($Units_box4)){
		echo $query14 = "SELECT * FROM public.operation_history where contact_id='".$contact_Id."' AND id='".$Units_box4id."'";	
	$rs13 = pg_query($query14);
	$rows16 = pg_num_rows($rs13);
	if($rows16==1){
 			echo $query15 = "UPDATE  public.operation_history SET of_power_units='".$Units_box4."', total_miles='".$Total_Miles4."', gross_receipts='".$Receipts4."' WHERE contact_id='".$contact_Id."' AND id='".$Units_box4id."'";
           $result15 = pg_query($query15);	
	}
	
	else{
	$query2 ="INSERT INTO public.operation_history(contact_id, of_power_units, total_miles, gross_receipts) VALUES ('$contact_Id','$Units_box4','$Total_Miles4', '$Receipts4')";
	$result2 = pg_query($query2);
			if($result2){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
   if(!empty($Power_new2) or !empty($Total_Incurred1)){
		echo $query22 = "SELECT * FROM public.loss_history where contact_id='".$contact_Id."' AND id='".$loss1id."'";	
	$rs22 = pg_query($query22);
	$rows22 = pg_num_rows($rs22);
	if($rows22==1){
 			echo $query23 = "UPDATE  public.loss_history SET liability_of_losses='".$Power_new2."', total_incurred='".$Total_Incurred1."', physical_damage_losses='".$Losses_Damage1."', physical_total_incurred='".$Total_Incurred_1."', truck_cargo_losses='".$Motor_Truck1."', truck_cargo_total_incurred='".$Motor_Truck4."' WHERE contact_id='".$contact_Id."' AND id='".$loss1id."'";
           $result22 = pg_query($query23);	
	}
	
	else{
	echo $query24 ="INSERT INTO public.loss_history(contact_id, liability_of_losses, total_incurred, physical_damage_losses,physical_total_incurred, truck_cargo_losses, truck_cargo_total_incurred) VALUES ('$contact_Id','$Power_new2','$Total_Incurred1', '$Losses_Damage1', '$Total_Incurred_1', '$Motor_Truck1', '$Motor_Truck4')";
	$result24 = pg_query($query24);
			if($result24){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

   if(!empty($Power_new3) or !empty($Total_Incurred2)){
		echo $query33 = "SELECT * FROM public.loss_history where contact_id='".$contact_Id."' AND id='".$loss2id."'";	
	$rs33 = pg_query($query33);
	$rows33 = pg_num_rows($rs33);
	if($rows33==1){
 			echo $query27 = "UPDATE  public.loss_history SET liability_of_losses='".$Power_new3."', total_incurred='".$Total_Incurred2."', physical_damage_losses='".$Losses_Damage2."', physical_total_incurred='".$Total_Incurred_2."', truck_cargo_losses='".$Motor_Truck2."', truck_cargo_total_incurred='".$Motor_Truck5."' WHERE contact_id='".$contact_Id."' AND id='".$loss2id."'";
           $result27 = pg_query($query27);	
	}
	
	else{
	echo $query34 ="INSERT INTO public.loss_history(contact_id, liability_of_losses, total_incurred, physical_damage_losses,physical_total_incurred, truck_cargo_losses, truck_cargo_total_incurred) VALUES ('$contact_Id','$Power_new3','$Total_Incurred2', '$Losses_Damage2', '$Total_Incurred_2', '$Motor_Truck2', '$Motor_Truck5')";
	$result34 = pg_query($query34);
			if($result34){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
  if(!empty($Power_new4) or !empty($Total_Incurred3)){
		echo $query44 = "SELECT * FROM public.loss_history where contact_id='".$contact_Id."' AND id='".$loss3id."'";	
	$rs44 = pg_query($query44);
	$rows44 = pg_num_rows($rs44);
	if($rows44==1){
 			echo $query47 = "UPDATE  public.loss_history SET liability_of_losses='".$Power_new4."', total_incurred='".$Total_Incurred3."', physical_damage_losses='".$Losses_Damage3."', physical_total_incurred='".$Total_Incurred_3."', truck_cargo_losses='".$Motor_Truck3."', truck_cargo_total_incurred='".$Motor_Truck6."' WHERE contact_id='".$contact_Id."' AND id='".$loss3id."'";
           $result47 = pg_query($query47);	
	}
	
	else{
	echo $query45 ="INSERT INTO public.loss_history(contact_id, liability_of_losses, total_incurred, physical_damage_losses,physical_total_incurred, truck_cargo_losses, truck_cargo_total_incurred) VALUES ('$contact_Id','$Power_new4','$Total_Incurred3', '$Losses_Damage3', '$Total_Incurred_3', '$Motor_Truck3', '$Motor_Truck6')";
	$result44 = pg_query($query45);
			if($result44){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

 if(!empty($Commodity1) or !empty($hauled1)){
		echo $query48 = "SELECT * FROM public.contact_commodities where contact_id='".$contact_Id."' AND id='".$Commodity1id."'";	
	$rs48 = pg_query($query48);
	$rows48 = pg_num_rows($rs48);
	if($rows48==1){
 			echo $query49 = "UPDATE  public.contact_commodities SET name='".$Commodity1."', value='".$hauled1."', max_value='".$Value1."', average_value='".$Stated_Amount1."' WHERE contact_id='".$contact_Id."' AND id='".$Commodity1id."'";
           $result49 = pg_query($query49);	
	}
	
	else{
	echo $query45 ="INSERT INTO public.contact_commodities(contact_id, name, value, max_value,average_value) VALUES ('$contact_Id','$Commodity1','$hauled1', '$Value1', '$Stated_Amount1')";
	$result05 = pg_query($query45);
			if($result05){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

 if(!empty($Commodity2) or !empty($hauled2)){
	echo $query51 = "SELECT * FROM public.contact_commodities where contact_id='".$contact_Id."' AND id='".$Commodity2id."'";	
	$rs51 = pg_query($query51);
	$rows51 = pg_num_rows($rs51);
	if($rows51==1){
 			echo $query52 = "UPDATE  public.contact_commodities SET name='".$Commodity2."', value='".$hauled2."', max_value='".$Value2."', average_value='".$Stated_Amount2."' WHERE contact_id='".$contact_Id."' AND id='".$Commodity2id."'";
           $result52 = pg_query($query52);	
	}
	
	else{
	echo $query55 ="INSERT INTO public.contact_commodities(contact_id, name, value, max_value,average_value) VALUES ('$contact_Id','$Commodity2','$hauled2', '$Value2', '$Stated_Amount2')";
	$result06 = pg_query($query55);
			if($result06){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

 if(!empty($Commodity3) or !empty($hauled3)){
	echo $query61 = "SELECT * FROM public.contact_commodities where contact_id='".$contact_Id."' AND id='".$Commodity3id."'";	
	$rs61 = pg_query($query61);
	$rows61 = pg_num_rows($rs61);
	if($rows61==1){
 			echo $query62 = "UPDATE  public.contact_commodities SET name='".$Commodity3."', value='".$hauled3."', max_value='".$Value3."', average_value='".$Stated_Amount3."' WHERE contact_id='".$contact_Id."' AND id='".$Commodity3id."'";
           $result62 = pg_query($query62);	
	}
	
	else{
	echo $query65 ="INSERT INTO public.contact_commodities(contact_id, name, value, max_value,average_value) VALUES ('$contact_Id','$Commodity3','$hauled3', '$Value3', '$Stated_Amount3')";
	$result07 = pg_query($query65);
			if($result07){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

 if(!empty($Commodity4) or !empty($hauled4)){
	echo $query71 = "SELECT * FROM public.contact_commodities where contact_id='".$contact_Id."' AND id='".$Commodity4id."'";	
	$rs71 = pg_query($query71);
	$rows71 = pg_num_rows($rs71);
	if($rows71==1){
 			echo $query72 = "UPDATE  public.contact_commodities SET name='".$Commodity4."', value='".$hauled4."', max_value='".$Value4."', average_value='".$Stated_Amount4."' WHERE contact_id='".$contact_Id."' AND id='".$Commodity4id."'";
           $result72 = pg_query($query72);	
	}
	
	else{
	echo $query75 ="INSERT INTO public.contact_commodities(contact_id, name, value, max_value,average_value) VALUES ('$contact_Id','$Commodity4','$hauled4', '$Value4', '$Stated_Amount4')";
	$result08 = pg_query($query75);
			if($result08){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
 if(!empty($Commodity5) or !empty($hauled5)){
	echo $query81 = "SELECT * FROM public.contact_commodities where contact_id='".$contact_Id."' AND id='".$Commodity5id."'";	
	$rs81 = pg_query($query81);
	$rows81 = pg_num_rows($rs81);
	if($rows81==1){
 			echo $query82 = "UPDATE  public.contact_commodities SET name='".$Commodity5."', value='".$hauled5."', max_value='".$Value5."', average_value='".$Stated_Amount5."' WHERE contact_id='".$contact_Id."' AND id='".$Commodity5id."'";
           $result82 = pg_query($query82);	
	}
	
	else{
	echo $query85 ="INSERT INTO public.contact_commodities(contact_id, name, value, max_value,average_value) VALUES ('$contact_Id','$Commodity5','$hauled5', '$Value5', '$Stated_Amount5')";
	$result09 = pg_query($query85);
			if($result09){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($make1) or !empty($VIN1)){
	echo $query91 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$Tractors1id."'";	
	$rs91 = pg_query($query91);
	$rows91 = pg_num_rows($rs91);
	if($rows91==1){
 			echo $query92 = "UPDATE  public.contact_vehicles SET vin='".$VIN1."', year='".$Tractors1."', make='".$make1."' WHERE contact_id='".$contact_Id."' AND id='".$Tractors1id."'";
           $result92 = pg_query($query92);	
	}
	
	else{
	echo $query95 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','1981 or newer vehicle','$VIN1','$Tractors1', '$make1')";
	$result011 = pg_query($query95);
			if($result011){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($make2) or !empty($vin2)){
	echo $query99 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$Tractors2id."'";	
	$rs99 = pg_query($query99);
	$rows99 = pg_num_rows($rs99);
	if($rows99==1){
 			echo $query53 = "UPDATE  public.contact_vehicles SET vin='".$VIN1."', year='".$Tractors2."', make='".$make2."' WHERE contact_id='".$contact_Id."' AND id='".$Tractors2id."'";
           $result53 = pg_query($query53);	
	}
	
	else{
	echo $query29 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','1981 or newer vehicle','$vin2','$Tractors2', '$make2')";
	$result0111 = pg_query($query29);
			if($result0111){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($make3) or !empty($vin3)){
	echo $query101 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$Tractors3id."'";	
	$rs101 = pg_query($query101);
	$rows101 = pg_num_rows($rs101);
	if($rows101==1){
 			echo $query102 = "UPDATE  public.contact_vehicles SET vin='".$vin3."', year='".$Tractors3."', make='".$make3."' WHERE contact_id='".$contact_Id."' AND id='".$Tractors3id."'";
           $result101 = pg_query($query102);	
	}
	
	else{
	echo $query103 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','1981 or newer vehicle','$vin3','$Tractors3', '$make3')";
	$result104 = pg_query($query103);
			if($result104){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($make4) or !empty($vin4)){
	echo $query105 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$Tractors4id."'";	
	$rs105 = pg_query($query105);
	$rows105 = pg_num_rows($rs105);
	if($rows105==1){
 			echo $query106 = "UPDATE  public.contact_vehicles SET vin='".$vin4."', year='".$Tractors4."', make='".$make4."' WHERE contact_id='".$contact_Id."' AND id='".$Tractors4id."'";
           $result106 = pg_query($query106);	
	}
	
	else{
	echo $query107 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','1981 or newer vehicle','$vin4','$Tractors4', '$make4')";
	$result107 = pg_query($query107);
			if($result107){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

if(!empty($make5) or !empty($vin5)){
	echo $query201 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$Tractors5id."'";	
	$rs201 = pg_query($query201);
	$rows201 = pg_num_rows($rs201);
	if($rows201==1){
 			echo $query202 = "UPDATE  public.contact_vehicles SET vin='".$vin5."', year='".$Tractors5."', make='".$make5."' WHERE contact_id='".$contact_Id."' AND id='".$Tractors5id."'";
           $result201 = pg_query($query202);	
	}
	
	else{
	echo $query203 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','1981 or newer vehicle','$vin5','$Tractors5', '$make5')";
	$result204 = pg_query($query203);
			if($result204){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

if(!empty($trailermake1) or !empty($VIN_new)){
	echo $query108 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$trailer1id."'";	
	$rs108 = pg_query($query108);
	$rows108 = pg_num_rows($rs108);
	if($rows108==1){
 			echo $query109 = "UPDATE  public.contact_vehicles SET vin='".$VIN_new."', year='".$trailer1."', make='".$trailermake1."' WHERE contact_id='".$contact_Id."' AND id='".$trailer1id."'";
           $result108 = pg_query($query109);	
	}
	
	else{
	echo $query10 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','Trailer','$VIN_new','$trailer1', '$trailermake1')";
	$result10 = pg_query($query10);
			if($result10){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($trailermake2) or !empty($VIN_new2)){
	echo $query111 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$trailer2id."'";	
	$rs111 = pg_query($query111);
	$rows111 = pg_num_rows($rs111);
	if($rows111==1){
 			echo $query112 = "UPDATE  public.contact_vehicles SET vin='".$VIN_new2."', year='".$trailer2."', make='".$trailermake2."' WHERE contact_id='".$contact_Id."' AND id='".$trailer2id."'";
           $result111 = pg_query($query112);	
	}
	
	else{
	echo $query113 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','Trailer','$VIN_new2','$trailer2', '$trailermake2')";
	$result112 = pg_query($query113);
			if($result112){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

if(!empty($trailermake3) or !empty($VIN_new3)){
	echo $query115 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$trailer3id."'";	
	$rs115 = pg_query($query115);
	$rows115 = pg_num_rows($rs115);
	if($rows115==1){
 			echo $query116 = "UPDATE  public.contact_vehicles SET vin='".$VIN_new3."', year='".$trailer3."', make='".$trailermake3."' WHERE contact_id='".$contact_Id."' AND id='".$trailer3id."'";
           $result115 = pg_query($query116);	
	}
	
	else{
	echo $query117 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','Trailer','$VIN_new3','$trailer3', '$trailermake3')";
	$result117 = pg_query($query117);
			if($result117){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}
if(!empty($trailermake4) or !empty($VIN_new4)){
	echo $query121 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$trailer4id."'";	
	$rs121 = pg_query($query121);
	$rows121 = pg_num_rows($rs121);
	if($rows121==1){
 			echo $query122 = "UPDATE  public.contact_vehicles SET vin='".$VIN_new4."', year='".$trailer4."', make='".$trailermake4."' WHERE contact_id='".$contact_Id."' AND id='".$trailer4id."'";
           $result121 = pg_query($query122);	
	}
	
	else{
	echo $query123 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','Trailer','$VIN_new4','$trailer4', '$trailermake4')";
	$result123 = pg_query($query123);
			if($result123){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}

if(!empty($trailermake5) or !empty($VIN_new5)){
	echo $query125 = "SELECT * FROM public.contact_vehicles where contact_id='".$contact_Id."' AND id='".$trailer5id."'";	
	$rs125 = pg_query($query125);
	$rows125 = pg_num_rows($rs125);
	if($rows125==1){
 			echo $query126 = "UPDATE  public.contact_vehicles SET vin='".$VIN_new5."', year='".$trailer5."', make='".$trailermake5."' WHERE contact_id='".$contact_Id."' AND id='".$trailer5id."'";
           $result126 = pg_query($query126);	
	}
	
	else{
	echo $query127 ="INSERT INTO public.contact_vehicles(contact_id, vehicle_type, vin, year, make) VALUES ('$contact_Id','Trailer','$VIN_new5','$trailer5', '$trailermake5')";
	$result127 = pg_query($query127);
			if($result127){
			echo " 4 Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 	
  }
}







}	








?>
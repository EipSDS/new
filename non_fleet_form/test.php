<?php
$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
include('functions.php');
$zoho_client_id='1000.G5ADCREZLWKQ37764DHC3ZZXAW4VEH';
$zoho_client_secret='88c42ac4b05a8e341731956a233d89cb0399e7f3cb';
$handleFunctionsObject = new handleFunctions;
$old_access_token = file_get_contents("access_token.txt");
$refresh_token = file_get_contents("refresh_token.txt");
$contact_id=$_GET['contact_id'];
echo $contact_id;
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
				 $url = "Contacts/$contact_id";
				$data = "";
				 $check_token_valid =  $handleFunctionsObject->zoho_curl($url,"GET",$data,$old_access_token);
$query = "SELECT * FROM public.contact_commodities where contact_id='".$contact_id."'";
$result = pg_query($query);
$rows = pg_num_rows($result);
if($rows>=1){
	while ($row = pg_fetch_assoc($result)) {
	 echo $row['name'];
	 echo '<br>';
	 echo $row['value'];
	 echo '<br>';
	 echo $row['max_value'];
	 echo '<br>';
	 echo $row['average_value'];
	 echo '<br>';			 
	}
}
$query1 = "SELECT * FROM public.violation where contact_id='".$contact_id."'";
$result1 = pg_query($query1);
$rows1 = pg_num_rows($result1);
if($rows1>=1){
	while ($row1 = pg_fetch_assoc($result1)) {
	 echo $row1['accident_violation'];
	 echo '<br>';	
	 echo $row1['date'];
	 echo '<br>';		 
	}
}
$query2 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='1981 or newer vehicle'";
$result2 = pg_query($query2);
$rows2 = pg_num_rows($result2);
if($rows2>=1){
	while ($row2 = pg_fetch_assoc($result2)) {
	 echo $row2['year'];
	 echo '<br>';	
	 echo $row2['make'];
	 echo '<br>';	
	 echo $row2['vin'];
	 echo '<br>';	 
	}
}	
$query3 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='Trailer'";
$result3 = pg_query($query3);
$rows3 = pg_num_rows($result3);
if($rows3>=1){
	while ($row3 = pg_fetch_assoc($result3)) {
	 echo $row3['year'];
	 echo '<br>';	
	 echo $row3['make'];
	 echo '<br>';	
	 echo $row3['vin'];
	 echo '<br>';	 
	}
}		 
echo $id=$check_token_valid['data'][0];
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
echo $driver_Name1=$check_token_valid['data'][0]['Drivers1'][0]['Name1'];
echo "<br>";
echo $DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['Drivers1'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];
$str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo);  
echo $DOB=$str_arr[0]; 
echo"<br>";
echo $Age=$str_arr[1]; 
echo"<br>";
echo $MaritalStatus=$str_arr[2]; 
echo"<br>";
echo $Points=$str_arr[3]; 
echo"<br>";
echo $LicenceNo=$str_arr[4]; 

echo $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
echo $Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];	
	
echo "valid taken";
echo "<pre>";
print_r($check_token_valid);
echo "</pre>";	


	
}
else{
	$query = "SELECT * FROM public.contact_commodities where contact_id='".$contact_id."'";
$result = pg_query($query);
$rows = pg_num_rows($result);
if($rows>=1){
	while ($row = pg_fetch_assoc($result)) {
	 echo $row['name'];
	 echo '<br>';
	 echo $row['value'];
	 echo '<br>';
	 echo $row['max_value'];
	 echo '<br>';
	 echo $row['average_value'];
	 echo '<br>';			 
	}
}

$query1 = "SELECT * FROM public.violation where contact_id='".$contact_id."'";
$result1 = pg_query($query1);
$rows1 = pg_num_rows($result1);
if($rows1>=1){
	while ($row1 = pg_fetch_assoc($result1)) {
	 echo $row1['accident_violation'];
	 echo '<br>';	
	 echo $row1['date'];
	 echo '<br>';		 
	}
}
$query2 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='1981 or newer vehicle'";
$result2 = pg_query($query2);
$rows2 = pg_num_rows($result2);
if($rows2>=1){
	while ($row2 = pg_fetch_assoc($result2)) {
echo 'array print';	
	$response=array();	
	 $response=$row2;
	 print_r($response);
	 echo 'array print';
print_r($row2);	 
	 echo '<br>';	
	 echo $row2['year'];
	 echo $row2['make'];
	 echo '<br>';	
	 echo $row2['vin'];
	 echo '<br>';	 
	}
}	
$query3 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='Trailer'";
$result3 = pg_query($query3);
$rows3 = pg_num_rows($result3);
if($rows3>=1){
	while ($row3 = pg_fetch_assoc($result3)) {
	 echo $row3['year'];
	 echo '<br>';	
	 echo $row3['make'];
	 echo '<br>';	
	 echo $row3['vin'];
	 echo '<br>';	 
	}
}	

	 $url = "Contacts/$contact_id";
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
echo $driver_Name1=$check_token_valid['data'][0]['Drivers1'][0]['Name1'];
echo $DOB_Age_MaritalStatus_Points_LicenceNo=$check_token_valid['data'][0]['Drivers1'][0]['DOB_Age_MaritalStatus_Points_LicenceNo'];

$str_arr = preg_split ("/\,/", $DOB_Age_MaritalStatus_Points_LicenceNo);  
echo $DOB=$str_arr[0]; 
echo"<br>";
echo $Age=$str_arr[1]; 
echo"<br>";
echo $MaritalStatus=$str_arr[2]; 
echo"<br>";
echo $Points=$str_arr[3]; 
echo"<br>";
echo $LicenceNo=$str_arr[4]; 

echo $Experience_Years=$check_token_valid['data'][0]['Drivers1'][0]['Experience_Years'];	
echo $Hire_Date=$check_token_valid['data'][0]['Drivers1'][0]['Hire_Date'];	

echo "<pre>";
echo "valid 2 taken";
print_r($check_token_valid);
echo "</pre>";
	
}	
}


else{
	echo "contact not found";
}

?>
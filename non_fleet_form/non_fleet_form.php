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

	
}	
}


else{
	echo "contact not found";
}

?>

<html>
<head>
	<title>
		Microsoft Word - 38118152_ATU+Non-Fleet+App+(1-5+units)
	</title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body{
	margin:0;
	font-family: Arial;
	}
	</style>
	</head>
	<body>
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td cellspacing="0">
	<table width="800" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center" cellspacing="0">
	<table width="100%" align="center" height="60" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
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
			<input type="text" name="Submitting Agency" class='submitting_agency' id="submitting_agency" width="100%" style="width:314px;border: 0;font-size:14px;"/>
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
			<input type="text" name="Contact Person" class='contact_person' id="Contact_Person" width="100%" style="width:160px;border: 0;font-size:14px;"/>
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
						<input type="text" name="Applicant Name" class='applicant_name' id="applicant_name" value="<?php echo $first_name;?>" width="100%" style="width:360px;border: 0;font-size:14px;"/>
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
						<input type="text" name="Effective Date" class='effective_date' id="effective_date" value="<?php echo $effective_date; ?>" width="100%" style="width:125px;border: 0;font-size:14px;"/>
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
						<input type="text" name="Garaging Address" class='garaging_address' id="garaging_address" value="<?php echo $garaging_address; ?>" width="100%" style="width:360px;border: 0;font-size:14px;"/>
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
						<input type="text" name="DOT" class='dot' id="dot" width="100%" value="<?php echo $USDOT_Assigned_to; ?>" style="width:125px;border: 0;font-size:14px;"/>
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
					<input type="text" name="City" class='City' id="City" value="<?php  ?>"  style="width:110px;border: 0;font-size:14px;"/>
				</td>
				<td align="center">
					<input type="text" name="State" class='State' id="State" value="<?php  ?>" style="width:110px;border: 0;font-size:14px;"/>
				</td>
				<td align="center">
					<input type="text" name="Zip" class='Zip' id="Zip" value="<?php  ?>" style="width:110px;border: 0;font-size:14px;"/>
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
						<input type="text" name="Years in Bus:" class='years_in_bus:' id="years_in_bus" value="<?php echo $Yrs_in_business; ?>" width="100%" style="width:125px;border: 0;font-size:14px;"/>
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
	<table align="left" width="50%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-right: 1px solid #000000;">	
			<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30"  style="font-size:12px;">
						Mailing Address:
					</td>
				</tr>
			</table>
			<table align="left" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Mailing Address" class='mailing_address' id="mailing_address" value="<?php echo $Mailing_Address; ?>" width="100%" style="width:100%;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<table align="right" width="50%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" width="140" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						City, State, Zip:
					</td>
				</tr>
			</table>
<table align="left" cellpadding="6" cellspacing="0">
		<tr>
			<td align="center">
				<input type="text" name="City2" class='City2' id="City2" value="<?php  ?>"  style="width:110px;border: 0;font-size:14px;"/>
			</td>
			<td align="center">
				<input type="text" name="State2" class='State2' id="State2" value="<?php  ?>" style="width:110px;border: 0;font-size:14px;"/>
			</td>
			<td align="center">
				<input type="text" name="Zip2" class='Zip2' id="Zip2" value="<?php  ?>" style="width:110px;border: 0;font-size:14px;"/>
			</td>
		</tr>
	</table>
		
		<!--new code-->	

			
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-bottom:2px solid #000;">
	<tr>
	<td align="left">
	<table align="left" width="33.3%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-right: 1px solid #000000;">	
			<table align="left" width="140"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30"  style="font-size:12px;">
						Contact Name: 
					</td>
				</tr>
			</table>
			<table align="left" width="123" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Contact Name" class='contact_name' id="contact_name" value="<?php echo $first_name; ?>" width="100%" style="width:100%;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<table align="right" width="33.3%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" width="40%" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						Phone #: 
					</td>
				</tr>
			</table>
			<table align="left" width="123" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="Phone" class='phone' id="Phone" value="<?php echo $phone_number; ?>"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<table align="right" width="33.3%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
		<td align="left" style="border-left: 1px solid #000000;">		
			<table align="left" width="40%" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
				<tr>
					<td align="center" height="30" style="font-size:12px;">
						E-mail Address:
					</td>
				</tr>
			</table>
			<table align="left" width="123" cellpadding="6" cellspacing="0">
				<tr>
					<td align="center">
						<input type="text" name="e-mail" class='e-mail' id="e-mail" value="<?php echo $E_mail_Address; ?>" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" height="10">
	<tr>
	<td>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Applicant Information</b>
	</td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td>
	<table align="left" width="25%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-right: 1px solid #000000;">	
	<table align="left" width="100"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30"  style="font-size:12px;">
			0-100 Miles 
		</td>
	</tr>
	</table>
	<table align="left" width="86" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="miles" class='miles' id="miles" value="<?php echo $Radious_0_50_miles; ?>" width="100%" style="width:86;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="right" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-left: 1px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			100-300 Miles 
		</td>
	</tr>
	</table>
	<table align="left" width="86" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="miles_2" class='miles_2' id="miles_2" value="<?php echo $Radious_50_200_miles; ?>" width="100%" style="width:86px;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="right" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-left: 1px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			300-500 Miles
		</td>
	</tr>
	</table>
	<table align="left" width="86" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="miles_3" class='miles_3' id="miles_3" value="<?php echo $Radious_400_miles; ?>" width="100%" style="width:86;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="right" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border-left: 1px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			500 Miles + 
		</td>
	</tr>
	</table>
	<table align="left" width="86" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="miles_4" class='miles_4' id="miles_4" value="<?php echo $Radious_600_miles; ?>" width="100%" style="width:86;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td>
	<table align="left" width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-top:2px solid #000;">
	<tr>
	<td align="left">	
	<table align="left" width="295"  cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30"  style="font-size:12px;">
			Major cities travelled through:
		</td>
	</tr>
	</table>
	<table align="left" width="500" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="major" class='major' id="major" width="100%" style="width:86;border: 0;font-size:14px;"/>
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="33.3%" align="left" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" align="left" height="30" cellpadding="3" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td style="font-size:12px;">
	<b>Auto Liability Coverage</b>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			CSL:
		</td>
	</tr>
	</table>
	<table align="left" width="143" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="csl" class='csl' id="csl" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			UM/UIM:
		</td>
	</tr>
	</table>
	<table align="left" width="143" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="UM/UIM:" class='um/uim' id="um/uim" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			PIP:
		</td>
	</tr>
	</table>
	<table align="left" width="143" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="pip" class='pip' id="pip" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="33.3%" align="left" cellpadding="0" cellspacing="0" style="padding: 0 10px;">
	<tr>
	<td>
	<table width="100%" align="left" height="30" cellpadding="3" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td style="font-size:12px;">
	<b>Physical Damage Coverage </b>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Deductible:
		</td>
	</tr>
	</table>
	<table align="left" width="142" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="deductible" class='deductible' id="deductible" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="comprehensive" class='comprehensive' id="comprehensive" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="200" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Comprehensive / Collision
		</td>
	</tr>
	</table>																	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="specified" class='specified' id="specified" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>																
	<table align="left" width="200" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			 Specified Perils / Collision 
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="33.3%" align="left" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" align="left" height="30" cellpadding="3" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td style="font-size:12px;">
	<b>Motor Truck Cargo Coverage</b>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Limit:
		</td>
	</tr>
	</table>
	<table align="left" width="142" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="limit" class='limit' id="limit" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Deductible:
		</td>
	</tr>
	</table>
	<table align="left" width="142" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="deductible" class='deductible' id="deductible" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="reefer" class='reefer' id="reefer" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>																
	<table align="left" width="200" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			 Reefer Breakdown?
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Additional Coverages </b>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left">
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="hired" class='hired' id="hired" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>																
	<table align="left" width="160" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			 Hired Auto
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="owned" class='owned' id="owned" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>																
	<table align="left" width="160" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Non-Owned Auto 
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="truckers" class='truckers' id="truckers" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>																
	<table align="left" width="160" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Truckers GL (99793)
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">																
	<table align="left" width="100%" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Provide ACORD 126 to bind
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="30%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left">
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="110" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="31" style="font-size:12px;">
			Cost of Hire 
		</td>
	</tr>
	</table>
	<table align="left" width="110" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="Cost" class='cost' id="cost" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="110" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="31" style="font-size:12px;">
			# of Employees 
		</td>
	</tr>
	</table>
	<table align="left" width="110" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="employees" class='employees' id="employees" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="110" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="31" style="font-size:12px;">
			Non-Driver Payroll 
		</td>
	</tr>
	</table>
	<table align="left" width="110" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="payroll" class='payroll' id="payroll" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;">		
	<table align="left" width="110" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			# of Owners 
		</td>
	</tr>
	</table>
	<table align="left" width="110" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="owners" class='owners' id="owners" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="45.2%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;width:50%;">		
	<table align="left" width="30" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="checkbox" name="interchange" class='interchange' id="interchange" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="140" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			 Trailer Interchange 
		</td>
	</tr>
	</table>		
	</td>
	<td align="left" style="border: 2px solid #000000;width:50%;">			
	<table align="left" width="60" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			Limit:
		</td>
	</tr>
	</table>
	<table align="left" width="100" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="limit" class='limit' id="limit" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;width:50%;">			
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			# of Trailers 
		</td>
	</tr>
	</table>
	<table align="left" width="250" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="trailers" class='trailers' id="trailers" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;width:50%;">			
	<table align="left" width="100" cellpadding="6" cellspacing="0" bgcolor="#eeece1">
	<tr>
		<td align="center" height="30" style="font-size:12px;">
			# of Days Active
		</td>
	</tr>
	</table>
	<table align="left" width="250" cellpadding="6" cellspacing="0">
	<tr>
		<td align="center">
			<input type="text" name="active" class='active' id="active" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	<tr>
	<td align="left" style="border: 2px solid #000000;width:50%;">			
	<table align="left" width="100%" height="32" cellpadding="6" cellspacing="0">
	<tr>
		<td align="left" height="30" style="font-size:12px;">
			Is a signed interchange agreement in place?
			<input type="checkbox" name="interchange" class='interchange' id="interchange">Yes
			<input type="checkbox" name="place" class='place' id="place">No
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
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" height="10">
	<tr>
	<td>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Vehicle Schedule  </b>
	</td>
	</tr>
	</table>
	<table align="left" width="45%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Tractors (Year, Make) 
	</td>
	</tr>
	</table>
<?php
$query21 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='1981 or newer vehicle'";
$result21 = pg_query($query21);
$rows21 = pg_num_rows($result21);
if($rows21>=1){
while ($row21 = pg_fetch_assoc($result21)) { 
?>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Tractors1" class='tractors' id="tractors1" value="<?php echo $row21['year']; ?>" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
<?php
}
}
?>
	</td>
	</tr>
	</table>
	<table align="left" width="30%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	VIN 
	</td>
	</tr>
	</table>
	<?php
$query2 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='1981 or newer vehicle'";
$result2 = pg_query($query2);
$rows2 = pg_num_rows($result2);
if($rows2>=1){
	while ($row2 = pg_fetch_assoc($result2)) { 
?>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN1" class='vin' id="vin1" width="100%"  value="<?php echo $row2['vin']; ?>" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<?php
}
}
?>	
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Stated Amount 
	</td>
	</tr>
	</table>
<?php
$query22 = "SELECT * FROM public.contact_vehicles where contact_id='$contact_id' AND vehicle_type='1981 or newer vehicle'";
$result22 = pg_query($query22);
$rows22 = pg_num_rows($result22);
if($rows22>=1){
while ($row22 = pg_fetch_assoc($result22)) { 
?>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated1" class='Stated' id="Stated1"  value="<?php echo $rows22['value']; ?>" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
<?php
}
}
?>	
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table align="left" width="45%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Tractors (Year, Make) 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Make1" class='tractors' id="Make1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Make2" class='tractors' id="Make2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Make3" class='tractors' id="Make3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Make4" class='tractors' id="Make4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Make5" class='tractors' id="Make5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="30%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	VIN 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new" class='tractors' id="VIN_new1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new2" class='tractors' id="VIN_new2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new3" class='tractors' id="VIN_new3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new" class='tractors' id="VIN_new4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new" class='tractors' id="VIN_new5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Stated Amount 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount1" class='tractors' id="Amount1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount2" class='tractors' id="Amount2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount3" class='tractors' id="Amount3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount4" class='tractors' id="Amount4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount5" class='tractors' id="Amount5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" align="center" height="60" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
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
	<table width="100%" align="center" height="6" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<table width="100%" height="30" align="center" bgcolor="#c6d9f1" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;width: 30%;">				
	<b>Drivers</b>
	</td>
	<td align="left" style="font-size: 12px;width: 70%;">				
	<b>* * Employed drivers, including owner = E | Independent Contractors = O</b>
	</td>
	</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table align="left" width="25%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" height="42" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Name 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Name1" class='name' id="name1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name2" class='name' id="name2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name3" class='name' id="name3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name4" class='name' id="name4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name5" class='name' id="name5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="5%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	E/O*
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="e/o1" class='e/o' id="e/o1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="e/o2" class='e/o' id="e/o2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="e/o3" class='e/o' id="e/o3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="e/o4" class='e/o' id="e/o4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="e/o5" class='e/o' id="e/o5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="20%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	State & License #  
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state & license1" class='state&license' id="state&license1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state&license2" class='state&license' id="state&license2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state&license3" class='state&license' id="state&license3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state&license4" class='state&license' id="state&license4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state&license5" class='state&license' id="state&license5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="12%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Years of Experience
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Years of Experience1" class='experience' id="experience1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Years of Experience2" class='experience' id="experience2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Years of Experience3" class='experience' id="experience3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Years of Experience4" class='experience' id="experience4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Years of Experience5" class='experience' id="experience5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="12%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Date of Birth
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth1" class='birth' id="birth" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth2" class='birth' id="birth1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth2" class='birth' id="birth2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth4" class='birth' id="birth3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth5" class='birth' id="birth4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="10.9%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Date of Hire 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date1" class='date' id="date" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date2" class='date' id="date1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date3" class='date' id="date2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date4" class='date' id="date3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date5" class='date' id="date4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="10%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="42"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	# Accidents/Violations
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations1" class='Violations' id="Violations1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations2" class='Violations' id="Violations2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations3" class='Violations' id="Violations3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations4" class='Violations' id="Violations4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations5" class='Violations' id="Violations5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Cargo Carried</b>
	</td>
	</tr>
	</table>
	<table align="left" width="30%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Commodity  
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Commodity1" class='commodity' id="commodity" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Commodity2" class='commodity' id="commodity1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Commodity3" class='commodity' id="commodity2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Commodity4" class='commodity' id="commodity3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Commodity5" class='commodity' id="commodity4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="20%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	% Hauled  
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled1" class='hauled' id="hauled1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled2" class='hauled' id="hauled2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled3" class='hauled' id="hauled3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled4" class='hauled' id="hauled4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled5" class='hauled' id="hauled5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Maximum Value 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value1" class='value' id="value" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value2" class='value' id="value1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value3" class='value' id="value2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value4" class='value' id="value3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value5" class='value' id="value4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Stated Amount 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount1" class='tractors' id="Stated_Amount1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount2" class='tractors' id="Stated_Amount2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount3" class='tractors' id="Stated_Amount3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount4" class='tractors' id="Stated_Amount4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount5" class='tractors' id="Stated_Amount5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Operation History</b>
	</td>
	</tr>
	</table>
	<table align="left" width="30%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="60"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Projected Year  
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Current Year 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	1 Years Prior 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	2 Years Prior
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="20%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	# of Power Units
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box1" class='Units' id="Units_box1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box2" class='Units' id="Units_box2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box3" class='Units' id="Units_box3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box4" class='Units' id="Units_box4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Total Miles 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles1" class='Total' id="Total_Miles1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles2" class='Total' id="Total_Miles2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles3" class='Total' id="Total_Miles3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles4" class='Total' id="Total_Miles4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="25%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Gross Receipts
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts1" class='Receipts' id="Receipts1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts2" class='Receipts' id="Receipts2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts3" class='Receipts' id="Receipts3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts4" class='Receipts' id="Receipts4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Loss History</b>
	</td>
	</tr>
	</table>
	<table align="left" width="15%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%" height="60"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">

	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Current Year 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	1 Years Prior 
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	2 Years Prior
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="28.3%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	# of Power Units
	</td>
	</tr>
	</table>
	<table align="left" width="50%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%" height="32" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td align="center">
			# of Losses 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Power_new2" class='Units' id="Power_new2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Power_new3" class='Units' id="Power_new3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Power_new4" class='Units' id="Power_new4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="50%" align="right" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" height="32" bgcolor="#eeeeef" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			Total Incurred 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred1 " class='Incurred' id="Total_Incurred1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred2" class='Incurred' id="Total_Incurred2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred3" class='Incurred' id="Total_Incurred3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="28.4%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Physical Damage 
	</td>
	</tr>
	</table>
	<table align="left" width="50%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%" height="32" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td align="center">
			# of Losses 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Losses_Damage1" class='Damage' id="Damage2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Losses_Damage2" class='Damage' id="Damage3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Losses_Damage3" class='Damage' id="Damage4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="50%" align="right" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" height="32" bgcolor="#eeeeef" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			Total Incurred 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred_1" class='Damage' id="Damage5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred_2" class='Damage' id="Damage6" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred_3" class='Damage' id="Damage7" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table align="left" width="28.3%" cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="center">
	Motor Truck Cargo
	</td>
	</tr>
	</table>
	<table align="left" width="50%" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%" height="32" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td align="center">
			# of Losses 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck1" class='Cargo' id="Cargo2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck2" class='Cargo' id="Cargo3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck3" class='Cargo' id="Cargo4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<table width="50%" align="right" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" height="32" bgcolor="#eeeeef" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			Total Incurred 
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck4" class='Cargo' id="Cargo5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck5" class='Cargo' id="Cargo6" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck6" class='Cargo' id="Cargo7" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#c6d9f1" style="border: 2px solid #000000;">
	<tr>
	<td>
	<table width="100%" height="30" align="center" cellpadding="3" cellspacing="3" style="border-bottom: 1px solid #000000;">
	<tr>
	<td align="left" style="font-size: 12px;">				
	<b>Additional Questions </b>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="0" cellspacing="0" bgcolor="#eeeeef">
	<tr>
	<td>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#fff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td align="left">
	Does the applicant have any owned, leased or operated equipment not listed on the vehicle schedule? <input type="checkbox" name="schedule" class='schedule' id="schedule"> Yes  <input type="checkbox" name="schedule" class='schedule2' id="schedule2"> No
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Are any vehicles leased, loaned or rented to others? <input type="checkbox" name="schedule" class='schedule' id="schedule"> Yes  <input type="checkbox" name="schedule" class='schedule2' id="schedule2"> No
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Has the applicant’s policy canceled or non-renewed in the prior 3 years? <input type="checkbox" name="schedule" class='schedule' id="schedule"> Yes  <input type="checkbox" name="schedule" class='schedule2' id="schedule2"> No
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
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="100%" align="center" height="60" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
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
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" style="font-size:12px;">	
	<b>Attention all applicants in the states of AL, AR, AZ, CO, DE, FL, IN, KY, MN, NH, NJ, NY, OH, OK, PA, TN, UT – For
	your protection, the preceding states’ laws require the following to appear on this form:</b> Any person who knowingly,
	and with intent to defraud any insurance company or other person, files an application for insurance or statement of claim
	containing any materially false, incomplete, or misleading information, or conceals information concerning any material fact
	thereto, commits a fraudulent insurance act, which is a crime punishable by incarceration, and shall also be subject to civil
	penalties. 
	</td>
	</tr>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<tr>
	<td align="left" style="font-size:12px;">	
	<b>For risks located in New York, Pennsylvania, and California: </b> Any person who knowingly makes
	or assists, abets, solicits	or conspires with another to make a false or misleading reports or the theft, destruction, damage
	or conversion of any motor vehicle to a law enforcement agency, a state department of motor vehicles, or an insurance company,
	commits perjury or a fraudulent insurance act, which are crimes punishable by incarceration, and shall also be subject to a
	civil penalty. 
	</td>
	</tr>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<tr>
	<td align="left" style="font-size:12px;">	
	The Applicant hereby applies to the Company for a policy of insurance as set forth in this application on the basis of
	statements contained herein. Applicant agrees that such policy shall be null and void if such information is materially false or
	misleading so that the Company would have rejected the risk, prior to inception. Applicant understands that an inquiry may
	be made which will provide applicable information concerning character, general reputation, financial stability and other
	pertinent financial data, personal characteristics, mode of living or other background information the company deems
	necessary in order to determine whether the Company will accept or reject Applicant for coverage. Upon written request,
	additional information as to the nature and scope of the inquiry, if one is made, will be provided. The Applicant understands
	this application is a request for quotation and no information provided herein shall be construed by either party as creating a
	binding contract for insurance. 
	</td>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr>
	</table>
	<table width="800" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; style="border:2px solid #000;">
	<tr>
	<td  width="70%">
	<input type="text" name="Cargo" class='Cargo' id="Cargo7" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="Cargo" class='Cargo' id="Cargo7"  style="width:100%;">
	</td>
	</tr>														
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr></table>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; >
	<tr>
	<td  width="70%"> 
	Signature of Applicant
	</td>
	<td  width="30%">
	Date
	</td>
	</tr>														
	</table>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; style="border:2px solid #000;">
	<tr>
	<td  width="70%"> 
	<input type="text" name="Cargo" class='Cargo' id="Cargo7" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="Cargo" class='Cargo' id="Cargo7"  style="width:100%;">
	</td>
	</tr>														
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr></table>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; >
	<tr>
	<td  width="70%"> 
	Signature of Applicant
	</td>
	<td  width="30%">
	Date
	</td>
	</tr>														
	</table>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; style="border:2px solid #000;">
	<tr>
	<td  width="70%">
	<input type="text" name="Cargo" class='Cargo' id="Cargo7" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="Cargo" class='Cargo' id="Cargo7"  style="width:100%;">
	</td>
	</tr>														
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr></table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr></table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	<table width="50%" align="left" height="10" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left">
			<button style="background: #004d96;color: #fff;border: 0;padding: 10px 35px;text-transform: capitalize;">print</button>
		</td>
	</tr>
	</table>
	<table width="50%" align="right" height="10" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right">
			<button style="background: #004d96;color: #fff;border: 0;padding: 10px 35px;text-transform: capitalize;">Save</button>
		</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
		</tr>
	</table>
</body>
</html>
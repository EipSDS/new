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

if(isset($_POST['submit'])){

require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Agency Infornmation');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
	
}

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

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$myhtml = '
<html>
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
						<input type="text" name="Mailing_Address" class="mailing_address" id="mailing_address" value="'.$Mailing_Address.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
				<input type="text" name="City2" class="City2" id="City2" value="'.$City_Two.'"  style="width:74px;border: 0;font-size:14px;"/>
			</td>
			<td align="center">
				<input type="text" name="State2" class="State2" id="State2" value="'.$State_Two.'" style="width:74px;border: 0;font-size:14px;"/>
			</td>
			<td align="center">
				<input type="text" name="Zip2" class="Zip2" id="Zip2" value="'.$ZIP_Code_Two.'" style="width:73px;border: 0;font-size:14px;"/>
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
						<input type="text" name="Contact Name" class="contact_name" id="contact_name" value="'.$first_name.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
						<input type="text" name="Phone" class="phone" id="Phone" value="'.$phone_number.'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
						<input type="text" name="e-mail" class="e-mail" id="e-mail" value="'.$E_mail_Address.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
';
$myhtml2='
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
			<input type="text" name="miles" class="miles" id="miles" value="'.$Radious_0_50_miles.'" width="100%" style="width:86;border: 0;font-size:14px;"/>
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
			<input type="text" name="miles_2" class="miles_2" id="miles_2" value="'.$Radious_50_200_miles.'" width="100%" style="width:86px;border: 0;font-size:14px;"/>
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
			<input type="text" name="miles_3" class="miles_3" id="miles_3" value="'.$Radious_400_miles.'" width="100%" style="width:86;border: 0;font-size:14px;"/>
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
			<input type="text" name="miles_4" class="miles_4" id="miles_4" value="'.$Radious_600_miles.'" width="100%" style="width:86;border: 0;font-size:14px;"/>
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
			<input type="text" name="major" class="major" id="major" value="'.$rows88["major_cities"].'" width="100%" style="width:450;border: 0;font-size:14px;"/>
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
			<input type="text" name="csl" class="csl" id="csl" value="'.$row55["csl"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
			<input type="hidden" name="cslid" class="csl" id="cslid" value="'.$row55["id"].'"/>
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
			<input type="text" name="UM_UIM:" class="um_uim" id="um_uim" value="'.$row55["um_uim"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="pip" class="pip" id="pip" value="'.$row55["pip"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="deductible" class="deductible" id="deductible" value="'.$row55["deductible"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="checkbox" name="comprehensive" class="comprehensive" id="comprehensive" value="" width="100%" style="width:100%;border: 0;font-size:14px;" '.$row55["comprehensive"].'/>
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
			<input type="checkbox" name="specified" class="specified" id="specified" value="yes" width="100%" style="width:100%;border: 0;font-size:14px;" '.$row55["specified_perils"].'/>
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
			<input type="text" name="limit" class="limit" id="limit" width="100%" value="'.$row55["cargo_limit"].'" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="motor_deductible" class="motor_deductible" id="motor_deductible" value="'.$row55["truck_cargo_deductible"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="checkbox" name="reefer" class="reefer" id="reefer" value="yes" width="100%" style="width:100%;border: 0;font-size:14px;"'.$row55["reefer_breakdown"].'/>
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
';	
$myhtml3='
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
			<input type="checkbox" name="hired" class="hired" id="hired" value="yes"  width="100%" style="width:100%;border: 0;font-size:14px;" '.$hired_auto=$row67["hired_auto"].'/>
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
			<input type="checkbox" name="owned" class="owned" id="owned" value="yes" width="100%" style="width:100%;border: 0;font-size:14px;" '.$row67["non_owned_auto"].'/>
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
			<input type="checkbox" name="truckers" class="truckers" value="yes" id="truckers" width="100%" style="width:100%;border: 0;font-size:14px;" '.$row67["truckers_gl"].'/>
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
			<input type="text" name="cost" class="cost" id="cost" value="'.$cost_of_hire.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
			<input type="hidden" name="Cost_id" class="cost" id="Cost_id" value="'.$new1_id.'"/>
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
			<input type="text" name="employees" class="employees" id="employees" width="100%" value="'.$of_employees.'" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="payroll" class="payroll" id="payroll" value="'.$non_driver_payroll.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="owners" class="owners" id="owners" value="'.$of_owners.'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="checkbox" name="interchange" class="interchange" id="interchange" value="yes" width="100%" style="width:100%;border: 0;font-size:14px;" '.$row67["trailer_interchange"].'/>
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
			<input type="text" name="coverage_limit" class="coverage_limit" value="'.$additional_coverage_limit.'" id="coverage_limit" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="trailers" class="trailers" id="trailers" value="'.$of_trailers.'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="active" class="active" id="active" value="'.$of_days_active.'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="checkbox" name="interchange_agreement" class="check" value="" id="interchange_agreement" '.$row67["interchange_agreement"].' >Yes
			<input type="checkbox" name="interchange_agreement_no" value="" class="check" id="interchange_agreement_no" '.$row67["no_interchange"].'>No
		</td>
		<script>
$(document).ready(function(){
    $(".check").click(function() {
        $(".check").not(this).prop("checked", false);
    });
});
</script>
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
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Tractors1id" class="tractors" id="Tractors1id" value="'.$row6["id"].'"/>
	<input type="text" name="Tractors1" class="tractors" id="Tractors1" value="'.$row6["year"].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="make1" class="tractors" id="make1" value="'.$row6["make"].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Tractors2id" class="Tractors2id" id="Tractors2id" value="'.$arrayid[0].'"/>
	<input type="text" name="Tractors2" class="tractors" id="Tractors2" value="'.$arrayyear[0].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	<input type="text" name="make2" class="tractors" id="make2" value="'.$arraymake[0].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Tractors3id" class="Tractors3id" id="Tractors3id" value="'.$arrayid[1].'"/>	
	<input type="text" name="Tractors3" class="tractors" id="Tractors3" value="'.$arrayyear[1].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	<input type="text" name="make3" class="tractors" id="make3" value="'.$arraymake[1].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Tractors4id" class="Tractors4id" id="Tractors4id" value="'.$arrayid[2].'"/>
	<input type="text" name="Tractors4" class="tractors" id="Tractors4" value="'.$arrayyear[2].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	<input type="text" name="make4" class="tractors" id="make4" value="'.$arraymake[2].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Tractors5id" class="Tractors5id" id="Tractors5id" value="'.$arrayid[3].'"/>
	<input type="text" name="Tractors5" class="tractors" id="Tractors5" value="'.$arrayyear[3].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
	<input type="text" name="make5" class="tractors" id="make5" value="'.$arraymake[3].'" width="48%" style="width:48%;border: 0;font-size:14px;"/>
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
	<input type="text" name="VIN1" class="vin" id="VIN1" value="'.$row6["vin"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VINid1" class="vin" id="VINid1" value="'.$row6["id"].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="vin2" class="tractors" id="vin2" value="'.$arrayvin[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="VINid2" class="vin" id="VINid2" value="'.$arrayid[0].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="vin3" class="tractors" id="vin3" value="'.$arrayvin[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="VINid3" class="vin" id="VINid3" value="'.$arrayid[1].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="vin4" class="tractors" id="vin4" value="'.$arrayvin[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="VINid4" class="vin" id="VINid4" value="'.$arrayid[2].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="vin5" class="tractors" id="vin5" value="'.$arrayvin[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="VINid5" class="vin" id="VINid5" value="'.$arrayid[3].'"/>
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
	<input type="text" name="Stated1" class="Stated" id="Stated1" value="'.$row6["value"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated2" class="tractors" id="Stated2" value="'.$arrayvalue[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated3" class="tractors" id="Stated3" value="'.$arrayvalue[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated4" class="tractors" id="Stated4" value="'. $arrayvalue[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated5" class="tractors" id="Stated5" value="'. $arrayvalue[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
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
	Trailers (Year, Make)
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="trailer1id" class="trailer1id" id="trailer1id" value="'.$row9["id"].'"/>
	<input type="text" name="trailer1" class="tractors" id="trailer1" value="'.$row9["year"].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="trailermake1" class="tractors" id="trailermake1" value="'.$row9["make"].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="trailer2id" class="trailer2id" id="trailer2id" value="'.$arrid[0].'"/>
	<input type="text" name="trailer2" class="tractors" id="trailer2" value="'.$arryear[0].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="trailermake2" class="tractors" id="trailermake2" value="'.$arrmake[0].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="trailer3id" class="trailer3id" id="trailer3id" value="'.$arrid[1].'"/>
	<input type="text" name="trailer3" class="tractors" id="trailer3" value="'.$arryear[1].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="trailermake3" class="tractors" id="trailermake3" value="'.$arrmake[1].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="trailer4id" class="trailer4id" id="trailer4id" value="'.$arrid[2].'"/>
	<input type="text" name="trailer4" class="tractors" id="trailer4" value="'.$arryear[2].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="trailermake4" class="tractors" id="trailermake4" value="'.$arrmake[2].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="trailer5id" class="trailer5id" id="trailer5id" value="'.$arrid[3].'"/>
	<input type="text" name="trailer5" class="tractors" id="trailer5" value="'.$arryear[3].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
	<input type="text" name="trailermake5" class="tractors" id="trailermake5" value="'.$arrmake[3].'" width="45%" style="width:45%;border: 0;font-size:14px;"/>
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

	<input type="text" name="VIN_new" class="vin" id="VIN_new" value="'.$row9["vin"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VIN_newid1" class="vin" id="VIN_newid1" value="'.$row9["id"].'"/>	
	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new2" class="vin" id="VIN_new2" value="'.$arrvin[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VIN_newid2" class="vin" id="VIN_newid2" value="'.$arrid[0].'"/>	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new3" class="vin" id="VIN_new3" value="'.$arrvin[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VIN_newid3" class="vin" id="VIN_newid3" value="'.$arrid[1].'"/>	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new4" class="vin" id="VIN_new4" value="'.$arrvin[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VIN_newid4" class="vin" id="VIN_newid4" value="'.$arrid[2].'"/>	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="VIN_new5" class="vin" id="VIN_new5" value="'.$arrvin[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
    <input type="hidden" name="VIN_newid5" class="vin" id="VIN_newid5" value="'.$arrid[2].'"/>
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
	<input type="text" name="Amount1" class="tractors" id="Amount1" value="'.$row9["value"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount2" class="tractors" id="Amount2" value="'.$arrvalue[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount3" class="tractors" id="Amount3" width="100%" value="'.$arrvalue[1].'" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount4" class="tractors" id="Amount4" value="'.$arrvalue[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Amount5" class="tractors" id="Amount5" value="'.$arrvalue[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="Name1" class="Name1" id="Name1" width="100%" value="'.$drivername.'" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="name1id" class="name1id" id="name1id" value="0"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name2" class="name" id="name2" width="100%" value="'.$driver_Name11.'" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="name2id" class="name2id" id="name2id" value="1"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name3" class="name" id="name3" width="100%" value="'.$driver_Name12.'" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="name3id" class="name3id" id="name3id" value="2"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name4" class="name" id="name4" value="'.$driver_Name13.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="name4id" class="name4id" id="name4id" value="3"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="name5" class="name" id="name5" value="'.$driver_Name14.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="name5id" class="name5id" id="name5id" value="4"/>
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
	<input type="text" name="eo1" class="eo1" id="eo1" value="'.$Owner_Driver.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="eo2" class="eo2" id="eo2" value="'.$Owner_Driver1.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="eo3" class="eo3" id="eo3"  value="'.$Owner_Driver2.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="eo4" class="eo4" id="eo4" value="'.$Owner_Driver3.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="eo5" class="eo5" id="eo5" value="'.$Owner_Driver4.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	License & State #  
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state_license1" class="state&license" id="state_license1" value="'.$LicenceNo.'" width="49%" style="width:49%;border: 0;font-size:14px;"/>
	<input type="text" name="License_State" class="License_State" id="License_State" value="'.$License_State.'" width="49%" style="width:48%;border: 0;font-size:14px;"/>
	
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state_license2" class="state_license2" value="'.$LicenceNo1.'" id="state_license2" width="49%" style="width:49%;border: 0;font-size:14px;"/>
	<input type="text" name="License_State1" class="License_State1" id="License_State1" value="'.$License_State1.'" width="49%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state_license3" class="state_license3" id="state_license3" value="'.$LicenceNo2.'" width="49%" style="width:49%;border: 0;font-size:14px;"/>
	<input type="text" name="License_State2" class="License_State2" id="License_State2" value="'.$License_State2.'" width="49%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state_license4" class="state_license4" id="state_license4" value="'.$LicenceNo3.'" width="49%" style="width:49%;border: 0;font-size:14px;"/>
	<input type="text" name="License_State3" class="License_State3" id="License_State3" value="'.$License_State3.'" width="49%" style="width:48%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="state_license5" class="state_license5" id="state_license5" value="'.$LicenceNo4.'" width="49%" style="width:49%;border: 0;font-size:14px;"/>
	<input type="text" name="License_State4" class="License_State4" id="License_State4" value="'.$License_State4.'" width="49%" style="width:48%;border: 0;font-size:14px;"/>
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
	<input type="text" name="Years_of_Experience1" class="Years_of_Experience1" id="Years_of_Experience1" value="'.$Experience_Years.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="experience2" class="experience" id="experience2" value="'.$Experience_Years1.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="experience3" class="experience" id="experience3" value="'.$Experience_Years2.'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="experience4" value="'.$Experience_Years3.'" class="experience" id="experience4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="experience5" value="'.$Experience_Years4.'" class="experience" id="experience5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="birth1" value="'.$DOB.'" class="birth" id="birth1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth2" value="'.$DOB1.'" class="birth" id="birth2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth3" class="birth" value="'.$DOB2.'" id="birth3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth4" value="'.$DOB3.'" class="birth" id="birth4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="birth5" value="'.$DOB4.'" class="birth" id="birth5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="date1" value="'.$Hire_Date.'" class="date" id="date1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date2" value="'.$Hire_Date1.'" class="date" id="date2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date3" class="date" value="'.$Hire_Date2.'" id="date3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date4" value="'.$Hire_Date3.'" class="date" id="date4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="date5" value="'.$Hire_Date4.'" class="date" id="date5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="Violations1" class="Violations" id="Violations1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations2" class="Violations" id="Violations2" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations3" class="Violations" id="Violations3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations4" class="Violations" id="Violations4" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Violations5" class="Violations" id="Violations5" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="hidden" name="Commodity1id" class="Commodity1id" value ="'.$row4["id"].'" id="Commodity1id"/>
	<input type="text" name="Commodity1" class="Commodity1" value ="'.$row4["name"].'" id="Commodity1" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Commodity2id" class="Commodity2id" value ="'.$array_id[0].'" id="Commodity2id"/>
	<input type="text" name="Commodity2" class="Commodity2" id="Commodity2" value ="'.$array_name[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Commodity3id" class="Commodity3id" value ="'.$array_id[1].'" id="Commodity3id"/>
	<input type="text" name="Commodity3" class="Commodity3" id="Commodity3" value ="'.$array_name[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Commodity4id" class="Commodity4id" value ="'.$array_id[2].'" id="Commodity4id"/>
	<input type="text" name="Commodity4" class="commodity" id="Commodity4" value ="'.$array_name[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="hidden" name="Commodity5id" class="Commodity5id" value ="'.$array_id[3].'" id="Commodity5id" />
	<input type="text" name="Commodity5" class="commodity" id="Commodity5" value ="'.$array_name[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="hauled1" class="hauled" id="hauled1" value ="'.$row4["value"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled2" class="hauled" id="hauled2" value ="'.$array_value[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled3" class="hauled" id="hauled3" value ="'.$array_value[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled4" class="hauled" id="hauled4" value ="'.$array_value[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="hauled5" class="hauled" id="hauled5" value ="'.$array_value[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="Value1" class="value" id="Value1" value="'.$row4["max_value"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value2" class="value" id="Value2" value="'.$max_value[0].'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value3" class="value" id="Value3" value="'.$max_value[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value4" class="value" id="Value4" value="'.$max_value[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Value5" class="value" id="Value5" value="'.$max_value[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	Average Value
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount1" class="tractors" id="Stated_Amount1" value="'.$row4["average_value"].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount2" class="tractors" id="Stated_Amount2" value="'.$average_value[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount3" class="tractors" id="Stated_Amount3" value="'.$average_value[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount4" class="tractors" id="Stated_Amount4" value="'.$average_value[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Stated_Amount5" class="tractors" id="Stated_Amount5" value="'.$average_value[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
';	
$myhtml4='
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
	<input type="text" name="Units_box1" class="Units" id="Units_box1" value="'.$array3_units[0].'"  width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="Units_box1id" id="Units_box1id" value="'.$array3_id[0].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box2" class="Units" id="Units_box2" width="100%" value="'.$array3_units[1].'" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="Units_box2id" class="Units_box2id" id="Units_box2id" value="'.$array3_id[1].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box3" class="Units" id="Units_box3" value="'.$array3_units[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="Units_box3id" class="Units_box3id" id="Units_box3id" value="'.$array3_id[2].'"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Units_box4" class="Units" id="Units_box4" value="'.$array3_units[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	<input type="hidden" name="Units_box4id" class="Units_box4id" id="Units_box4id" value="'.$array3_id[3].'"/>
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
	<input type="text" name="Total_Miles1" class="Total" id="Total_Miles1" value="'.$array3_miles[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles2" class="Total" id="Total_Miles2" value="'.$array3_miles[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles3" class="Total" id="Total_Miles3" value="'.$array3_miles[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Total_Miles4" class="Total" id="Total_Miles4" value="'.$array3_miles[3].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	<input type="text" name="Receipts1" class="Receipts" id="Receipts1" width="100%"  value="'.$array3_receipts[0].'" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts2" class="Receipts" id="Receipts2" width="100%" value="'.$array3_receipts[1].'" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts3" class="Receipts" id="Receipts3" width="100%" value="'.$array3_receipts[2].'" style="width:100%;border: 0;font-size:14px;"/>
	</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	<input type="text" name="Receipts4" class="Receipts" id="Receipts4" width="100%" value="'.$array3_receipts[3].'" style="width:100%;border: 0;font-size:14px;"/>
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
	Liability
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
			<input type="text" name="Power_new2" class="Units" id="Power_new2" width="100%" value="'.$liability_of_losses[0].'" style="width:100%;border: 0;font-size:14px;"/>
			<input type="hidden" name="loss1id" class="loss1id" id="loss1id" value="'.$loss_id[0].'"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Power_new3" class="Units" id="Power_new3" width="100%" value="'.$liability_of_losses[1].'" style="width:100%;border: 0;font-size:14px;"/>
			<input type="hidden" name="loss2id" class="loss2id" id="loss2id" value="'.$loss_id[1].'"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Power_new4" class="Units" id="Power_new4" width="100%" value="'.$liability_of_losses[2].'" style="width:100%;border: 0;font-size:14px;"/>
			<input type="hidden" name="loss3id" class="loss3id" id="loss3id" value="'.$loss_id[2].'"/>
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
			<input type="text" name="Total_Incurred1 " class="Incurred" id="Total_Incurred1" width="100%"  value="'.$total_incurred[0].'" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred2" class="Incurred" id="Total_Incurred2" value="'.$total_incurred[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred3" class="Incurred" id="Total_Incurred3" value="'.$total_incurred[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="Losses_Damage1" class="Damage" id="Losses_Damage1" value="'.$physical_damage_losses[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Losses_Damage2" class="Damage" id="Losses_Damage2" value="'.$physical_damage_losses[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Losses_Damage3" class="Damage" value="'.$physical_damage_losses[2].'" id="Losses_Damage3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="Total_Incurred_1" class="Damage" id="Total_Incurred_1" width="100%" value="'.$physical_total_incurred[0].'" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred_2" class="Damage" id="Total_Incurred_2" value="'.$physical_total_incurred[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Total_Incurred_3" class="Damage" value="'.$physical_total_incurred[2].'" id="Total_Incurred_3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="Motor_Truck1" class="Cargo" id="Motor_Truck1" value="'.$truck_cargo_losses[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck2" class="Cargo" id="Motor_Truck2" value="'.$truck_cargo_losses[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck3" class="Cargo" value="'.$truck_cargo_losses[2].'" id="Motor_Truck3" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
			<input type="text" name="Motor_Truck4" class="Cargo" id="Motor_Truck4" value="'.$truck_cargo_total_incurred[0].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck5" class="Cargo" id="Motor_Truck5" value="'.$truck_cargo_total_incurred[1].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
		</td>
	</tr>
	</table>
	<table align="left" width="100%"  cellpadding="6" cellspacing="0" bgcolor="#ffffff" style="font-size:12px;border: 1px solid #000000;">
	<tr>
		<td>
			<input type="text" name="Motor_Truck6" class="Cargo" id="Motor_Truck6" value="'.$truck_cargo_total_incurred[2].'" width="100%" style="width:100%;border: 0;font-size:14px;"/>
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
	Does the applicant have any owned, leased or operated equipment not listed on the vehicle schedule? <input type="checkbox" name="schedule_yes" value="" class="schedule" id="schedule_yes" '.$row67["schedule_yes"].'> Yes  <input type="checkbox" name="schedule_no" value="" class="schedule" id="schedule_no" '.$row67["schedule_no"].'> No
	</td>
<script>
$(document).ready(function(){
    $(".schedule").click(function() {
        $(".schedule").not(this).prop("checked", false);
    });
});
</script>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px"  cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Are any vehicles leased, loaned or rented to others? <input type="checkbox" name="loaned_yes" value="yes" class="schedule2" id="loaned_yes" '.$row67["loaned_yes"].'> Yes  <input type="checkbox" name="loaned_no" class="schedule2" id="loaned_no" '.$row67["loaned_no"].'> No
	</td>
<script>
$(document).ready(function(){
    $(".schedule2").click(function() {
        $(".schedule2").not(this).prop("checked", false);
    });
});
</script>
	</tr>
	</table>
	<table align="left" width="100%"  height="32px" cellpadding="6" cellspacing="0" bgcolor="#eeeeef" style="font-size:12px;border: 1px solid #000000;">
	<tr>
	<td>
	Has the applicant’s policy canceled or non-renewed in the prior 3 years? <input type="checkbox" name="canceled_yes"  value="" class="canceled" id="canceled_yes"'.$row67["canceled_yes"].'> Yes  <input type="checkbox" name="canceled_no" value="" class="canceled" id="canceled_no" '.$row67["canceled_no"].'> No
	</td>
<script>
$(document).ready(function(){
    $(".canceled").click(function() {
        $(".canceled").not(this).prop("checked", false);
    });
});
</script>
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
	<input type="text" name="applicant_sig" class="applicant_sig" id="applicant_sig" value="'.$rows88["applicant_sig"].'" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="date11" class="date11" id="date11"  value="'.$rows88["date1"].'"  style="width:100%;">
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
	<input type="text" name="print_name" class="Cargo" id="print_name" value="'.$rows88["print_name"].'" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="title" class="Cargo" id="title" value="'.$rows88["date2"].'" style="width:100%;">
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
	Print Name
	</td>
	<td  width="30%">
	Title
	</td>
	</tr>														
	</table>
	<table cellpadding="0" cellspacing="0" WIDTH="100%"; style="border:2px solid #000;">
	<tr>
	<td  width="70%">
	<input type="text" name="agent_sig" class="Cargo" id="agent_sig" value="'.$rows88["title"].'" style="width:100%;">
	</td>
	<td  width="30%">
	<input type="text" name="date22" class="title" id="date22" value="'.$rows88["date2"].'"  style="width:100%;">
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
	Signature of Agent
	</td>
	<td  width="30%">
	Date
	</td>
	</tr>														
	</table>
	<table width="100%" align="center" height="10" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center">											
	</td>
	</tr></table>
<table>
	<div class="alert save_success" style="display:none;color:green;" id="final_thanku_message" align="right" style="display:none">
Thank you Form Data saved
</div>
</table>
	<input type="hidden" name="contactId" value="'.$_GET["contact_id"].'" placeholder="Phone Number" required class="contactId" />
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
	</fieldset>
  </div>
  </form>
</body>

</html>
';
	//echo $myhtml; die();
$mpdf->WriteHTML($myhtml);
$mpdf->WriteHTML($myhtml1);
$mpdf->WriteHTML($myhtml2);
$mpdf->WriteHTML($myhtml3);
$mpdf->WriteHTML($myhtml4);

$mpdf->Output('pdf/'.$_GET['contact_id'].'.pdf', 'F');
$mpdf->Output();


}


else{
	echo "contact not found";
}

?>
	 
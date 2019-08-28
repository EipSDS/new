<?php
$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
if($_POST['InsuranceHistory'])
{
$company_name2 = $_POST['input_companyname3'];
$company_name1 = $_POST['input_companyname2'];	
$company_name = $_POST['input_companyname1'];
if(!empty($company_name)){
   $contactId = $_POST['contactId'];
	$start_date = $_POST['pp'];
	$end_date = $_POST['policyperiod1'];
	$company_name = $_POST['input_companyname1'];
	$libility_number = $_POST['input_liabilitylosses1'];
	$libility_amount = $_POST['input_physicaldamage4'];
	$phsical_number = $_POST['physicaldamage9'];
	$phsical_amount = $_POST['physicaldamageammount'];	
	
	$query = "INSERT INTO public.insurance_history(start_date_one,end_date_one,company_one,liability_number_one,liability_amount_one,physical_number_one,physical_amount_one,contact_id) VALUES ('$start_date','$end_date','$company_name','$libility_number','$libility_amount','$phsical_number','$phsical_amount','$contactId')";
	$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 
}
    else if(!empty($company_name1))
{
	$contactId = $_POST['contactId'];
	$start_date1 = $_POST['perid_id_second'];
	$end_date1 = $_POST['perid_id_two_second'];
	$company_name1 = $_POST['input_companyname2'];
	$libility_number1 = $_POST['input_liabilitylosses2'];
	$libility_amount1 = $_POST['input_physicaldamag4'];
	$phsical_number1 = $_POST['physicaldamagenumber1'];
	$phsical_amount1 = $_POST['physicaldamageammount1'];


 $query = "INSERT INTO public.insurance_history(
	 start_date_two, end_date_two,company_two,liability_number_two,liability_amount_two,physical_number_two,physical_amount_two,contact_id
	 )
	VALUES ('$start_date1','$end_date1','$company_name1','$libility_number1','$libility_amount1 ','$phsical_number1','$phsical_amount1','$contactId')";
$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 


}
else if(!empty($company_name2))
{
	$contactId = $_POST['contactId'];
	$start_date2 = $_POST['perid_id_third'];
	$end_date2 = $_POST['perid_id_two_third'];
	$company_name2 = $_POST['input_companyname3'];
	$libility_number2= $_POST['input_liabilitylosses3'];
	$libility_amount2 = $_POST['input_physicaldamage6'];
	$phsical_number2 = $_POST['physicaldamagenumber8'];
	$phsical_amount2 = $_POST['physicaldamageammount8'];	
    //$conn = $this->pgConnect();


    $query = "INSERT INTO public.insurance_history(
      start_date_three,end_date_three,company_three,liability_number_three,liability_amount_three,physical_number_three,physical_amount_three,contact_id)VALUES('$start_date2','$end_date2','$company_name2','$libility_number2','$libility_amount2','$phsical_number2 ','$phsical_amount2','$contactId')";	
	$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 
}
else{
	echo "Data is not inserted";
}
}	 
?>
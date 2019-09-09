<?php
/*--------------------------------Database connection-----------------------------*/
$con = pg_connect("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
/*-------------------------------------------------------------*/
parse_str($_POST['dataform'], $form_data);
if($_POST['InsuranceHistory'] == "success")
{ 
/*---------------Conditions according to company Names----------------------------*/
$company_name2 = $_POST['input_companyname3'];
$company_name1 = $_POST['input_companyname2'];	
$company_name = $_POST['input_companyname1'];
/*--------------------------------close--------------------------------------------*/
/*----------------------1st condition for fields-----------------------------------*/
if(!empty($company_name)){
   $contact_Id = $_POST['contactId'];
	$start_date = $form_data['policy_perid'];
	$end_date = $form_data['policy_perid_two'];
	$company_name = $_POST['input_companyname1'];
	$liability_number = $_POST['input_liabilitylosses1'];
	$liability_amount = $_POST['input_physicaldamage4'];
	$physical_number = $_POST['physicaldamage9'];
	$physical_amount = $_POST['physicaldamageammount'];	
	/*------------------------Queries for insert data in database--------------------*/
	$query = "INSERT INTO public.insurance_history(contact_id,policy_start_date,policy_end_date,company_name,liability_number,liability_amount,physical_number,physical_amount) VALUES ('$contact_Id','$start_date','$end_date','$company_name','$liability_number','$liability_amount','$physical_number','$physical_amount')";
	$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 
}
/*-----------------------------------1st Condition Close------------------------------*/
/*------------------------2nd condition for fields------------------------------------*/
   if(!empty($company_name1))
{
	$contact_id = $_POST['contactId'];
	$start_date1 = $form_data['policy_perid_second'];
	$end_date1 = $form_data['policy_perid_two_second'];
	$company_name1 = $_POST['input_companyname2'];
	$libility_number1 = $_POST['input_liabilitylosses2'];
	$libility_amount1 = $_POST['input_physicaldamag4'];
	$phsical_number1 = $_POST['physicaldamagenumber1'];
	$phsical_amount1 = $_POST['physicaldamageammount1'];
/*------------------------2nd Query for insert data in database--------------------*/
 $query = "INSERT INTO public.insurance_history(contact_id,policy_start_date,policy_end_date,company_name,liability_number,liability_amount,physical_number,physical_amount)VALUES ('$contact_id','$start_date1','$end_date1','$company_name1','$libility_number1','$libility_amount1 ','$phsical_number1','$phsical_amount1')";
$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 

}
/*----------------------------- 2nd condition close--------------------------------------*/
/*----------------------------- 3rd condition Start--------------------------------------*/
if(!empty($company_name2))
{
	$contactId = $_POST['contactId'];
	$start_date2 = $form_data['policy_perid_third'];
	$end_date2 = $form_data['policy_perid_two_third'];
	$company_name2 = $_POST['input_companyname3'];
	$libility_number2= $_POST['input_liabilitylosses3'];
	$libility_amount2 = $_POST['input_physicaldamage6'];
	$phsical_number2 = $_POST['physicaldamagenumber8'];
	$phsical_amount2 = $_POST['physicaldamageammount8'];	
  /*------------------------3rd Query for insert data in database--------------------*/
    $query = "INSERT INTO public.insurance_history(contact_id,policy_start_date,policy_end_date,company_name,liability_number,liability_amount,physical_number,physical_amount)VALUES('$contactId','$start_date2','$end_date2','$company_name2','$libility_number2','$libility_amount2','$phsical_number2 ','$phsical_amount2')";	
	$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		} 
}
/*----------------------------- 3rd condition close--------------------------------------*/

}	 
?>
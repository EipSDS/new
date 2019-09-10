<!DOCTYPE html> 
<html>
<head>
 <?php
include('functions.php');
$handleFunctionsObject = new handleFunctions;
?>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/style2.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script> 
<!-- jQuery easing plugin --> 
<link href="https://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="https://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"></script>
<script src="js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="js/script.js" type="text/javascript"></script> 
<title>Customer with DOt</title>
<script>
function myFunction() {
  document.getElementById("select_Non_trucks").selectedIndex = "1";
}
</script>
</head>
<body onload="myFunction()">

<h1 style="margin-top:20px" align="center">Givesurance Data Collection Beta V1</h1>
<!-- multistep form -->
<form id="msform">
<!-- progressbar -->
<ul id="progressbar">
<li class="zeroli active">Greetings</li>
<li class="phoneli">Phone Number </li>
<li class="IntroLi">Intro</li>
<li class='dotLi'>DOT</li>
<li class='MCLi'>MC</li>
<!--li  class='physicalLi'>Verify Phyical Address</li>
<li class='mailingLi'>Verify Mailing Address</li>
<li class='insuranceLi'>Verify Insurance Data</li-->
<li class='generalLI'>General</li>
<li class='vehiclesLI'>Vehicles</li>
<li class='driversLI'>Drivers</li>
<li class='violationsLI'>Violations</li>
<li class='underwritingLI'>Underwriting</li>
<li class='CoverageLI'>Coverage Limit Information</li>
<li class='OperationDescription'>Operation Description</li>
<li class='InsuranceHistory'>Insurance History</li>
<li class='CommoditiesLI'>Commodities</li>
<!--li class='CargoRelatedLI'>Cargo Related</li>
<li class='CargoFinal'>Cargo Final</li>
<li class='PDFData'>FMCSA </li-->
</ul>
<!-- fieldsets -->
<div class="overlay">
    <div id="loading-img"></div>
</div>
	<fieldset class='zero'>
	<h2 class="fs-title">Welcome to Givesurance</h2>
	<h3 class="fs-subtitle"></h3>
	<div class='row'>
	
	<div class='col-md-6'>
		<div class="form-row">
			<div class="form-holder w-100">
			<label>Who am i speaking with today?</label>
			<input type="text" name="contact_first_name" placeholder="Enter First Name" required class='contact_first_name'/>
			</div>	
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
			<input type="text" name="contact_last_name" placeholder="Enter Last Name" required class='contact_last_name'/>
			</div>	
		</div>
		
	</div>	
	<div class='col-md-6'>	
		<div class="form-row">
			<div class="form-holder w-100">
			<label>Would you like quick quote for insurance today?</label>
			 <div class='radio'>
				<input type="radio" name="quick_quote_for_insurance" class='quick_quote_for_insurance'  value='Yes'>
				<label>Yes</label>
				</div>
				 <div class='radio'>
				<input type="radio" name="quick_quote_for_insurance"  class='quick_quote_for_insurance'  value='No'>
				<label>No</label>
				</div>
			</div>	
		</div>
		
		<div class="form-row quick_quote_for_insurance_no" style='display:none'>
			<div class="form-holder w-100">
			<label>what can I help you with today? </label>
			 <textarea  name="help_text"  required class='help_text'></textarea>
			</div>	
		</div>
	</div>
	<div class="form-row quick_quote_for_insurance_yes" style='display:none'>
			<div class="form-holder w-100">
			<label>I can help you with that. Let me get some information from you real quick.</label>
			
			</div>	
		</div>
	
	</div>
	
	<div role="alert" class='dot_alert' style='display:none;color:red';>
		Please Fill all fields.
	</div>
	
	</div>
	<div class='previous_next_buttons'>

	<input type="button" name="next" class="action-button zero_next" value="Next" />
	<input type="button" name="next" class="action-button no_insurance" value="Done" style='display:none;'/>
		</div>
	</fieldset>

	<fieldset class='first'>
	<h2 class="fs-title">Hi my name is (YOUR NAME) and I will be assisting you today.
	In case we get disconnected, what is the best phone number to reach you?</h2>
	<h3 class="fs-subtitle"></h3>
		<input type="text" name="phone" placeholder="Phone Number" required class='phoneNumber' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
		<input type="hidden" name="contactId" placeholder="Phone Number" required class='contactId' />
		<div class='previous_next_buttons'>
			<input type="button" name="previous" class="previous_phone action-button" value="Previous" />
		<input type="button" name="next" class="action-button phone_number_next" value="Next" />
		</div>
	</fieldset>
	<fieldset class='first_1'>
	<h2 class="fs-title">Intro</h2>
	<h3 class="fs-subtitle"></h3>
	<div class='row'>
		<div class='col-md-6'>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>When do you need policy by?</label>
				<input type="text" name="When_do_you_need_policy" class='When_do_you_need_policy datepicker'  placeholder='<?php echo date('m/d/Y');?>' value=''>
					
			</div>	
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
			<label>Are you the owner of the company?</label>
			 <div class='radio'>
				<input type="radio" name="Are_you_the_owner" class='Are_you_the_owner'  value='Yes'>
				<label>Yes</label>
				</div>
				 <div class='radio'>
				<input type="radio" name="Are_you_the_owner"  class='Are_you_the_owner'  value='No'>
				<label>No</label>
				</div>
			</div>	
		</div>
		</div>
		<div class='col-md-6'>
		<div class="form-row">
			<div class="form-holder w-100">
			<label>How many vehicles do you need in the insurance?</label>
			 <select class="form-control how_many_vehicles" id='how_many_vehicles' name='how_many_vehicles'>
			 <option value=''>Select</option>
			 <option value=1>1</option>
			 <option value=2>2</option>
			 <option value=3>3</option>
			 <option value=4>4</option>
			 <option value=5>5</option>
			 <option value=6>6</option>
			 <option value=7>7</option>
			 <option value=8>8</option>
			 <option value=9>9</option>
			 <option value=9>10</option>
			 </select>
			</div>	
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
			<label>Is the owner also the driver?</label>
			 <div class='radio'>
				<input type="hidden" name="is_driver_or_not" class='is_driver_or_not'  value=''>
				<input type="radio" name="Is_the_owner_driver" class='Is_the_owner_driver'  value='Yes'>
				<label>Yes</label>
				</div>
				<div class='radio'>
				<input type="radio" name="Is_the_owner_driver"  class='Is_the_owner_driver'  value='No'>
				<label>No</label>
				</div>
			</div>	
		</div>
		</div>
		</div>
			<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_Intro action-button" value="Previous" />
		<input type="button" name="next" class="action-button Intro_next" value="Next" />
		</div>
		
	</fieldset>
	<fieldset class='second'>
		<h2 class="fs-title">DOT</h2>
		<h3 class="fs-subtitle"></h3>
		<div role="alert" id='dot_alert' style='display:none;color:red';>
		DOT Number must start with DOT
		</div>
		<div class='row'>
		<div class='col-md-6'>
		<div class="form-holder w-100">
			<label>Do you have DOT number?</label>
			 <div class='radio'>
				<input type="radio" name="have_DOT_number" class='have_DOT_number'  value='Yes'>
				<label>Yes</label>
				</div>
				 <div class='radio'>
				<input type="radio" name="have_DOT_number"  class='have_DOT_number'  value='No'>
				<label>No</label>
				</div>
		</div>	
		
		<div class="form-row enter_dot_div" style='display:none;'>
			<div class="form-holder w-100">
			<label>What is Your DOT Number?</label>
			<input type="text" name="searchedNumber" placeholder="Enter DOT Number" class="searchedNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
			</div>	
		</div>
		</div>
		<div class='col-md-6'>
		<div class="form-row need_new_DOT" style='display:none;'>
		<div class="form-holder w-100">
			<label>Do you want a new DOT number?</label>
			 <div class='radio'>
				<input type="radio" name="need_new_DOT_number" class='need_new_DOT_number'  value='Yes'>
				<label>Yes</label>
				</div>
				 <div class='radio'>
				<input type="radio" name="need_new_DOT_number"  class='need_new_DOT_number'  value='No'>
				<label>No</label>
				</div>
		</div>
		</div>
		<div class="form-row need_new_DOT_yes" style='display:none;'>
		<div class="form-holder w-100">
			<label>Sure let me get some more information! Press(9999999999)</label>
			<input type="text" name="searchedNumber_new" placeholder="Enter DOT Number" class="searchedNumber_new" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
		</div>
		</div>
		<div class="form-row need_new_DOT_no" style='display:none;'>
		<div class="form-holder w-100">
			<label>No problem! Press(9999999999)</label>
			 <input type="text" name="searchedNumber_new" placeholder="Enter DOT Number" class="searchedNumber_new" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
		</div>
		</div>
		</div>
		</div>
		<div role="alert" class='dot_alert_valid' style='display:none;color:red';>
		Please enter Valid DOT Number.
		</div>
		<div class='previous_next_buttons'>
		<input type="hidden" name="dot" placeholder="Enter DOT Number" class="dot"/>
		<input type="hidden" name="checkalreadyexists" class="checkalreadyexists"/>
		<input type="button" name="previous" class="previous_doT action-button" value="Previous" />
		<input type="button" name="next" class="action-button dot_number_next" value="Next" />
		</div>
	</fieldset>
	<fieldset class='first_2'>
		<h2 class="fs-title">Enter MC</h2>
		<h3 class="fs-subtitle"></h3>
		<input type="text" name="mc_number" placeholder="Enter MC Number" class="mc" id='mc_number' />
		<input type="button" name="previous" class="previous_first_2 action-button" value="Previous" />
		<input type="button" name="next" class="action-button first_2_next" value="Next" />
	</fieldset>
	<!--fieldset class='third'>
<h2 class="fs-title">Is this your Physcial Address</h2>
<h3 class="fs-subtitle"></h3>
<div class='main_form'>
	<div class='row'>
	<div class='col-md-6'>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>Addresss:</label>
				<input type="text" name="physical_addresss" class='physical_address' placeholder="addresss" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>Street Address:</label>
		<input type="text" name="physical_street" class='physical_street' placeholder="Street Address" />
		</div>
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>Address Line 2:</label>
				<input type="text" name="physical_street1" class='physical_street1'  placeholder="Address Line 2" />
				</div>
		</div>
	</div>
	<div class='col-md-6'>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>City:</label>
			<input type="text" name="physical_city" class='physical_city' placeholder="City" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>State/Region/Province:</label>
				<input type="text" name="physical_state" class='physical_state' placeholder="State/Region/Province" />
			</div>
		</div>
		<div class="form-row">
			<div class="form-holder w-100">
				<label>State/Region/Province:</label>
				<input type="text" name="physical_Postal" class='physical_Postal' placeholder="Postal / Zip Code" />
				</div>
		</div>
		</div>
	</div>
	</div>
		<div class='previous_next_buttons'>
			<input type="button" name="previous" class="previous_physical action-button" value="Previous" />
			<input type="button" name="next" class="action-button physical_address_next" value="Next" />
		</div>
</fieldset>
<fieldset class='fourth'>
<h2 class="fs-title">Is this your Mailing Address</h2>
<h3 class="fs-subtitle"></h3>
<div class='main_form'>
<div class='row'>
	<div class='col-md-6'>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>Addresss</label>
			<input type="text" name="mailing_addresss" class='mailing_address' placeholder="addresss" />
		</div>
		</div>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>Street Address:</label>
		<input type="text" name="mailing_street" class='mailing_street' placeholder="Street Address" />
		</div>
	</div>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>Address Line 2:</label>
		<input type="text" name="mailing_street1" class='mailing_street1'  placeholder="Address Line 2" />
		</div>
	</div>
	</div>
	<div class='col-md-6'>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>City:</label>
		<input type="text" name="mailing_city" class='mailing_city' placeholder="City" />
		</div>
	</div>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>State/Region/Province</label>
			<input type="text" name="mailing_state" class='mailing_state' placeholder="State/Region/Province" />
		</div>
	</div>
	<div class="form-row">
		<div class="form-holder w-100">
			<label>Postal / Zip Code:</label>
		<input type="text" name="mailing_Postal" class='mailing_Postal' placeholder="Postal / Zip Code" />
		</div>
	</div>
	</div>
	</div>
</div>
<div class='previous_next_buttons'>
<input type="button" name="previous" class="previous_mailing action-button" value="Previous" />
<input type="button" name="next" class="action-button mailing_address_next" value="Next" />
</div>
</fieldset>
<fieldset class='fifth'>
<h2 class="fs-title">Additional Insurance Data</h2>
<h3 class="fs-subtitle"></h3>
<div class='main_form'>
<div class='row'>
<div class='col-md-6 left'>
 <div class="form-row">
	<div class="form-holder w-100">
		<label>Entity Type:</label>
	<input type="text" name="Entity_Type" class='Entity_Type' placeholder="Entity Type" />
	</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>Operating Status</label>
<input type="text" name="Operating_Status" class='Operating_Status'  placeholder="Operating Status" />
</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>Legal Name</label>
<input type="text" name="Legal_Name" class='Legal_Name'  placeholder="Legal Name" />
</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>DBA Name</label>
<input type="text" name="DBA_Name" class='DBA_Name'  placeholder="DBA Name" />
</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>Out of Service Date</label>
<input type="date" name="Out_of_Service_Date" class='Out_of_Service_Date'  placeholder="Out of Service Date" />
</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>State Carrier ID Number</label>
<input type="text" name="State_Carrier_ID_Number" class='State_Carrier_ID_Number'  placeholder="State Carrier ID Number" />
</div>
</div>
 <div class="form-row">
	<div class="form-holder w-100">
	<label>DUNS Number</label>
<input type="text" name="DUNS_Number" class='DUNS_Number'  placeholder="DUNS Number" />
</div>
</div>

</div>
<div class='col-md-6 right'>
<div class="form-row">
	<div class="form-holder w-100">
	<label>Power Units</label>
<input type="text" name="Power_Units" class='Power_Units'   placeholder="Power Units" />
</div>
</div>
<div class="form-row">
	<div class="form-holder w-100">
	<label>Drivers</label>
<input type="text" name="Drivers" class='Drivers'  placeholder="Drivers" />
</div>
</div>
<div class="form-row">
	<div class="form-holder w-100">
	<label>MCS-150 Form Date</label>
<input type="text" name="MCS-150_Form_Date" class='MCS_150_Form_Date'  placeholder="MCS-150 Form Date" />
</div>
</div>
<div class="form-row">
	<div class="form-holder w-100">
	<label>Operation Classification</label>
<input type="text" name="Operation_Classification" class='Operation_Classification'  placeholder="Operation Classification" />
</div>
</div>
<div class="form-row">
	<div class="form-holder w-100">
	<label>Carrier Operation</label>
<input type="text" name="Carrier_Operation" class='Carrier_Operation'  placeholder="Carrier Operation" />
</div>
</div>
<div class="form-row">
	<div class="form-holder w-100">
	<label>Cargo Carried</label>
<input type="text" name="Cargo_Carried" class='Cargo_Carried'  placeholder="Cargo Carried" />
</div>
</div>
</div>
</div>

</div>
<div class='previous_next_buttons'>
<input type="button" name="previous" class="previous_Insurance action-button" value="Previous" />
<input type="button" name="next" class="action-button safer_data_next" value="Next" />

</div>

</fieldset--->
<fieldset class='sixth'>
	<div class='row main_form'>
		<div class='col-md-6 left'>
			<div class='main_field_div'>
			<h2 class="fs-title">Policy</h2>
			<h3 class="fs-subtitle"></h3>
				<!--div class="form-row">
					<div class="form-holder w-100">
					 <label>Agent Code:</label>				
					 <select id='agent_code' name='agent_code'><option selected="selected" value="77743 (GIVESURANCE INS SVCS)">77743 (GIVESURANCE INS SVCS)</option>
					</select>
					</div>

				</div-->
				<div class="form-row">
					<div class="form-holder w-100">
				   <label>Policy Effective Date:</label>
					<input type="text" class="form-control  Policy_Effective_datee" id='Policy_Effective' name='Policy_Effective' readonly>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Is the customer currently insured with Progressive Commercial Auto?</label>
					 <div class='radio'>
						<input type="radio" name="customer_Progressive_Commercial" class='customer_Progressive_Commercial'  value='Yes'>
						<label>Yes</label>
						</div>
						 <div class='radio'>
						<input type="radio" name="customer_Progressive_Commercial" checked class='customer_Progressive_Commercial'  value='No'>
						<label>No</label>
						</div>
					</div>	
				</div>	
			</div>
			<div class='main_field_div'>
				<h2 class="fs-title">Business Type</h2>		
				<div class="form-row">
					<div class="form-holder w-100">	
					<label>Are you general freight? Are you hauling intermodal? Are you hauling coal? What do you haul? Do you haul steel?</label>
					<input type="text" class="form-control search_business" value="" id='search_business_type' name='Business_type' placeholder='Search...'>
					<div id="business_response">
						<?php
						$response=$handleFunctionsObject->businessCategories();
						foreach($response as $business){
							if($business['category']!=''){  ?>
								<ul>
								<li data-id="<?php echo $business['description'];?>" class="Business_types_select"><?php echo $business['category']; ?></li>
								</ul>
								<?php 
							}
						}
						?>
					
					</div>
					
					</div>	
				</div>	
				
				<div class="form-row business_sub_type_enter" id='business_sub_type_enter' style="display:none;">
					<div class="form-holder w-100">	
					<p class='enter_business_sub' id='enter_business_sub'></p>
					</div>	
				</div>
				<div class="form-row">
					<div class="form-holder w-100">			
						<label>Are any listed vehicles used to haul steel?</label>
						 <div class='radio'>
						
						 <input type="radio" name="is_vehicles_haul_steel" class='is_vehicles_haul_steel'  value='Yes'>
						  <label>Yes</label>
						 </div>
						  <div class='radio'>
						   
						<input type="radio" name="is_vehicles_haul_steel" class='is_vehicles_haul_steel' value='No'>
						<label>No</label>
						</div>
					</div>	
				</div>	
				<div class="form-row" id='Specify_Commodities_Hauled_select_div'>	
					<div class="form-holder w-100">
					<label>Specify Commodities Hauled</label>
					<select  multiple="multiple" id='Specify_Commodities_Hauled_select' name='Specify_Commodities_Hauled[]'>
						<option value="">Choose Commodities Hauled</option>
						 <option value="Agricultural/Farm Supplies">Agricultural/Farm Supplies</option>
						<option value="Auto Parts / Tires">Auto Parts / Tires</option>
						<option value="Beverages">Beverages</option>
						<option value="Building Materials">Building Materials</option>
						<option value="Chemicals">Chemicals</option>
						<option value="Department Store Merchandise">Department Store Merchandise</option>
						<option value="Drive/Tow away">Drive/Tow away</option>
					    <option value="Dry Bulk">Dry Bulk</option>
						<option value="Electronics">Electronics</option>
						<option value="Fresh Produce">Fresh Produce</option>
						 <option value="Garbage/Refuse">Garbage/Refuse</option>
						<option value="Grain, Feed, Hay">Grain, Feed, Hay</option>
						<option value="Household Goods">Household Goods</option>
						<option value="Intermodal Containers">Intermodal Containers</option>
						<option value="Liquids/Gases">Liquids/Gases</option>
						<option value="Livestock">Livestock</option>
						<option value="Logs, Poles, Bearms, Lumber">Logs, Poles, Bearms, Lumber</option>
						<option value="Machinery, Large Objects">Machinery, Large Objects</option>
						<option value="Metal: sheets, coils, rolls">Metal: sheets, coils, rolls</option>
						<option value="Meats">Meats</option>
						<option value="Mobile Homes">Mobile Homes</option>
						<option value="Motor Vehicles">Motor Vehicles</option>
						<option value="Oilfield Equipment">Oilfield Equipment</option>
						<option value="Paper Products">Paper Products</option>
						<option value="Passengers">Passengers</option>
						<option value="Plastic Products">Plastic Products</option>
						<option value="Refrigerated Food">Refrigerated Food</option>
						<option value="Sand/Gravel">Sand/Gravel</option>
						<option value="US Mail">US Mail</option>
					  <option value="Other">Other</option>
					</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-holder w-100">			
						<label>listed vehicles or the load require a placard?</label>
						 <div class='radio'>
						
						 <input type="radio" name="is_vehicles_placard" class='is_vehicles_placard'  value='Yes'>
						  <label>Yes</label>
						 </div>
						  <div class='radio'>
						   
						<input type="radio" name="is_vehicles_placard" class='is_vehicles_placard' value='No'>
						<label>No</label>
						</div>
					</div>	
				</div>	
				

				
			</div>
			<div class='main_field_div'>	
				<h2 class="fs-title">Business Organization Structure</h2>
				<div class="form-row">
					<div class="form-holder w-100">	
					  <label>Is this Individual, Partnership or Corporation?</label>
						<div class='radio'>
						 <input type="radio" name="Business_Organization_Structure" class='Business_Organization_Structure' value='Individual/Sole Proprietor' checked>
						 <label>Individual/Sole Proprietor</label>
						</div>
						<div class='radio'>
						<input type="radio" name="Business_Organization_Structure" class='Business_Organization_Structure' value='Partnership'>
						<label>Partnership</label>
						</div>
						 <div class='radio'>
						<input type="radio" name="Business_Organization_Structure" class='Business_Organization_Structure' value='Corporation or LLC'>
						<label>Corporation or LLC</label>
						</div>
					</div>	
				</div>			
				<div class="form-row" id='is_DBA'>		
				   <div class="form-holder w-100">
					<label>Do you have a DBA?</label>
					<div class='radio'>
						<input type="radio" name="have_DBA" class='have_DBA'  value='Yes'>
						<label>Yes</label>
					</div>
					<div class='radio'>
						<input type="radio" name="have_DBA" class='have_DBA' value='No'>
						<label>No</label>
					</div>
					</div>
				</div>  
				<div class="form-row" id='DBA_NAME_DIV' style='display:none'>	
					<div class="form-holder w-100">
					<label>DBA</label>
					<input type="text" class="form-control DBA_NAME"  name='DBA_NAME' >  
					</div>
				</div>
			</div>
			<div class='main_field_div' id='US_Department_of_Transportation'>	
				 <h2 class="fs-title">US Department of Transportation (USDOT) Registration</h2>
				<div class="form-row">	
					<div class="form-holder w-100">
					
					<label>USDOT# associated with the insured's business  :  </label>
					<input type="text" class="form-control dot"  name='USDOT_associated' readonly/>  
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
						<label>USDOT Assigned to: </label>
						<input type="text" class="form-control mailing_address" id='USDOT_Assigned_to' value=""  name='USDOT_Assigned_to'>  
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Does the information assigned to this USDOT# match the insured's business?</label>	
					<div class='radio'>
					
					<input type="radio" name="is_match_USDOT" checked class='is_match_USDOT'  value='Yes' checked>
					<label>Yes</label>	
					</div>
					<div class='radio'>
					
					<input type="radio" name="is_match_USDOT" class='is_match_USDOT'  value='No'>
					<label>No</label>	
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>How many years have you been in business?</label>	
					<input type="number" class="form-control Yrs_in_business" id='Yrs_in_business' value="" name='Yrs_in_business' min='0'> 
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>How many years have you been in Trucking Industry?</label>	
					<input type="number" class="form-control Yrs_in_Trucking_Industry" id='Yrs_in_Trucking_Industry' value=""  name='Yrs_in_Trucking_Industry' min='0'> 
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>If this is a new venture, then ask customer to list previous industry employment roles for the owner</label>	
					<input type="text" class="form-control previous_industry_employment" id='previous_industry_employment' value=""  name='previous_industry_employment'> 
					</div>
				</div>
				<!--div class="form-row">
					<div class="form-holder w-100">
					<label>What types of filings do you require?</label>	
					<select class="form-control List_Filing" id='List_Filing' name='List_Filing'>
					<option  value='' selected='selected'>Select Filing</option> 
					<option  value='Federal'>Federal</option> 
					<option  value='State'>State</option> 
					<option  value='Both'>Both</option> 
					<option  value='Other'>Other</option> 
					</select>
					</div>
				</div>
				<div class="form-row customer_in_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Select State</label>	
					<select class="form-control List_Filing_state" id='List_Filing_state' name='List_Filing_state'>
					<option  value='' selected='selected'>Select State</option> 
					<option  value='CA'>CA</option> 
					<option  value='TX'>TX</option> 
					</select>
					
					</div>
				</div>
				<div class="form-row customer_state_div_value" style='display:none;'>
					
				</div-->
				</div>
			
			
			</div>
			<div class='col-md-6 right'>
				<div class='main_field_div' id='Spouse_Information_div' style='display:none'>
				<h2 class="fs-title">Spouse Information</h2>
				<div class="form-row">
					<div class="form-holder w-100">
						<label>First Name:</label>
							<input type="text" class="form-control" name="Spouse_first_name" placeholder="First Name.." id='Spouse_first_name'>
						<label>Middle Initial:</label>
							<input type="text" class="form-control" name="Spouse_Middle_name" placeholder="Middle Initial:.." id='Spouse_Middle_name'>
						<label>Last Name:</label>
							<input type="text" class="form-control" name="Spouse_Last_name" placeholder="Last Name:." id='Spouse_Last_name'>
						</div>	
				</div>	
				<div class="form-row">
					<div class="form-holder w-100 ">
						<label>Suffix:</label>
						<select class="form-control" id='Spouse_Suffix' name='Spouse_Suffix'>
						  <option selected value="none">None</option>
						  <option value="jr">jr</option>
						  <option value="Sr">Sr</option>
						  <option value="|">|</option>
						  <option value="||">||</option>
						  <option value="|||">|||</option>
						  <option value="|V">|V</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100 ">
					<label>Date of Birth:</label>
					<input type="text" class="form-control datepickerDOB" name="Spouse_DOB" id='Spouse_DOB' value='<?php echo date('m/d/Y');?>' placeholder='<?php echo date('m/d/Y');?>'>
					
					</div>
				</div>
			</div>
			<div class='main_field_div'>
			<div id="is-individual-business">
				<h2 class="fs-title"> Who's gonna be in this insurance? Can you give me the first and last name?And do you have middle initial? </h2>
				
					<div class="form-row">
						<div class="form-holder w-100">
							<label>First Name:</label>
								<input type="text" class="form-control" name="Insured_first_name" placeholder="First Name.." id='Insured_first_name'>
							<label>Middle Initial:</label>
								<input type="text" class="form-control" name="Insured_Middle_name" placeholder="Middle Initial:.." id='Insured_Middle_name'>
							<label>Last Name:</label>
								<input type="text" class="form-control" name="Insured_Last_name" placeholder="Last Name:." id='Insured_Last_name'>
							</div>	
					</div>	
					<div class="form-row">
						<div class="form-holder w-100 ">
							<label>Suffix:</label>
							<select class="form-control" id='Insured_Suffix' name='Insured_Suffix'>
							  <option selected value="none">--None--</option>
							  <option value="jr">jr</option>
							  <option value="Sr">Sr</option>
							  <option value="|">|</option>
							  <option value="||">||</option>
							  <option value="|||">|||</option>
							  <option value="|V">|V</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-holder w-100 ">
						<label>Date of Birth:</label>
						<input type="text" class="form-control datepickerDOB" name="Insured_DOB" id='Insured_DOB' value='<?php echo date('m/d/Y');?>' placeholder='<?php echo date('m/d/Y');?>'>
						<!--label>Designate Spouse as a Named Insured?</label-->
						<!--div class='radio'>
							<input type="radio" name="Insured_Designate_Spouse" class='Insured_Designate_Spouse' value='Yes'><label>Yes</label>
						</div>
						<div class='radio'>	
							<input type="radio" name="Insured_Designate_Spouse" class='Insured_Designate_Spouse' value='No'checked><label>No</label>
						</div-->
						</div>
					</div>
				</div>
				<div id="is-partner_cop-business"  style='display:none;'>
				<h2 class="fs-title" id="is-partner_cop-business">Contact Information </h2>
					<div class="form-row">
						<div class="form-holder w-100">
							<label>Business Name:</label>
							<input type="text" class="form-control" name="business_name" placeholder="Business Name" id='business_name'>
							<input type="text" class="form-control" name="business_name1" placeholder="" id='business_name1'>
							<label>EIN:</label>
							<input type="text" class="form-control" name="ein" placeholder="EIN.." id='ein'>
						</div>	
					</div>	
					<div class="form-row">		
						<div class="form-holder w-100">
							<label>Do you have a DBA?</label>
							<div class='radio'>
								<input type="radio" name="have_DBA_partner_cop" class='have_DBA_partner_cop'  value='Yes'>
								<label>Yes</label>
							</div>
							<div class='radio'>
								<input type="radio" name="have_DBA_partner_cop" class='have_DBA_partner_cop' value='No'>
								<label>No</label>
							</div>
						</div>
					</div>  
					<div class="form-row" id='partner_cop_DBA' style='display:none'>	
						<div class="form-holder w-100">
							<label>DBA</label>
							<input type="text" class="form-control DBA_NAME"  name='partner_cop_DBA_NAME' id="partner_cop_DBA_NAME" >  
						</div>
					</div>
				</div>
			</div>
				<div class='main_field_div'>
				 <h2 class='fs-title'>Contact Information</h2>
				 <h3 class='fs-subtitle' ></h3>
				 <div class="form-row">
					<div class="form-holder w-100">
					<label>Insured's Phone:</label>
						<input type="text" class="form-control" name="Contact_Insured_phone" id='Contact_Insured_phone'>
						<input type="hidden" class="form-control" name="Contact_Insured_phone_hidden" id='Contact_Insured_phone_hidden'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">				
						<label>E-mail Address:</label>
						<input type="email" class="form-control" name="Contact_Insured_email" id='Contact_Insured_email'>
					</div>
				</div>	
				<div class="form-row">
					<div class="form-holder w-100">		
					<label>Mailing Address:</label>
						<input type="text" class="form-control" name="Contact_Insured_Mailing" placeholder="" id='Contact_Insured_Mailing'>
						</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">					
					<label>City:</label>
						<input type="text" class="form-control" name="Contact_Insured_City" placeholder=""  id='Contact_Insured_City' >
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">	
					<label>State:</label>
				<select class="form-control"  id="Contact_Insured_State" name="Contact_Insured_State">
  				<option Selected='selected'>Select State</option>
  				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="PR">Puerto Rico</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VI">Virgin Islands</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="DC">Washington DC</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
				</select>
				</div>
			</div>
			<div class="form-row">
					<div class="form-holder w-100">	
			<label>ZIP Code:</label>
			<input type="text" class="form-control" name="Contact_Insured_ZIP_code" placeholder="46526-0000"  id='Contact_Insured_ZIP_code'>
				</div>
			</div>
			</div>
			<div class='main_field_div'>
			<h2 class='fs-title'>Who's going to be responsible for the insurance bills? </h2>			
				<h3 class="fs-subtitle business-select-rediobtn">President/CEO</h3>	
			<div class="form-row">
				  <div class="form-holder w-100">
				 		
				<label>First Name:</label>
				<input type="text" class="form-control" name="Financial_First_name" id='Financial_First_name'>
			</div>
			</div>	
			<!--div class="form-row">
				  <div class="form-holder w-100">
				<label>Middle Initial:</label>
				<input type="text" class="form-control" name="Financial_Middle_name" placeholder="Middle Initial:.."id='Financial_Middle_name'>
			</div>
			</div-->		
			<div class="form-row">
				  <div class="form-holder w-100">	
				<label>Last Name:</label><input type="text" class="form-control" name="Financial_Last_name" id='Financial_Last_name'>
			</div>
			</div>	
			<div class="form-row">	
				<div class="form-holder w-100 ">
				<label>Suffix:</label>
					<select class="form-control" id='Financial_Suffix' name='Financial_Suffix'>
						<option selected value="none">--None--</option>
						<option value="jr">jr</option>
						<option value="Sr">Sr</option>
						<option value="|">|</option>
						<option value="||">||</option>
						<option value="|||">|||</option>
						<option value="|V">|V</option>
					</select>
				</div>
			</div>

			<div class="form-row" id='is_Involved_daily_operation'>	
				<div class="form-holder w-100 ">
				<label>Involved in the daily operation of the business?</label>
					<div class='radio'>
						<input type="radio" name="is_Involved_daily_operation" class='is_Involved_daily_operation' value='Yes' checked>
						<label>Yes</label>
					</div>
					<div class='radio'>
						<input type="radio" name="is_Involved_daily_operation" class='is_Involved_daily_operation' value='No'><label>No</label>
					</div>
				
				</div>
			</div>

			<div class="form-row">	
				<div class="form-holder w-100 ">
				<label>Date of Birth:</label>
				<input type="text" class="form-control datepickerDOB" name="Financial_dob" value="<?php echo date("m/d/Y");?>" id='Financial_dob' placeholder='<?php echo date('m/d/Y');?>'>
				</div>
			</div>	
			<div class="form-row">	
				<div class="form-holder w-100 ">
					<label>Home Address:</label><input type="text" class="form-control" name="Financial_Home_address" id='Financial_Home_address'>
				</div>
			</div>				
			<div class="form-row">	
				<div class="form-holder w-100 ">		
				<label>City:</label>
					<input type="text" class="form-control" name="Financial_City" id='Financial_City'>
					</div>
			</div>	
			<div class="form-row">	
				<div class="form-holder w-100 ">	
				<label>State:</label>
					<select class="form-control" id="Financial_State" name="Financial_State">
					<option value="" selected='selected'>Select State</option>
					<option value="AL" >Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="PR">Puerto Rico</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VI">Virgin Islands</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="DC">Washington DC</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
				</div>
			</div>
			<div class="form-row">	
				<div class="form-holder w-100 ">
			<label>ZIP Code:</label>
			<input type="text" class="form-control" name="Financial_zipcode" id='Financial_zipcode' >
				</div>
			</div>
			<!--div class="form-row">	
				<div class="form-holder w-100 ">
					<label>Social Security Number:</label>
					<input type="text" class="form-control" name="social_security_number"  id='Financial_social_security_number' >
				</div>
				</div-->
			</div>	
		</div>
	</div>
	<!--div class="confirmation_div">	
				<div class="form-holder w-100 ">
					<label>Is it OK if I continue?:</label>
					<div class='radio'>
						<input type="radio" name="OK_if_I_continue" class='OK_if_I_continue' value='Yes (most accurate quote)'checked><label>Yes(most accurate quote)</label>
					</div>
					<div class='radio'>
						<input type="radio" name="OK_if_I_continue" class='OK_if_I_continue' value='Yes, but do not order credit (approximate quote)'><label>Yes, but do not order credit (approximate quote)</label>
					</div>
					<div class='radio'>
						<input type="radio" name="OK_if_I_continue" class='OK_if_I_continue' value='No, do not continue'><label>No, do not continue</label>
					</div>
				</div>
		</div-->
		<div class='previous_next_buttons'>
			<input type="button" name="previous" class="previous_general  action-button" value="Previous" />
			<input type="button" name="next" class="action-button general_data_next" value="Next" />
		</div>
	</fieldset>
	<fieldset class='seventh'>
		<h2 class="fs-title">Vehicles</h2>
		<h3 class="fs-subtitle"></h3>
		<div class='main_form'>
		<table class="table" id="dtVehiclesTable">
			<thead>
			<tr>
				  <td class="td-padding">Vehicle</td>
				  <td class="td-padding"><button id='add_vehicles' type='button'>Add</button></td>
				  <td class="text-center td-padding">Year Make Model</td>
				  <td class="text-right">VIN</td>
				  <td class="text-right">Category</td>
				  <td class="text-right">Radius</td>
				  <td class="text-right">Value</td>
				  <td class="text-right">Loss Payee</td>
				  <td class="text-right">Gross weight</td>
				  <td class="text-right">Where is the city of destination?</td>
				  <!--td class="text-right"></td-->
				</tr>
			</thead>
			  <tbody>
				
				
			  </tbody>
		</table>
		
		</div>

		<div class='previous_next_buttons'>
			<input type="button" name="previous" class="previous_vehicles action-button" value="Previous" />
			<input type="button" name="next" class="action-button vehicles_data_next" value="Next" />
		</div>
	</fieldset>
<fieldset class='eigth'>
<h2 class="fs-title">Drivers</h2>
		<h3 class="fs-subtitle"></h3>
		<div class='main_form'>
		<table class="table" id="dtDriverTable">
			<thead>
			<tr>
				  <td class="td-padding">Drivers</td>
				  <td class="td-padding"><button id='add_drivers' type='button' data-toggle="modal" data-target="#Driver_add_modal">Add</button></td>
				  <td class="text-center td-padding">Name</td>
				  <td class="text-right">Age</td>
				  <td class="text-right">Date Of Birth</td>
				  <td class="text-right">Marital Status</td>
				  <td class="text-right">License Number</td>
				  <td class="text-right">License State</td>
				  <td class="text-right">Years of Class A Exp</td>
				  <td class="text-right">Do you know the date of hire?</td>
				  <td class="text-right">Backup driver</td>
				  <td class="text-right">Owner</td>
				  <td class="text-right">SR22</td>
				  <td class="text-right">Is there any points in the driving record? Do you know how many points?</td>
				  <!--td class="text-right"></td-->
				</tr>
			</thead>
			  <tbody>
			  </tbody>
		</table>
		
		</div>

		<div class='previous_next_buttons'>
	<input type="button" name="previous" class="previous_drivers action-button" value="Previous" />
	<input type="button" name="next" class="action-button drivers_data_next" value="Next" />
</div>
</fieldset>
<fieldset class='ninth'>
<h2 class="fs-title">Violations</h2>
<div class='infoDiv'>Enter all accidents (both at fault and not at fault) and violations for the last 35 months. If date of accident or violation is unknown, please leave the date blank, our systems will reconcile.</div>
<h3 class="fs-subtitle"></h3>
	<div class='main_form'>
	
	<div class='row'>
	<div class="form-row" id='is_violation_div'>	
				<div class="form-holder w-100 ">
				<label>Do you have any violations that you are aware of?</label>
					<div class='radio'>
						<input type="radio" name="is_voilation" class='is_violation' value='Yes'>
						<label>Yes</label>
					</div>
					<div class='radio'>
						<input type="radio" name="is_voilation" class='is_violation' value='No'><label>No</label>
					</div>
				
			</div>
	</div>
	
	
	<table class="table" id='Violation_Table' style='display:none;'>
			<thead>
			<tr>
				  <td class="td-padding" id='violation_header'>Was it your fault or somebody's fault?</td>
				  <td class="text-center td-padding datepickerDOB">When did it happen?</td>
				  <td class="td-padding"><button id='voilation_add' type='button'>Add</button></td>
				</tr>
			</thead>
			 <tbody>
				<tr>
				  <td class="td-padding">
				  <select id='select_Accident_0'>
					<option selected="selected" value=""></option>
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
				 <td class="text-center td-padding"> <input type='text' value='' placeholder='When did it happen?' class='datepicker'  id='Accident_date_0'>				
					</td>
				  <td class="td-padding"></td>
				</tbody> 
				</table> 
	
		</div>
	</div>
	
		<div class='previous_next_buttons'>
<input type="button" name="previous" class="previous_violations action-button" value="Previous" />
<input type="button" name="next" class="action-button violations_data_next" value="Next" />
</div>
</fieldset>
<fieldset class='tenth'>
	<h2 class="fs-title">Underwriting</h2>
	<h3 class="fs-subtitle"></h3>
	<div class='main_form'>
		<div class='col-md-6 left'>
			<div class='main_field_div'>
			<h2 class="fs-title">Proof of Prior Insurance:</h2>
			<h3 class="fs-subtitle"></h3>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>I am going to ask you some basic underwriting questions</label>
					
					 <div class='radio'>
						<input type="radio" name="currently_insured" class="currently_insured" value="Yes"><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="currently_insured" class="currently_insured" value="No"><label>No</label>
					</div>
					</div>

				</div>
				
				
				
				<div id='showinsured_data' style='display:none;'>
				<div class="form-row">
					<div class="form-holder w-100">
					 <label>Who are you insured with?</label>	
					 <select name='who_are_you_insured' class='who_are_you_insured'>
					<option selected='selected' value="">---Select----</option>
					<option value="Not Listed">Not Listed</option>
					<option value="Acadia Insurance Company">Acadia Insurance Company</option>
					<option value="Acceleration National Ins Co">Acceleration National Ins Co</option>
					<option value="Acceptance Insurance Company">Acceptance Insurance Company</option>
					<option value="Addison Insurance Company">Addison Insurance Company</option>
					<option value="Admiral Insurance Company">Admiral Insurance Company</option>
					<option value="Ag Security Insurance Company">Ag Security Insurance Company</option>
					<option value="AIG Hawaii Insurance Company Inc">AIG Hawaii Insurance Company Inc</option>
					<option value="Allied Mutual Insurance Co">Allied Mutual Insurance Co</option>
					<option value="Allstate Indemnity Company">Allstate Indemnity Company</option>
					<option value="Allstate Insurance Company">Allstate Insurance Company</option>
					<option value="American Economy Insurance Company">American Economy Insurance Company</option>
					<option value="American International Grp">American International Grp</option>
					<option value="American International Ins Company">American International Ins Company</option>
					<option value="American Mercury Insurance Company">American Mercury Insurance Company</option>
					<option value="American Mercury Lloyds Insurance Co">American Mercury Lloyds Insurance Co</option>
					<option value="American National Fire Ins Co">American National Fire Ins Co</option>
					<option value="American States Insurance Co of Tx">American States Insurance Co of Tx</option>
					<option value="American States Insurance Company">American States Insurance Company</option>
					<option value="Amica Mutual Insurance Company">Amica Mutual Insurance Company</option>
					<option value="Beacon National Insurance Co">Beacon National Insurance Co</option>
					<option value="Bituminous Casualty Corp">Bituminous Casualty Corp</option>
					<option value="Canal Indemnity Co">Canal Indemnity Co</option>
					<option value="Carolina Casualty Insurance Co">Carolina Casualty Insurance Co</option>
					<option value="Charter Oak Fire Insurance Co">Charter Oak Fire Insurance Co</option>
					<option value="Church Mutual Insurance Co">Church Mutual Insurance Co</option>
					<option value="Clarendon America Insurance Co">Clarendon America Insurance Co</option>
					<option value="Colonial County Mutual Ins Co">Colonial County Mutual Ins Co</option>
					<option value="Consumers Cnty Mutual Ins Co">Consumers Cnty Mutual Ins Co</option>
					<option value="Continental Casualty Co">Continental Casualty Co</option>
					<option value="Continental Western Insurance Co">Continental Western Insurance Co</option>
					<option value="Farm Bureau Mutual Insurance Co">Farm Bureau Mutual Insurance Co</option>
					<option value="Farmers Ins Grp">Farmers Ins Grp</option>
					<option value="Farmers Insurance Exchange">Farmers Insurance Exchange</option>
					<option value="Farmers Mutual Insurance Co of Ne">Farmers Mutual Insurance Co of Ne</option>
					<option value="Federal Insurance Company">Federal Insurance Company</option>
					<option value="Financial Indemnity Company">Financial Indemnity Company</option>
					<option value="Firemans Fund County Mutual Ins Co">Firemans Fund County Mutual Ins Co</option>
					<option value="Gainsco County Mutual Ins Co">Gainsco County Mutual Ins Co</option>
					<option value="GEICO General Insurance Co">GEICO General Insurance Co</option>
					<option value="General Insurance Co of America">General Insurance Co of America</option>
					<option value="Germania Insurance Company">Germania Insurance Company</option>
					<option value="Great American Insurance Co">Great American Insurance Co</option>
					<option value="Great Texas County Mutual Ins Co">Great Texas County Mutual Ins Co</option>
					<option value="Great West Casualty Co">Great West Casualty Co</option>
					<option value="Harford Mutual Insurance Co">Harford Mutual Insurance Co</option>
					<option value="Hartford Casualty Insurance Co">Hartford Casualty Insurance Co</option>
					<option value="Home State County Mutual Ins Co">Home State County Mutual Ins Co</option>
					<option value="Liberty Mutual Insurance Co">Liberty Mutual Insurance Co</option>
					<option value="Lincoln General Insurance Co">Lincoln General Insurance Co</option>
					<option value="Maryland Casualty Company">Maryland Casualty Company</option>
					<option value="Mercury Casualty Co">Mercury Casualty Co</option>
					<option value="Metropolitan Property  Cas Ins Co">Metropolitan Property  Cas Ins Co</option>
					<option value="Mid-Century Insurance Co">Mid-Century Insurance Co</option>
					<option value="Mid-Continent Casualty Co">Mid-Continent Casualty Co</option>
					<option value="National American Insurance Co">National American Insurance Co</option>
					<option value="National Casualty Company">National Casualty Company</option>
					<option value="National Fire  Marine Insurance Co">National Fire  Marine Insurance Co</option>
					<option value="National Interstate Insurance Co">National Interstate Insurance Co</option>
					<option value="National Liability  Fire Ins Co">National Liability   Fire Ins Co</option>
					<option value="Nationwide Mutual Insurance Co">Nationwide Mutual Insurance Co</option>
					<option value="Northland Insurance Company">Northland Insurance Company</option>
					<option value="Oak Brook County Mutual Ins Co">Oak Brook County Mutual Ins Co</option>
					<option value="Ohio Casualty Insurance Co">Ohio Casualty Insurance Co</option>
					<option value="Oklahoma Surety Company">Oklahoma Surety Company</option>
					<option value="Old American Cty Mutual Fire Ins Co">Old American Cty Mutual Fire Ins Co</option>
					<option value="Old Republic Insurance Co">Old Republic Insurance Co</option>
					<option value="Phoenix Insurance Company">Phoenix Insurance Company</option>
					<option value="Progressive Ins Co - Personal Auto Policy">Progressive Ins Co - Personal Auto Policy</option>
					<option value="Republic Western Ins Co">Republic Western Ins Co</option>
					<option value="Safeco Ins Co Of America">Safeco Ins Co Of America</option>
					<option value="Sagamore Insurance Co">Sagamore Insurance Co</option>
					<option value="Scottsdale Insurance Company">Scottsdale Insurance Company</option>
					<option value="Sentry Insurance a Mutual Co">Sentry Insurance a Mutual Co</option>
					<option value="Southern Farm Bureau Cas Ins Co">Southern Farm Bureau Cas Ins Co</option>
					<option value="Southern Fire Casualty Co">Southern Fire Casualty Co</option>
					<option value="Southern General Ins Co">Southern General Ins Co</option>
					<option value="Southern Mutual Church Insurance Co">Southern Mutual Church Insurance Co</option>
					<option value="State County Mutual Fire Ins Co">State County Mutual Fire Ins Co</option>
					<option value="State Farm Cty Mutual Ins Co of Tx">State Farm Cty Mutual Ins Co of Tx</option>
					<option value="State Farm Mutual Auto Ins Co">State Farm Mutual Auto Ins Co</option>
					<option value="Texas Farm Bureau Mutual Ins Co">Texas Farm Bureau Mutual Ins Co</option>
					<option value="Travelers Insurance Group">Travelers Insurance Group</option>
					<option value="Trinity Universal Group">Trinity Universal Group</option>
					<option value="Truck Insurance Exchange">Truck Insurance Exchange</option>
					<option value="Twin City Fire Insurance Co">Twin City Fire Insurance Co</option>
					<option value="Union Insurance Company">Union Insurance Company</option>
					<option value="Union Standard Ins Co">Union Standard Ins Co</option>
					<option value="United Fire Casualty Co">United Fire  Casualty Co</option>
					<option value="United Services Auto Assoc (USAA)">United Services Auto Assoc (USAA)</option>
					<option value="Universal Underwriters Insurance Co">Universal Underwriters Insurance Co</option>
					<option value="Victoria Automobile Insurance Co">Victoria Automobile Insurance Co</option>
					<option value="Westport Insurance Corp">Westport Insurance Corp</option>
					<option value="Windsor Insurance Company">Windsor Insurance Company</option>
					<option value="Zurich Ins Co Grp">Zurich Ins Co Grp</option>
				 </select>
					</div>

				</div>
				<div class="form-row enter_insured_name_div" style='display:none'>
					<div class="form-holder w-100">
					<label>Enter name</label>
					<input type="text" class="form-control Who_are_you_insured_enter" name="Who_are_you_insured_enter">

				</div>
				</div>
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>What is your Current Policy Number?</label>
						<input type="text" class="form-control Current_Policy_Number" name="Current_Policy_Number">
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>What is your Current Policy Effective Date?</label>
						<input type="text" class="form-control datepicker current_policy_Effective_date" name="current_policy_Effective_date" value="<?php echo date("m/d/Y");?>" placeholder='<?php echo date('m/d/Y');?>' >
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>What is your Current Policy Expiration Date?</label>
						<input type="text" class="form-control datepicker current_policy_Expiration_date " name="current_policy_Expiration_date" value="<?php echo date("m/d/Y");?>" placeholder='<?php echo date('m/d/Y');?>'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>What is your Current Liability Limit?</label>
					<select class='form-control Current_Liability_limit ' name='Current_Liability_limit'>
					<option value="Phys Dam Only">Phys Dam Only</option>
					<option value="Non Truck Liab">Non Truck Liab</option>
					<option value="State Min">State Min</option>
					<option value="25/50">25/50</option>
					<option value="50/100">50/100</option>
					<option value="100 CSL">100 CSL</option>
					<option value="100/300">100/300</option>
					<option value="300 CSL">300 CSL</option>
					<option value="350 CSL">350 CSL</option>
					<option value="250/500">250/500</option>
					<option value="500 CSL">500 CSL</option>
					<option value="750 CSL">750 CSL</option>
					<option selected="selected" value="1 Million CSL">1 Million CSL</option>
					</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Has insured had continuous coverage for at least one year?</label>
					 <div class='radio'>
						<input type="radio" name="continuous_coverage" class="continuous_coverage" checked value='Yes'><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="continuous_coverage" class="continuous_coverage" value='No'><label>No</label>
					</div>
					</div>

				</div>
				</div>
				</div>
				
				<div class='main_field_div'>
			<h2 class="fs-title">Proof of Prior Insurance</h2>
			<h3 class="fs-subtitle"></h3>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do you have a general liability or a business policy insurance?</label>
					 <select class='Proof_Insurance' name='Proof_Insurance'>
					 <option value="General Liability Insurance" >General Liability Insurance</option>
					<option selected="selected" value="Business Owners Policy">Business Owners Policy</option>
					<option value="Neither">Neither</option>
					</select>
					</div>

				</div>	
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Year current business was established (YYYY - enter 9999 if unknown or not applicable):</label>
					<input type="text" class="form-control" name="Year_current_business" class='Year_current_business' value='9999' ID='Year_current_business_VAL'>
					</div>

				</div>	
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do you need to add additional insured?</label>
					 <select class='Additional_Insureds' name='Additional_Insureds'>
						<option selected="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					</div>

				</div>	
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do you have waivers of subrogation?</label>
					 <select class='Waivers_Subrogation' name='Waivers_Subrogation'>
						<option selected="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					</div>

				</div>					
				
			</div>
				
				
				
				<div class='main_field_div'>
				<h2 class="fs-title">Are you required to maintain ELD?</h2>
			<h3 class="fs-subtitle"></h3>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Is the customer required to maintain hours of service records using an Electronic Logging Device (ELD)?</label>
					<div class='radio'>
						<input type="radio" name="customer_required_to_maintain_hours" class="customer_required_to_maintain_hours" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="customer_required_to_maintain_hours" class="customer_required_to_maintain_hours" value='No'><label>No</label>
					</div>
					</div>
					</div>

			</div>
				
		</div>
		
		<div class='col-md-6 right'>
				
			
			<div class='main_field_div'>
				<h2 class="fs-title">Policy Filings</h2>
			<h3 class="fs-subtitle"></h3>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Are any state or federal filings required?</label>
					 <div class='radio'>
						<input type="radio" name="federal_filings_required" class="federal_filings_required" value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="federal_filings_required" class="federal_filings_required" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do we insure all commercial vehicles the insured owns?</label>
					 <div class='radio'>
						<input type="radio" name="commercial_vehicles" class="commercial_vehicles " value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="commercial_vehicles" class="commercial_vehicles" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do we insure all vehicles that the insured uses?</label>
					 <div class='radio'>
						<input type="radio" name="insured_uses_business" class="insured_uses_business" value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="insured_uses_business" class="insured_uses_business" value='No'><label>No</label>
					</div>
					</div>
				</div>
				
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>How often are MVRs reviewed?</label>
					
						<input type="text" name="MVRs_reviewed" class="MVRs_reviewed" id='MVRs_reviewed' value='Annually '>
					</div>
				</div>
				
				<!--div class="form-row">
					<div class="form-holder w-100">
					<label>Are drivers required to pass a drug test at time of hire?</label>
					<div class='radio'>
						<input type="radio" name="required_to_pass_a_drug" class="required_to_pass_a_drug" value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="required_to_pass_a_drug" class="required_to_pass_a_drug" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Are any drivers not covered by Workers Comp? If yes, provide details.</label>
					<div class='radio'>
						<input type="radio" name="covered_by_Workers" class="covered_by_Workers" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="covered_by_Workers" class="covered_by_Workers" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Does applicant hire drivers from driver leasing firms?</label>
					<div class='radio'>
						<input type="radio" name="driver_leasing_firms" class="driver_leasing_firms" value='Yes' checked ><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="driver_leasing_firms" class="driver_leasing_firms" value='No'><label>No</label>
					</div>
					</div>
				</div-->
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Are all vehicles listed owned and registered to applicant?</label>
					 <div class='radio'>
						<input type="radio" name="vehicles_listed_owned" class="vehicles_listed_owned" value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="vehicles_listed_owned" class="vehicles_listed_owned" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Any vehicles titled to an individual instead of business? If yes, provide details.</label>
					 <div class='radio'>
						<input type="radio" name="individual_instead_of_business" class="individual_instead_of_business" value='Yes'><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="individual_instead_of_business" class="individual_instead_of_business" value='No' checked><label>No</label>
					</div>
					</div>
				</div>
				
				<div class="form-row" id='explanations_div' style='display:none' >
					<div class="form-holder w-100">
					<label>Please provide any explanations for answers or information requested below:</label>
					<textarea name="explanations" class="explanations" id='explanations'></textarea>
					</div>
				</div>
				
			</div>
			<div class='main_field_div'>
				<h2 class="fs-title">Filing Types</h2>
			<h3 class="fs-subtitle"></h3>
			
			
			<!--div class="form-row">
					<div class="form-holder w-100">
					<label>What types of filings do you require?</label>	
					<select class="form-control List_Filing" id='List_Filing' name='List_Filing'>
					<option  value='' selected='selected'>Select Filing</option> 
					<option  value='Federal'>Federal</option> 
					<option  value='State'>State</option> 
					<option  value='Both'>Both</option> 
					<option  value='Other'>Other</option> 
					</select>
					</div>
				</div>
				<div class="form-row customer_in_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Select State</label>	
					<select class="form-control List_Filing_state" id='List_Filing_state' name='List_Filing_state'>
					<option  value='' selected='selected'>Select State</option> 
					<option  value='CA'>CA</option> 
					<option  value='TX'>TX</option> 
					</select>
					
					</div>
				</div>
				<div class="form-row customer_state_div_value" style='display:none;'>
					
				</div-->
			
			
			
			
			
			
			
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Federal:</label>
					 <div class='radio'>
						<input type="radio" name="Federal" class="Federal" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Federal" class="Federal" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Federal Cargo (BMC 34)</label>
					 <div class='radio'>
						<input type="radio" name="Federal_Cargo" class="Federal_Cargo" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Federal_Cargo" class="Federal_Cargo" value='No'><label>No</label>
					</div>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>MCS90</label>
					 <div class='radio'>
						<input type="radio" name="MCS90_val" class="MCS90_val" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="MCS90_val" class="MCS90_val" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>State:</label>
				<select name="fil_State" id="fil_State" class="fil_State">
				<option value=" ">Select State</option>
				<option value="0">0</option>
				<option value="1">1</option>
				
				</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>State Cargo (Form H):</label>
					<select name="fil_formh_cnt" id="fil_formh_cnt" class="fil_formh_cnt all a">

						<option value=" ">State Cargo (Form H)</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option><option value="8">8</option><option value="9">9</option></select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Enter State Filing Number</label>
					<input type="text" name="State_Filling_Number" class="State_Filling_Number" id='State_Filling_Number'/>
				</div>
				</div>
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>CA Authority Number</label>
						<input type="text" name="CA_Authority_Number" class="CA_Authority_Number" id='CA_Authority_Number'/>
					</div>
				</div>
				
				
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Other:</label>
					 <select name="fil_othr_cnt" id="fil_othr_cnt" class="Other">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
					</div>
				</div>
			</div>
				
				
			</div>
		</div>
	</div>
	<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_Underwriting action-button" value="Previous" />
		<input type="button" name="submit" class="action-button underwriting_data_next" value="Next" />
	</div>
</fieldset>
<fieldset class='eleventh'>
	<h2 class="fs-title">Coverage Limit Information</h2>
	<h3 class="fs-subtitle"></h3>
			<div class='main_form'>
			<div class='row'>
				<div class='col-md-6'>
				
				<div class="form-row">
					<div class="form-holder w-100">	
				<label>Do you need non-trucking insurance? If yes, how much do you need?</label>
				<select class="form-control select_Non_trucks" id="select_Non_trucks" name="select_Non_trucks">
  				<option value="None" selected>None</option>
				<option value="100k">100k</option>
				<option value="200k">200k</option>
				<option value="250k">250k</option>
				<option value="500k">500k</option>
				<option value="750k">750k</option>
				<option value="1million">1million</option>
				
			</select>
				</div>
			</div>
				
				
				
				<div class="form-row auto_Liability_none" id='auto_Liability_div'>
					<div class="form-holder w-100">
					<label>Since you have a DOT and you need the filings, are you looking for 750 CSL or 1M CSL auto liability?</label>
					
					 <div class='radio'>
						<input type="radio" name="Auto_Liability" class="Auto_Liability" value='$1M CSL' checked><label>$1M CSL</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Auto_Liability" class="Auto_Liability" value='$750 CSL'><label>$750 CSL</label>
					</div>
					<div class='radio'>	
					<input type="radio" name="Auto_Liability" class="Auto_Liability" value='CSL = Combined Single Limit'><label>CSL = Combined Single Limit</label>
						
					</div>
					</div>
				</div>
				
				<!--div class="form-row">
					<div class="form-holder w-100">
					 <label>Do you need $1,000,000 Combined Single Limit for Auto Liability?</label>	
					<div class='radio'>
						<input type="radio" name="Combined_Single_Limit" class="Combined_Single_Limit" value='Yes'checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Combined_Single_Limit" class="Combined_Single_Limit" value='No'><label>No</label>
					</div>
					</div>
				</div-->
				
				<div class="form-row">
					<div class="form-holder w-100">
					 <label>For your physical damage, would you like to have (choices) for the deductible?</label>	
					 <div class='radio'>
						<input type="radio" name="AL_Deductible" class="AL_Deductible" value='$2,500' checked><label>$2,500</label>
					</div>
					<div class='radio'>
						<input type="radio" name="AL_Deductible" class="AL_Deductible" value='$500'><label>$500</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="AL_Deductible" class="AL_Deductible" value='$1,000'><label>$1,000</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="AL_Deductible" class="AL_Deductible" value='Other'><label> Other 
						<input type="text" name="AL_Deductible_text" value="" id='AL_Deductible_text' style='display:none;' value='$500'></label>
					</div>
					</div>
				</div>
				
				 <div class="form-row">
					<div class="form-holder w-100">
					<label>Uninsured Motorists/Uninsured Motorists?</label>
						<div class='radio'>	
						<input type="radio" name="UM_UIM" class="UM_UIM" value='Rejected' checked><label> Rejected</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="UM_UIM" class="UM_UIM" value='Minimum State Limit Accepted'><label>Minimum State Limit Accepted</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="UM_UIM" class="UM_UIM" value='Higher Limit'><label>Higher Limit 
						<input type="text" class='UM_UIM_value' name='UM_UIM_value' id='UM_UIM_value'style='display:none;' value='Rejected'></label>
					</div>
					</div>
				</div>
				 <div class="form-row">
					<div class="form-holder w-100">
					<label>Uninsured motorist property damage?</label>
						<div class='radio'>	
						<input type="radio" name="UM_Pd" class="UM_Pd" value='Rejected' checked><label> Rejected</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="UM_Pd" class="UM_Pd" value='Minimum State Limit Accepted'><label>Minimum State Limit Accepted</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="UM_Pd"  class="UM_Pd" value='Higher Limit'><label>Higher Limit <input type="text" id='UM_Pd_value' style='display:none;' value='Rejected' name='UM_Pd_value'></label>
					</div>
					</div>
				</div>
				
				
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Would you like Medical payments?</label>
						<div class='radio'>	
						<input type="radio" name="Medical_Payments" class="Medical_Payments" value='Rejected' checked><label> Rejected</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Medical_Payments" class="Medical_Payments"value='$5,000'><label>$5,000</label>
					</div>
					</div>
				</div>
				</div>
				
				<div class='col-md-6'>
				<div class='main_field_div'>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Would you like to add a Personal Injury Protection coverage?</label>
						<div class='radio'>	
						<input type="radio" name="PIP" class="PIP" value='Rejected' checked><label> Rejected</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="PIP" class="PIP" value='Statutory Limits Accepted'><label>Statutory Limits Accepted</label>
					</div>
					</div>
				</div>
				
				
				<div class="form-row">
					<div class="form-holder w-100">
					
						<div class='txt'>	
				<h2 class="fs-title">Motor Truck Cargo</h2><label>
				</div>
						</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do you know the limit required?</label>
						<div class='radio'>	
						<input type="radio" name="know_the_limit_required_motor" class="know_the_limit_required_motor" value='Yes' ><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="know_the_limit_required_motor" class="know_the_limit_required_motor" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row enter_the_limit_required_motor_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Enter Limit</label>
				<select class="form-control enter_the_limit_required_motor" name="enter_the_limit_required_motor">
  				<option value="" selected='selected'>Select</option>
  				<option value="10k">10k</option>
				<option value="25k">25k</option>
				<option value="35k">35k</option>
				<option value="45k">45k</option>
				<option value="55k">55k</option>
				<option value="100k">100k</option>
				<option value="other">other</option>
						</select>
						
					
					</div>
				</div>
				<div class="form-row enter_the_limit_required_motor_other_div" style='display:none;'>
					<div class="form-holder w-100">
						<input type="text" name="enter_the_limit_required_motor_other" class="enter_the_limit_required_motor_other"/>
					
					</div>
				</div>
				
				
				
						

				
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>Do you need a Limit of $100,000 for the Motor Truck Cargo?</label>
						<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo" class="need_Limit_Motor_Truck_CArgo" value='Yes' checked><label> Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo" class="need_Limit_Motor_Truck_CArgo" value='No'><label>No</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo"  class="need_Limit_Motor_Truck_CArgo" value='Other'><label>Other</label>
					</div>
					</div>
				</div>
				<div class="form-row Motor_Truck_Cargo_limit_value_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Select Limit</label>
						<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo_other" class="need_Limit_Motor_Truck_CArgo_other" value='$150,000'><label> $150,000</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo_other" class="need_Limit_Motor_Truck_CArgo_other" value='$250,000'><label>$250,000</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo_other"  class="need_Limit_Motor_Truck_CArgo_other" value='$300,000'><label>$300,000</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="need_Limit_Motor_Truck_CArgo_other"  class="need_Limit_Motor_Truck_CArgo_other" value='$500,000'><label>$500,000</label>
					</div>
					</div>
				</div>
				<div class="form-row Trailer_Interchange_coverage_div">
					<div class="form-holder w-100">
					<label>Do you need Trailer Interchange coverage?</label>
						<div class='radio'>	
						<input type="radio" name="Trailer_Interchange_coverage" class="Trailer_Interchange_coverage" value='Yes'><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Trailer_Interchange_coverage" class="Trailer_Interchange_coverage" value='No'><label>No</label>
					</div>
					</div>
				</div>
				
				<div class="form-row know_the_limit_required_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Do you know the limit required?</label>
						<div class='radio'>	
						<input type="radio" name="know_the_limit_required" class="know_the_limit_required" value='Yes' checked><label>Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="know_the_limit_required" class="know_the_limit_required" value='No'><label>No</label>
					</div>
					</div>
				</div>
				<div class="form-row enter_the_limit_required_div" style='display:none;'>
					<div class="form-holder w-100">
					<label>Enter Limit</label>
						<input type="text" name="enter_the_limit_required" class="enter_the_limit_required"/>
					
					</div>
				</div>
				</div>
				</div>
			</div>
		
		<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_Coverage_Limit_Information action-button" value="Previous" />
		<input type="button" name="next" class="action-button Coverage_Limit_Information_next" value="Next" />
	</div>
	
</fieldset>
<fieldset class='twelve'>
	<h2 class="fs-title">Let me collect some information with your operation.</h2>
		<h3 class="fs-subtitle"></h3>
		<div class='col-md-12'>
			<h2 class="fs-title">What percentage of your loads is in</h2>
				
				<div class="form-row">
					<div class="form-holder w-100">
						<label>0-100 miles?</label>
						<input type="number" name="percentage_one" class="per_one" id="percentage_two_one" value="" min='0'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
						<label>101-300 miles?</label>
						<input type="number" name="percentage_two" class="per_two" id="percentage_two_id" value="" min='0'>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-holder w-100">
						<label>301-600 miles?</label>
							<input type="number" name="percentage_three" class="per_three" id="percentage_three_id" value="" min='0'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
						<label>600+ miles?</label>
							<input type="number" name="percentage_four" class="per_four" id="percentage_four_id" value="" min='0'>
					</div>
				</div>				
				
			</div>
			
		
		 <!--div class='col-md-6'>
				<h2 class="fs-title">Estimates</h2>	
				<div class="form-row">
					<div class="form-holder w-100">
						<label>Average Radius</label>
						<input type="number" name="Estimates_one" class="Esti_one" id="Estimates_one_id" value="" min='0'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
						
						<label>Longest Radius</label>
						<input type="number" name="Estimates_two"  class="Esti_two" id="Estimates_two_id"  value="" min='0'>
					</div>
				</div>
				<div class="form-row">
					<div class="form-holder w-100">
						<label>Furthest City</label>
						<input type="number" name="Estimates_three"  class="Esti_three" id="Estimates_three_id"  value="" min='0'>
					</div>
				</div>
								
			</div--> 
		
			
			
		
		<div class='main_form'>
				<div class='row'>
				<h2 class="fs-title">Do you know operation classification? Is it common, private, or nontrucking?</h2>
				<div class="col-md-3 input_one_b">
					<input type="checkbox" name="Business" value="yes" id="chk_one" class="chk_one_cl">What percentage is common carrier type?<br>
					
					<input type="number" name="Business_one_name" class="Business_one" id="Business_first_id"  value="" min='0'>
				</div>
					<div class="col-md-3 input_two_b">
					<input type="checkbox" name="Business" value="" id="chk_two" class="chk_two_id">What percentage is contract carrier type?<br>
					<input type="number" name="Business_Contract" class="Business_two" id="Business_contract_id"  value="" min='0'>
					</div>				
					<div class="col-md-3 input_three_b">
					<input type="checkbox" name="Business" value="" id="chk_thr" class="chk_three_id">What percentage is private carrier type?<br>
					<input type="number" name="Business_Private" class="Business_three" id="Business_Private_id"  value="" min='0'>
					</div>
					<div class="col-md-3 input_four_b">
					<input type="checkbox" name="Non_Trucking_Business" value="" id="Non_Trucking_Business_check" class="Non_Trucking_check">If it's not 100% ask for the percentage of non-trucking<br>
					<input type="number" name="Non_Trucking" class="Business_three" id="Non_Trucking_id"  value="" min='0'>
					</div>
					<div class="col-md-3 input_five_b">
					<input type="checkbox" name="brokered_loads_Business" value="" id="chk_five" class="chk_five_id">What percentage is private carrier type?<br>
					<input type="number" name="brokered_loads" class="Business_five" id="brokered_loads_id"  value="" min='0'>
					</div>
					
					<div class="col-md-3 input_six_b">
					<input type="checkbox" name="Business" value="" id="Business_Other_check" class="Business_Other_check">Other<br>
					<input type="number" name="Business_Other" class="Business_three" id="Business_Other_id"  value="" min='0'>
					</div>
					
					</div>
				</div>				
					
					
					
				
				<div class="form-row">
					<div class="form-holder w-100">
					<label>You don't do household or commercial mover, right?</label>
						<div class='radio'>	
						<input type="radio" name="Operations_radio" class="Operations_radio_Mover" value='Yes'><label> Yes</label>
					</div>
					<div class='radio'>	
						<input type="radio" name="Operations_radio" class="Operations_radio_Mover" value='No'><label>No</label>
					</div>
					<div class='txt_cs'>	
						<h6>
						If Yes, you will need to complete & submit Movers Supplemental Application. 
						</h6>
					</div>
					</div>
				</div>
				
				
		
	
	<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_OperationDescription action-button" value="Previous" />
		<input type="button" name="next" class="action-button OperationDescription_next" value="Next" />
	</div>
	
	
	
</fieldset>
<fieldset class='thirteen'>
	<h2 class="fs-title">INSURANCE HISTORY-PAST 3 YEARS</h2>
<table width="100%"  border="1" >
<tbody>
<tr>
<th rowspan="2">Policy Period <br>
(MM/YY)</th>
<th rowspan="2">Company Name</th>
<th colspan="2">Liability Losses</th>
<th colspan="2">
Physical Damage Losses
</th>
</tr>
<tr>
<th>Number</th>
<th>Amount</th>
<th>Number</th>
<th>Amount</th>
</tr><tr>
<td><input type="text" class="datepickerDOB" name="policy_perid"  id='perid_id' placeholder='<?php echo date('m/d/Y');?>'>
	To
	<input type="text" class="datepickerDOB" name="policy_perid_two"  id='perid_id_two' placeholder='<?php echo date('m/d/Y');?>'>
</td>
<td><input type="text" name="input_companyname4" value="" id="inputcompanyname1" class="input_companyname1"></td>
<td><input type="number" name="input_liabilitylosses4" value=""id="liabilitylosses1" class="input_liabilitylosses1">
</td>
<td><input type="text" name="input_physicaldamage4" value="" id="physicaldamage1" class="input_physicaldamage4"></td>
<td><input type="text" name="physicaldamage7" value="" id="physicaldamage8" class="physicaldamage9"></td>
<td><input type="text" name="physicaldamageammount" value="" id="physicaldamageammount" class="physicaldamageammount"></td>
</tr>
<tr>
<td>		<input type="text" class="datepickerDOB" name="policy_perid_second" id='perid_id_second' placeholder='<?php echo date('m/d/Y');?>'>
	To
	<input type="text" class="datepickerDOB" name="policy_perid_two_second" id='perid_id_two_second' placeholder='<?php echo date('m/d/Y');?>'></td>
<td><input type="text" name="input_companyname5" value="" id="inputcompanyname2" class="input_companyname2"></td>
<td><input type="number" name="input_liabilitylosses5" value=""id="liabilitylosses2" class="input_liabilitylosses2"></td>
<td><input type="text" name="input_physicaldamage5" value="" id="physicaldamage2" class="input_physicaldamag4"></td>
<td><input type="text" name="physicaldamagenumber1" value="" id="physicaldamagenumber1" class="physicaldamagenumber1"></td>
<td><input type="text" name="physicaldamageammount1" value="" id="physicaldamageammount1" class="physicaldamageammount1"></td>
</tr>
<tr>
<td>		
<input type="text" class="datepickerDOB" name="policy_perid_third" value="<?php echo date("m/d/Y");?>" id='perid_id_third' placeholder='<?php echo date('m/d/Y');?>'>
	To
	<input type="text" class="datepickerDOB" name="policy_perid_two_third" value="<?php echo date("m/d/Y");?>" id='perid_id_two_third' placeholder='<?php echo date('m/d/Y');?>'>
<td><input type="text" name="input_companyname6" value="" id="inputcompanyname3" class="input_companyname3"></td>
<td><input type="number" name="input_liabilitylosses6" value=""id="liabilitylosses3" class="input_liabilitylosses3"></td>
<td><input type="text" name="input_physicaldamage6" value="" id="physicaldamage3" class="input_physicaldamage6"></td>
<td><input type="text" name="physicaldamagenumber6" value="" id="physicaldamagenumber7" class="physicaldamagenumber8"></td>
<td><input type="text" name="physicaldamageammount6" value="" id="physicaldamageammount7" class="physicaldamageammount8"></td>
</tr>
</tbody>
</table>
	
<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_InsuranceHistory action-button" value="Previous" />
		<input type="button" name="next" class="action-button InsuranceHistory_next" value="Next" />
	</div>
	
	
	
	
</fieldset>
<fieldset class='Fourteen_s'>
	<h2 class="fs-title">For your commodities, can you give me a percentage of ...</h2>
	<div class="container-fluid">
	<div class="row" id='Commodities_data_div'>
		<h3>No Specify Commodities Hauled. </h2>
	
	</div>
	<div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_Commodities action-button" value="Previous" />
		<input type="button" name="next" class="action-button Commodities_next" value="Next" />
	</div>
	
	</div>
	
	</fieldset>
<!--fieldset class='fifthteen'>
	<h2 class="fs-title">Cargo Related</h2>
	<div class="container-fluid">
	<div class="row">
	<div class="col-sm-6">
	<div class="form-row">
	<div class="form-holder w-100">
	<label>Limit Requested: </label>
	<div class="Limit">
	<input type="text" name="Limitss_second" class="Limit_second" value="" id="Limit_id_second">
	</div>
	</div>
	</div>
	<div class="form-row">
					<div class="form-holder w-100">
   
	<label>Deductible request :</label>
	<div class="Deductible">
	<input type="text" name="Deductibles_second" class="Deductible_second" value="" id="Deductible_id_second">
	</div>
	</div>
	</div>
	<div class="form-row">
					<div class="form-holder w-100">
	<label>Do you require refrigeration breakdown coverage ? </label>
	<div class="radio">
	 <input type="checkbox" name="refrigeration" value="Yes"> Yes 
	 </div>
	 <div class="radio">
  <input type="checkbox" name="refrigeration" value="No" > No 
	</div>
	</div>
	</div>
	<div class="form-row">
					<div class="form-holder w-100">
	<label>Do you require trailer interchange coverage ? </label>
	<div class="require">
	 <input type="checkbox" name="trailer" value="Yes"> Yes 
  <input type="checkbox" name="trailer" value="No" > No 
	</div>
	</div>
	</div>
	</div>
	
	<div class="col-sm-6">
	
	<div class="form-row">
					<div class="form-holder w-100">
	<label>Do you operate a Freight Brokerage  ? </label>
	<div class="radio">
	 <input type="radio" name="operate_Freight" value="Yes"> Yes 
	 </div>
	 <div class="radio">
	<input type="radio" name="operate_Freight" value="No" > No 
	</div>
	</div>
	</div>
	
	<div class="form-row">
					<div class="form-holder w-100">
	
	<label>Terminal Information :</label><br>
	Do you require coverage for cargo in terminals or at other places where vehicles are left overnight or at weekends either :<br> 
		<label> on Vehicles?   </label>
	 <input type="radio" name="on_Vehicles" value="Yes"> Yes 
	  <input type="radio" name="on_Vehicles" value="No" > No 
	  <label> off Vehicles?   </label>
	  <input type="checkbox" name="off_Vehicles" value="Yes"> Yes 
	  <input type="checkbox" name="off_Vehicles" value="No" > No 
	  </div>
	  
	   <div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_CargoRelated action-button" value="Previous" />
		<input type="button" name="next" class="action-button CargoRelated_next" value="Next" />
	</div>
	</div>
	</fieldset>
<fieldset class='Sixteen'>
	<h2 class="fs-title">Cargo Final</h2>
	<div class="container-fluid">
	<div class="col-sm-12">
	<h2 class="fs-title">Give details of the number of the vehicles for which cargo coverage is required :</h2>
	<div class="col-sm-4">
	<div class="row">
	  <label>Tractor Units<label> 
	  <input type="number" name="Tractor" value="" id="Tractor_id" class="Tractor_cls">
		</div>
		</div>
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Straight Truck <label> 
	  <input type="number" name="Straight" value="" id="Straight_id" class="Straight_cls">
		</div>
		</div>
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Reefer Trucks <label> 
	  <input type="number" name="Reefer" value="" id="Reefer_id" class="Reefer_cls">
		</div>
		</div>
	</div>
	<div class="col-sm-12">		
		<div class="col-sm-4">
	<div class="row">
	  <label>Tank Trucks <label> 
	  <input type="number" name="Tank" value="" id="Tank_id" class="Tank_cls">
		</div>
		</div>
		
		
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Other power Unit<label> 
	  <input type="text" name="Other" value="" id="Other_id" class="Other_cls">
		</div>
		</div>
		
	
		<div class="col-sm-4">
	<div class="row">
	  <label>Refrigeration Unit 10 yrs old or less<label> 
	  <input type="text" name="Refrigeration" value="" id="Refrigeration_id" class="Refrigeration_cls">
		</div>
		</div>
	</div>
	<div class="col-sm-12">		
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Refrigeration Unit more than to yrs old<label> 
	  <input type="text" name="Refrigeration_sec" value="" id="Refrigeration_id_sec" class="Refrigeration_cls_sec">
		</div>
		</div>
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Flat Bed Trailers<label> 
	  <input type="text" name="Flat_Refrigeration_sec" value="" id="Flat_Refrigeration_id_sec" class="Flat_Refrigeration_cls_sec">
		</div>
		</div>
		
		<div class="col-sm-4">
	<div class="row">
	  <label>Tank Trailers<label> 
	  <input type="text" name="Tank_Refrigeration_sec" value="" id="Tank_Refrigeration_id_sec" class="Tank_Refrigeration_cls_sec">
		</div>
		</div>
	</div>
		
	<div class="col-sm-12">		
			<div class="col-sm-4">
	<div class="row">
	  <label>Double Trailers<label> 
	  <input type="text" name="Double_Refrigeration_sec" value="" id="Double_Refrigeration_id_sec" class="Double_Refrigeration_cls_sec">
		</div>
		</div>
		
		<div class="col-sm-4">
		<div class="row">
	  <label>Total Number of  Trailers<label> 
	  <input type="text" name="Total_Refrigeration_sec" value="" id="Total_Refrigeration_id_sec" class="Total_Refrigeration_cls_sec">
		</div>
		</div>
	
	</div>
	   <div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_CargoFinal action-button" value="Previous" />
		<input type="button" name="next" class="action-button CargoFinal_next" value="Next" />
		</div>
	</fieldset>
	
	
	<fieldset class='Seventeen'>
	<h2 class="fs-title">FMCSA </h2>
	<div class='row main_form'>
		<div class='col-md-6 left'>
			<div class='main_field_div'>
			<h3 class="fs-subtitle"></h3>
			<div class="form-row">
					<div class="form-holder w-100">
					 <label>Form</label>				
					 <input type="text" name="Form" value="" class="Form_one" id="Form_one">
					</div>

			</div>
				<div class="form-row">
					<div class="form-holder w-100">
					 <label>Type</label>				
					 <input type="text" name="Type" value="" class="Type_one" id="Type_one">
					</div>

				</div>
				<div class="form-row">
					<div class="form-holder w-100">
					 <label>Posted Date</label>				
					 <input type="date" name="Posted" value="" class="datepicker Posted_one" id="Posted_one">
					</div>

				</div>
				
				<div class="form-row">
					<div class="form-holder w-100">
					 <label>policy/Surety Number</label>				
					 <input type="text" name="policy" value="" class="policy_one" id="policy_one">
					</div>

				</div>
				<div class="form-row">
					<div class="form-holder w-100">
				   <label>Coverage Form</label>
					<input type="text" name="Coverage" value="" class="Coverage_class" id="Coverage_id" >
						</div>
				</div>
			</div>	
			</div>	
			<div class='col-md-6 left'>
			<div class='main_field_div'>
					
					<div class="form-row">
					<div class="form-holder w-100">
				   <label>To</label>
					<input type="text" name="To" value="" class="To_class" id="To_id" >
						</div>
					</div>	
					<div class="form-row">
					<div class="form-holder w-100">
				   <label>Cancellation Date</label>
					<input type="date" name="Cancellation" value="" class="Cancellation_class datepicker" id="Cancellation_id" >
						</div>
					</div>
					
					<div class="form-row">
					<div class="form-holder w-100">
				   <label>Effective Date</label>
					<input type="date" name="Effective" value="" class="Effective_class datepicker" id="Effective_id" >
						</div>
					</div>
					<div class="form-row">
					<div class="form-holder w-100">
				   <label>Insurence carrier</label>
					<input type="text" name="Insurence" value="" class="Insurence_class" id="Insurence_id" >
						</div>
					</div>
				</div>	
				</div>	
				</div>

	
	   <div class='previous_next_buttons'>
		<input type="button" name="previous" class="previous_PDFData action-button" value="Previous" />
		<input type="button" name="next" class="action-button PDFData_next" value="Submit" />
		</div>
		
		
		
		
		</div>
	</fieldset-->
	<fieldset class='eighteen'>
		<div class='row main_form'>
		
        <br><br> <h2 style="color:#0fad00">ThankYou</h2>
        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
		 <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
		   <span class="swal2-success-line-tip"></span>
		   <span class="swal2-success-line-long"></span>
		   <div class="swal2-success-ring"></div> 
		   <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
		   <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
		  </div>
        
        <p style="font-size:17px;color:#5C5C5C;">I got the information I need right now, we'll submit it to our carriers. Me and my colleague will give you callback within an hour. You'll also get a text message when your quote is ready.</p>
		<div class="form-row">
					<div class="form-holder w-100">
				   <label>What is the best number to receive the text message/confirmation?</label>
					<input type="text" name="alternate_phone_number" placeholder="Phone Number" required class='phoneNumber' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="alternate_phone_number"/>
					</div>
		</div>
		</div>
		 <div class='previous_next_buttons'>
		<input type="button" name="next" class="action-button Thankyou_next" value="Submit" />
		</div>
		<div class="alert alert-success" id='final_thanku_message' style='display:none'>
		  Thank you for calling givesurance. Have a great day!!
		</div>
		
	</fieldset>
</form>



<div id="Driver_add_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Driver</h4>
      </div>
	  
      <div class="modal-body">
	  <form id="Add_new_Driver_form" method="POST" action="#" novalidate="novalidate">
		<div class="row">
		<div class="col-xs-12">
		  <div class="well">
					<div class="form-group">
					  <label for="username" class="control-label">First Name</label>
						<input type="text" class="form-control" name="new_driver_first" id='new_driver_first'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Middle Initial</label>
						<input type="text" class="form-control" name="new_driver_middle" id='new_driver_middle'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Last Name</label>
						<input type="text" class="form-control" name="new_driver_last" id='new_driver_last'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Date of Birth/Age</label>
						<input type="text" class="form-control datepickerDOB" name="new_driver_dob" id='new_driver_dob'  placeholder='<?php echo date('m/d/Y');?>'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Marital Status</label>
					
					 <div class='radio'>
						<input type="radio" name="new_driver_marital_status" class="form-control new_driver_marital_status" value='Married' >
						<label>Married</label>
					</div>
					 <div class='radio'>
						<input type="radio" name="new_driver_marital_status" class="form-control new_driver_marital_status" checked value='Single'>
						<label>Single</label>
					</div>
					
					  </div>
					<div class="form-group">
					  <label for="username" class="control-label">What is the license state?</label>
					  <select name='new_driver_license_state' class='form-control'>
					  <option value=" ">Select State</option>
						<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IT">International</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="PR">Puerto Rico</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VI">Virgin Islands</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="DC">Washington DC</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
										<option value="AB">Alberta</option>
										<option value="BC">British Columbia</option>
										<option value="MB">Manitoba</option>
										<option value="NB">New Brunswick</option>
										<option value="NL">Newfoundland</option>
										<option value="NT">Northwest Territories</option>
										<option value="NS">Nova Scotia</option>
										<option value="ON">Ontario</option>
										<option value="PE">Prince Edward Island</option>
										<option value="QC">Quebec</option>
										<option value="SK">Saskatchewan</option>
										<option value="YT">Yukon Territory</option>

									</select>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">License Number</label>
								<input type="text" class="form-control" name="new_driver_licence" id='new_driver_licence'>
					
							</div>
							
							<div class="form-group">
								<label for="username" class="control-label">Commercial Driver's License (CDL)</label>
								<select name="new_driver_commercial" id="new_driver_commercial" class='form-control'>
										<option selected="selected" value="No">No</option>
										<option value="Yes">Yes</option>

								</select>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">Years of Exp.</label>
								<input type="text" class="form-control" name="new_driver_Exp" id='new_driver_Exp'>
					
							</div>
							<div class="form-group">
							<label for="username" class="control-label">Do you know the date of hire?</label>
							<input type="text" class="form-control datepicker" name="new_driver_hire_date" id='new_driver_hire_date' placeholder='Select Date' placeholder='<?php echo date('m/d/Y');?>'>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">Is there any points in the driving record? Do you know how many points?</label>
								<input type="text" class="form-control" name="new_driver_points" id='new_driver_points'>
					
							</div>
							
							<div class="form-group">
								<label for="username" class="control-label">Is the backup driver?</label>
								<select name="add_driver_Backup" id="add_driver_Backup" class='form-control'>
										<option selected="selected" value="No">No</option>
										<option value="Yes">Yes</option>

							</select>
							</div>
							
							
							<div class="form-group">
								<label for="username" class="control-label">Driver Owner</label>
								<select name="add_driver_Owner" id="add_driver_Owner" class='form-control'>
										<option  value="No">No</option>
										<option selected="selected" value="Yes">Yes</option>

							</select>
							</div>
							
							<div class="form-group">
								<label for="username" class="control-label">Is an SR22 required?</label>
								<div class='radio'>
									<input type="radio" name="new_driver_SR22" class="form-control new_driver_SR22" value='Yes'>
									<label>Yes</label>
								</div>
								 <div class='radio'>
									<input type="radio" name="new_driver_SR22" class="form-control new_driver_SR22" checked value='No'>
									<label>No</label>
								</div>
					
							</div>
							<!--div class="form-group">
								<label for="username" class="control-label">Is an SR22 required?</label>
								<div class='radio'>
									<input type="radio" name="new_driver_SR22" class="form-control new_driver_SR22" value='Yes'>
									<label>Yes</label>
								</div>
								 <div class='radio'>
									<input type="radio" name="new_driver_SR22" class="form-control new_driver_SR22" checked value='No'>
									<label>No</label>
								</div>
					
							</div-->
							<!--div class="form-group" id='driver_case_no'>
								<label for="username" class="control-label">Case Number</label>
								<input type="text" class="form-control" name="driver_case_no">
					
							</div-->
							
						</div>
					</div>
				</div>
			</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id='new_drive_add_button'>Add</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
	</div>
</div>


<div id="Driver_Edit_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Driver</h4>
      </div>
	  
      <div class="modal-body">
	  <form id="Edit_Driver_form" method="POST" action="#" novalidate="novalidate">
		<div class="row">
		<div class="col-xs-12">
		  <div class="well">
					<div class="form-group">
					  <label for="username" class="control-label">First Name</label>
						<input type="text" class="form-control" name="edit_driver_first" id='edit_driver_first'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Middle Initial</label>
						<input type="text" class="form-control" name="edit_driver_middle" id='edit_driver_middle'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Last Name</label>
						<input type="text" class="form-control" name="edit_driver_last" id='edit_driver_last'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Date of Birth/Age</label>
						<input type="text" class="form-control datepickerDOB" name="edit_driver_dob" id='edit_driver_dob'>
					
					</div>
					<div class="form-group">
					  <label for="username" class="control-label">Marital Status</label>
					
					 <div class='radio'>
						<input type="radio" name="edit_driver_marital_status" class="form-control edit_driver_marital_status Married" value='Married'>
						<label>Married</label>
					</div>
					 <div class='radio'>
						<input type="radio" name="edit_driver_marital_status" class="form-control edit_driver_marital_status Single"  value='Single'>
						<label>Single</label>
					</div>
					
					  </div>
					<div class="form-group">
					  <label for="username" class="control-label">What is the license state?</label>
					  <select name='edit_driver_license_state' class='form-control' id='edit_driver_license_state'>
					  	<option value="">Select State</option>
						<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IT">International</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="PR">Puerto Rico</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VI">Virgin Islands</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="DC">Washington DC</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
										<option value="AB">Alberta</option>
										<option value="BC">British Columbia</option>
										<option value="MB">Manitoba</option>
										<option value="NB">New Brunswick</option>
										<option value="NL">Newfoundland</option>
										<option value="NT">Northwest Territories</option>
										<option value="NS">Nova Scotia</option>
										<option value="ON">Ontario</option>
										<option value="PE">Prince Edward Island</option>
										<option value="QC">Quebec</option>
										<option value="SK">Saskatchewan</option>
										<option value="YT">Yukon Territory</option>

									</select>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">License Number</label>
								<input type="text" class="form-control" name="edit_driver_licence" id='edit_driver_licence'>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">Commercial Driver's License (CDL)</label>
								<select name="edit_driver_commercial" id="edit_driver_commercial" class='form-control'>
										<option selected="selected" value="No">No</option>
										<option value="Yes">Yes</option>

								</select>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">Years of Exp.</label>
								<input type="text" class="form-control" name="edit_driver_Exp" id='edit_driver_Exp'>
					
							</div>
							<div class="form-group">
							<label for="username" class="control-label">Date of Hire</label>
							<input type="text" class="form-control datepicker" name="edit_driver_hire_date" id='edit_driver_hire_date' placeholder='Select Date'>
					
							</div>
							<div class="form-group">
								<label for="username" class="control-label">Is there any points in the driving record? Do you know how many points?</label>
								<input type="text" class="form-control" name="edit_driver_points" id='edit_driver_points'>
					
							</div>
							
							<div class="form-group">
								<label for="username" class="control-label">Is the backup driver?</label>
								<select name="edit_driver_Backup" id="edit_driver_Backup" class='form-control'>
										<option selected="selected" value="No">No</option>
										<option value="Yes">Yes</option>

							</select>
							</div>
							
							
							<div class="form-group">
								<label for="username" class="control-label">Driver Owner</label>
								<select name="edit_driver_Owner" id="edit_driver_Owner" class='form-control'>
										<option  value="No">No</option>
										<option  value="Yes">Yes</option>

							</select>
							</div>
							
							<div class="form-group">
								<label for="username" class="control-label">Is an SR22 required?</label>
								<div class='radio'>
									<input type="radio" name="edit_driver_SR22" class="form-control edit_driver_SR22 SR22_Yes" value='Yes'>
									<label>Yes</label>
								</div>
								 <div class='radio'>
									<input type="radio" name="edit_driver_SR22" class="form-control edit_driver_SR22 SR22_No"  value='No'>
									<label>No</label>
								</div>
					
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type='hidden' id='id_driver_to_update' name='id_driver_to_update'/>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id='update_driver_button'>Update</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>

		</form>
	</div>
	</div>
</div>


<div id="vehiles_add_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New vehicle</h4>
      </div>
	  <form id="Add_new_vehicle" method="POST" action="#" novalidate="novalidate">
      <div class="modal-body">
		<div class="row">
		<div class="col-xs-12">
		 <div class='well'>
			 
					<div class="form-group">
					  <label for="username" class="control-label">Type</label>
					<?php 
						$response_vehicles= $handleFunctionsObject->vehicle_type();
						foreach($response_vehicles as $responsedata){?>
					 <div class='radio'>
						<input type="radio" name="vahicle_type" class="vahicle_type" value='<?php echo $responsedata['category_type'];?>'
							data-id="<?php echo $responsedata['id'];?>" <?php if($responsedata['id']==1){echo 'checked';}?>>
						<label><?php echo $responsedata['category_type'];?></label>
					</div>
					<?php }
						?>
					  </div>
				<div class="form-group">
					  <label for="VIN" class="control-label">What is the Full VIN Number?</label>
					  <input type="text" class="form-control" id="vehicle_VIN" name="vehicle_VIN" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					<div class="form-group vehicle_Gross_weight_div" id='vehicle_Gross_weight_div'>
					  <label for="Gross" class="control-label">Gross weight</label>
					  <input type="text" class="form-control" id="vehicle_Gross_weight" name="vehicle_Gross_weight" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					<div class="form-group vehicle_Destination_City_div" id='vehicle_Destination_City_div'>
					  <label for="City of Destination" class="control-label">Where is the city of destination?</label>
					  <input type="text" class="form-control" id="vehicle_Destination_City" name="vehicle_Destination_City" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					
					<div class="form-group">
					  <label for="VIN" class="control-label">Category</label>
					<select name="C2VehicleDetails_category" id="C2VehicleDetails_category" class="form-control C2VehicleDetails_category">
					<option value=""></option>
						<?php $response_vehicles_cat= $handleFunctionsObject->VehicleCategory(1);					
							foreach($response_vehicles_cat as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['category'];?>"><?php echo $responsedata['category'];?></option>
						<?php }
						?>
					</select>
					</div>
					<div class="form-group category_sub " id='category_sub' style='display:none;'>
					  <label for="VIN" class="control-label">Sub Category</label>
					<select name="C2VehicleDetails_subcategory" id="C2VehicleDetails_subcategory" class="form-control C2VehicleDetails_subcategory">
					
					</select>
					</div>
					<div class="form-group">
					<label for="VIN" class="control-label">Year</label>
					<select name="C2VehicleDetails_year" id="C2VehicleDetails_year" class="form-control C2VehicleDetails_year">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group make_div_select">
					  <label for="make" class="control-label">Make</label>
					<select name="C2VehicleDetails_make" id="C2VehicleDetails_make" class="form-control C2VehicleDetails_make">
							<option value=""></option>
					
					</select>
					</div>
					<div class="form-group make_div" style="display:none;" >
					<label for='make' class='control-label'>Enter Make</label>
					<input type='text' name='C2VehicleDetails_make_name' id='C2VehicleDetails_make_name' class='form-control C2VehicleDetails_make_name'/>
					</div>
					<div class="form-group model_div_select" >
					  <label for="VIN" class="control-label">Model</label>
					<select name="C2VehicleDetails_model" id="C2VehicleDetails_model" class="form-control C2VehicleDetails_model">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group model_div" style="display:none;" >
					<label for='model' class='control-label'>Enter Model</label><input type='text' name='C2VehicleDetails_model_name' id='C2VehicleDetails_model_name' class='form-control C2VehicleDetails_model_name'/>
					</div>
					<div class="form-group body_div_select_body_style" >
					  <label for="Body" class="control-label">Body Style</label>
					<select name="C2VehicleDetails_body" id="C2VehicleDetails_body" class="form-control C2VehicleDetails_body">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group Garaging_div_select" >
					  <label for="ZIP" class="control-label">Garaging ZIP Code</label>
					
					 <input type="text" class="form-control C2VehicleDetails_GaragingZIPCode" id="C2VehicleDetails_GaragingZIPCode" name="C2VehicleDetails_GaragingZIPCode" value="" required="">
					</div>
					
					
					<div class="form-group Radius_div_select" >
					  <label for="Radius" class="control-label">What is your longest trip one way?</label>
						<select name="C2VehicleDetails_Radius" id="C2VehicleDetails_Radius" class="form-control C2VehicleDetails_Radius">
							<option value="50">50 miles</option>
						<option selected="selected" value="100 miles">100 miles</option>
						<option value="200 miles">200 miles</option>
						<option value="300 miles">300 miles</option>
						<option value="500 miles">500 miles</option>
						<option value="999 Unlimited miles">Unlimited miles</option>
						
						</select>
					</div>
					  <div class="form-group Radius_div_select_Vehicle">
					  <label for="Vehicle_v" class="control-label">What is the value of Vehicle?</label>
					  <input type="text" class="form-control C2VehicleDetails_Vehicle_v" id="C2VehicleDetails_Vehicle_v" name="C2VehicleDetails_Vehicle_v" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					 <div class="form-group C2VehicleDetails_Vehicle_Trailer" style='display:none'>
					  <label for="Vehicle_Trailer" class="control-label">What is the value of the Trailer:</label>
					  <input type="text" class="form-control C2VehicleDetails_Vehicle_Trailer" id="C2VehicleDetails_Vehicle_Trailer" name="C2VehicleDetails_Vehicle_Trailer" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					<div class="form-group Trailer_div_select" style='display:none'>
					  <label for="Radius" class="control-label">Trailer Type</label>
						<select name="C2VehicleDetails_Trailer" id="C2VehicleDetails_Trailer" class="form-control C2VehicleDetails_Trailer">
						<option value="owned" selected="selected">Owned</option>
						<option  value="non-owned">Non-owned</option>
						
						</select>
					</div>
					<div class="form-group trailer_value_div_select_one" style='display:none'>
					  <label for="Trailer_Value_div" class="control-label">What is the value needed for the owned trailer?</label>
						<input type='text' name="trailer_value" id="trailer_value" class="form-control trailer_value"/>
					</div>
					<div class="form-group trailer_value_div_select" style='display:none'>
					  <label for="Trailer_Value_div" class="control-label">What is the value needed for the non-owned trailer?</label>
						<input type='text' name="trailer_value" id="trailer_value" class="form-control trailer_value"/>
					</div>
					
					
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Is this vehicle used for business, personal or both?</label>
					  <div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='0' checked>
									<label>Business</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='1'>
									<label>Business/Personal</label>
								</div>
					<div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='1'>
									<label>Personal Only</label>
						</div>
					</div>
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Does this vehicle need comprehensive or collision coverage?</label>
					  <div class='radio'>
									<input type="radio" name="vehicle_used_comprehensive" class="form-control vehicle_used_comprehensive" value='0'>
									<label>Yes</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="vehicle_used_comprehensive" class="form-control vehicle_used_comprehensive" value='1' checked>
									<label>No</label>
								</div>
					
					</div>
					<div class="form-group add_any_modification_div" >
					  <label for="Vehicle Sub-Type" class="control-label">Do you want to add any modification in the insurance?</label>
					  <div class='radio'>
									<input type="radio" name="add_any_modification" class="form-control add_any_modification" value='Yes'>
									<label>Yes</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="add_any_modification" class="form-control add_any_modification" value='No' checked>
									<label>No</label>
						</div>
					
					</div>
					
					
					
					<div class="form-group body_modifications" >
					  <label for="Vehicle Sub-Type" class="control-label">What is the total value of all the equipments... *Is it between less than 2000 or more than 2000?* </label>
						<div class='radio'>
									<input type="radio" name="vehicle_modifications" class="form-control vehicle_modifications" value='$0 to $2,000' checked>
									<label>$0 to $2,000</label>
						</div>
						<div class='radio'>
									<input type="radio" name="vehicle_modifications" class="form-control vehicle_modifications" value='More than $2,000'>
									<label>More than $2,000</label>
						</div>
					
					</div>
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Do you need to add a loss payee?</label>
					  <select name="C2VehicleDetails_Loss" id="C2VehicleDetails_Loss" class="form-control C2VehicleDetails_Loss">
							<?php
							$losspayee=$handleFunctionsObject->VehicleLosspayee();
							
							foreach($losspayee as $res){
								?>
							<option value="<?php echo $res['loss_payee'];?>"><?php echo $res['loss_payee'];?></option>
						
							<?php } ?>
						</select>
					</div>
					<div class='loss_payee_yes' style='display:none;'>
					<div class="form-group " >
					  <label for="Vehicle Sub-Type" class="control-label">Full Name</label>
					   <input type="text" class="form-control loss_payee_full_name" id="loss_payee_full_name" name="loss_payee_full_name" value="" required="">
					</div>
					<div class="form-group " >
					  <label for="Vehicle Sub-Type" class="control-label">Address</label>
					   <textarea class="form-control loss_payee_address" id="loss_payee_address" name="loss_payee_address" ></textarea> 
					</div>
					</div>
					<input type='hidden' id='last_vehicle_graging_zip' class='last_vehicle_graging_zip'>
					 
			</div>
		</div>
       </div>
      </div>
      <div class="modal-footer">
	  <button type="button" type='button' class="btn btn-success" id='vehicles_add_button'>Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
      </div>
	  </form>
    </div>
	
  
</div>
</div>
<!--------update vehicle----------------------------->
<div id="vehicle_Edit_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Vehicle</h4>
      </div>
	  <form id="edit_vehicle" method="POST" action="#" novalidate="novalidate">
      <div class="modal-body">
		<div class="row">
		<div class="col-xs-12">
		 <div class='well'>
			 
					<div class="form-group">
					  <label for="username" class="control-label">Type</label>
					<?php 
						$response_vehicles= $handleFunctionsObject->vehicle_type();
						foreach($response_vehicles as $responsedata){?>
					 <div class='radio'>
						<input type="radio" name="vahicle_type" class="vahicle_type" value='<?php echo $responsedata['category_type'];?>' id ='<?php echo $responsedata['category_type'];?>'
							data-id="<?php echo $responsedata['id'];?>" <?php if($responsedata['id']==1){echo 'checked';}?>>
						<label><?php echo $responsedata['category_type'];?></label>
					</div>
					<?php }
						?>
					  </div>
					<!--div class="form-group">
					  <label for="Trailer_v" class="control-label">What is the value of the Trailer?</label>
					  <input type="text" class="form-control" id="Trailer_v_edit" name="Trailer_v_edit" value="" required="">
					  <span class="help-block"></span>
					</div-->
					<div class="form-group">
					  <label for="VIN" class="control-label">What is the Full VIN Number?</label>
					  <input type="text" class="form-control" id="vehicle_VIN_edit" name="vehicle_VIN" value="" required="">
					  <span class="help-block"></span>
					</div>
					<div class="form-group vehicle_Gross_weight_div">
					  <label for="Gross" class="control-label">Gross weight</label>
					  <input type="text" class="form-control" id="vehicle_Gross_weight_edit" name="vehicle_Gross_weight" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					<div class="form-group vehicle_Destination_City_div">
					  <label for="City of Destination" class="control-label">Where is the city of destination?</label>
					  <input type="text" class="form-control" id="vehicle_Destination_City_edit" name="vehicle_Destination_City" value="" required="">
					  <span class="help-block"></span>
					</div>
					 
					
					
					
					<div class="form-group">
					  <label for="VIN" class="control-label">Category</label><p id='current_selected_cat'></p>
					<select name="C2VehicleDetails_category" id="C2VehicleDetails_category_edit" class="form-control C2VehicleDetails_category">
					<option value=""></option>
						<?php $response_vehicles_cat= $handleFunctionsObject->VehicleCategory(1);					
							foreach($response_vehicles_cat as $responsedata){?>	
							<option data-id="<?php echo $responsedata['id'];?>" value="<?php echo $responsedata['category'];?>"><?php echo $responsedata['category'];?></option>
						<?php }
						?>
					</select>
					</div>
					<div class="form-group category_sub" id='category_sub' style='display:none;'>
					  <label for="VIN" class="control-label">Sub Category</label>
					<select name="C2VehicleDetails_subcategory" id="C2VehicleDetails_subcategory_edit" class="form-control C2VehicleDetails_subcategory">
					
					</select>
					</div>
					<div class="form-group">
					<label for="VIN" class="control-label">Year</label><p id='current_selected_year'></p>
					<select name="C2VehicleDetails_year" id="C2VehicleDetails_year_edit" class="form-control C2VehicleDetails_year">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group make_div_select">
					  <label for="make" class="control-label">Make</label><p id='current_selected_make'></p>
					<select name="C2VehicleDetails_make" id="C2VehicleDetails_make_edit" class="form-control C2VehicleDetails_make">
							<option value=""></option>
					
					</select>
					</div>
					<div class="form-group make_div" style="display:none;" >
					<label for='make' class='control-label'>Enter Make</label>
					<input type='text' name='C2VehicleDetails_make_name' id='C2VehicleDetails_make_name_edit' class='form-control C2VehicleDetails_make_name'/>
					</div>
					<div class="form-group model_div_select" >
					  <label for="VIN" class="control-label">Model</label><p id='current_selected_model'></p>
					<select name="C2VehicleDetails_model" id="C2VehicleDetails_model_edit" class="form-control C2VehicleDetails_model">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group model_div" style="display:none;" >
					<label for='model' class='control-label'>Enter Model</label><input type='text' name='C2VehicleDetails_model_name' id='C2VehicleDetails_model_name_edit' class='form-control C2VehicleDetails_model_name'/>
					</div>
					<div class="form-group body_div_select_body_style" >
					  <label for="Body" class="control-label">Body Style</label>
					<select name="C2VehicleDetails_body" id="C2VehicleDetails_body_edit" class="form-control C2VehicleDetails_body">
							<option value=""></option>
						
					</select>
					</div>
					<div class="form-group body_div_select_graging" >
					  <label for="ZIP" class="control-label">Garaging ZIP Code</label>
					
					 <input type="text" class="form-control C2VehicleDetails_GaragingZIPCode" id="C2VehicleDetails_GaragingZIPCode_edit" name="C2VehicleDetails_GaragingZIPCode" value="" required="">
					</div>
					
					<div class="form-group Radius_div_select" >
					  <label for="Radius" class="control-label">What is your longest trip one way?</label>
						<select name="C2VehicleDetails_Radius" id="C2VehicleDetails_Radius_edit" class="form-control C2VehicleDetails_Radius">
							<option value="50">50 miles</option>
						<option selected="selected" value="100 miles">100 miles</option>
						<option value="200 miles">200 miles</option>
						<option value="300 miles">300 miles</option>
						<option value="500 miles">500 miles</option>
						<option value="999 Unlimited miles">Unlimited miles</option>
						
						</select>
					</div>
					<div class="form-group Radius_div_select_Vehicle">
					  <label for="Vehicle_v" class="control-label">What is the value of Vehicle?</label>
					  <input type="text" class="form-control C2VehicleDetails_Vehicle_v_edit" id="C2VehicleDetails_Vehicle_v_edit" name="C2VehicleDetails_Vehicle_v_edit" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					 <div class="form-group C2VehicleDetails_Vehicle_Trailer_edit">
					  <label for="Vehicle_Trailer" class="control-label">What is the value of the Trailer:</label>
					  <input type="text" class="form-control C2VehicleDetails_Vehicle_Trailer_edit" id="C2VehicleDetails_Vehicle_Trailer_edit" name="C2VehicleDetails_Vehicle_Trailer" value="" required="">
					  <span class="help-block"></span>
					</div>
					
					<div class="form-group Trailer_div_select" style='display:none'>
					  <label for="Radius" class="control-label">Trailer Type</label>
						<select name="C2VehicleDetails_Trailer" id="C2VehicleDetails_Trailer" class="form-control C2VehicleDetails_Trailer">
						<option value="owned" selected="selected">Owned</option>
						<option  value="non-owned">Non-owned</option>
						
						</select>
					</div>
					<div class="form-group trailer_value_div_select_one" style='display:none'>
					  <label for="Trailer_Value_div" class="control-label">What is the value needed for the owned trailer?</label>
						<input type='text' name="trailer_value" id="trailer_value" class="form-control trailer_value"/>
					</div>
					<div class="form-group trailer_value_div_select" style='display:none'>
					  <label for="Trailer_Value_div" class="control-label">What is the value needed for the non-owned trailer?</label>
						<input type='text' name="trailer_value" id="trailer_value" class="form-control trailer_value"/>
					</div>
					
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Is this vehicle used for business, personal or both?</label>
					  <div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='Business' checked>
									<label>Business</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='Business/Personal'>
									<label>Business/Personal</label>
								</div>
					<div class='radio'>
									<input type="radio" name="vehicle_used_for" class="form-control vehicle_used_for" value='Personal Only'>
									<label>Personal Only</label>
						</div>
					</div>
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Does this vehicle need comprehensive or collision coverage?</label>
					  <div class='radio'>
									<input type="radio" name="vehicle_used_comprehensive" class="form-control vehicle_used_comprehensive" value='Yes'>
									<label>Yes</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="vehicle_used_comprehensive" class="form-control vehicle_used_comprehensive" value='No' checked>
									<label>No</label>
								</div>
					
					</div>
					<div class="form-group add_any_modification_div" >
					  <label for="Vehicle Sub-Type" class="control-label">Do you want to add any modification in the insurance?</label>
					  <div class='radio'>
									<input type="radio" name="add_any_modification" class="form-control add_any_modification" value='Yes'>
									<label>Yes</label>
								</div>
								
					<div class='radio'>
									<input type="radio" name="add_any_modification" class="form-control add_any_modification" value='No' checked>
									<label>No</label>
								</div>
					
					</div>
					
					
					<div class="form-group body_modifications" >
					  <label for="Vehicle Sub-Type" class="control-label">What is the total value of all the equipments... *Is it between less than 2000 or more than 2000?*</label>
						<div class='radio'>
									<input type="radio" name="vehicle_modifications" class="form-control vehicle_modifications" value='$0 to $2,000' checked>
									<label>less than $2000</label>
						</div>
						<div class='radio'>
									<input type="radio" name="vehicle_modifications" class="form-control vehicle_modifications" value='More than $2,000'>
									<label>More than $2,000</label>
						</div>
					
					</div>
					<div class="form-group body_vehicle_used" >
					  <label for="Vehicle Sub-Type" class="control-label">Do you need to add a loss payee?</label>
					  <select name="C2VehicleDetails_Loss" id="C2VehicleDetails_Loss_edit" class="form-control C2VehicleDetails_Loss">
							
							<?php
							$losspayee=$handleFunctionsObject->VehicleLosspayee();
							
							foreach($losspayee as $res){
								?>
							<option value="<?php echo $res['loss_payee'];?>"><?php echo $res['loss_payee'];?></option>
						
							<?php } ?>
						</select>
					</div>
					<div class='loss_payee_yes' style='display:none;'>
					<div class="form-group " >
					  <label for="Vehicle Sub-Type" class="control-label">Full Name</label>
					   <input type="text" class="form-control loss_payee_full_name" id="loss_payee_full_name" name="loss_payee_full_name" value="" required="">
					</div>
					<div class="form-group " >
					  <label for="Vehicle Sub-Type" class="control-label">Address</label>
					   <textarea class="form-control loss_payee_address" id="loss_payee_address" name="loss_payee_address" ></textarea> 
					</div>
					</div>
				<input type='hidden' id='vehicle_id_to_update' name='vehicle_id_to_update'>
			  
			</div>
		</div>
       </div>
      </div>
      <div class="modal-footer">
	  <button type="button" type='button' class="btn btn-success" id='vehicles_update_button'>Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
      </div>
	  </form>
    </div>
	
  
</div>
</div>

</body>
</html>


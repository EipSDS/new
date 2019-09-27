 $(document).ready(function(){
 
	
  $('.save').click(function(){
	var comprehensivetest =$("#comprehensive").prop('checked');
	if( comprehensivetest == true){
		var comprehensive = "checked";
	}else{
		var comprehensive = "false";
	}
	var specifiedtest =$("#specified").prop('checked');
		if( specifiedtest == true){
		var specified = "checked";
	}else{
		var specified = "false";
	}
		var reefertest =$("#reefer").prop('checked');
		if( reefertest == true){
		var reefer = "checked";
	}else{
		var reefer = "false";
	}
	
	var interchangetest =$("#interchange").prop('checked');
		if( interchangetest == true){
		var interchange = "checked";
	}else{
		var interchange = "false";
	}
	var interchange_agreementtest =$("#interchange_agreement").prop('checked');
		if( interchange_agreementtest == true){
		var interchange_agreement = "checked";
	}else{
		var interchange_agreement = "false";
	}
	var interchange_agreement_notest =$("#interchange_agreement_no").prop('checked');
		if( interchange_agreement_notest == true){
		var interchange_agreement_no = "checked";
	}else{
		var interchange_agreement_no = "false";
	}
	
	var hiredtest =$("#hired").prop('checked');
		if( hiredtest == true){
		var hired = "checked";
	}else{
		var hired = "false";
	}
	var ownedtest =$("#owned").prop('checked');
		if( ownedtest == true){
		var owned = "checked";
	}else{
		var owned = "false";
	}	
	var truckerstest =$("#truckers").prop('checked');
		if( truckerstest == true){
		var truckers = "checked";
	}else{
		var truckers = "false";
	}	
    console.log(comprehensive);
    console.log(specified);
	
var contact_id =$(".ContactId").val();
var dataform=	$('.dataform').find('select, textarea, input').serialize();
 var submitting_agency=$("#submitting_agency").val(); 
 var Contact_Person=$("#Contact_Person").val(); 
 var Applicant_Name=$("#applicant_name").val(); 
 var Applicant_lastName=$("#applicant_lastname").val(); 
 var effective_date=$("#effective_date").val(); 
 var garaging_address=$("#garaging_address").val(); 
 var dot=$("#dot").val(); 
 var City=$("#City").val(); 
 var State=$("#State").val(); 
 var Zip=$("#Zip").val(); 
 var years_in_bus=$("#years_in_bus").val(); 
 var mailing_address=$("#mailing_address").val(); 
 var City2=$("#City2").val(); 
 var State2=$("#State2").val(); 
 var Zip2=$("#Zip2").val(); 
 var contact_name=$("#contact_name").val(); 
 var Phone=$("#Phone").val(); 
 var e_mail=$("#e-mail").val(); 
 var miles=$("#miles").val(); 
 var miles_2=$("#miles_2").val(); 
 var miles_3=$("#miles_3").val(); 
 var miles_4=$("#miles_4").val(); 
 var major=$("#major").val(); 
 var csl=$("#csl").val(); 
 var um_uim=$("#um_uim").val(); 
 var pip=$("#pip").val(); 
 var limit=$("#limit").val(); 
 var deductible=$("#deductible").val(); 
 var motor_deductible=$("#motor_deductible").val(); 
 var cost=$("#cost").val(); 
 var employees=$("#employees").val(); 
 var payroll=$("#payroll").val(); 
 var owners=$("#owners").val(); 
 var coverage_limit=$("#coverage_limit").val(); 
 var trailers=$("#trailers").val(); 
 var active=$("#active").val(); 
  var Tractors1id=$("#Tractors1id").val(); 
 var Tractors1=$("#Tractors1").val(); 
 var make1=$("#make1").val(); 
 var Tractors2id=$("#Tractors2id").val(); 
 var Tractors2=$("#Tractors2").val(); 
 var make2=$("#make2").val(); 
 var Tractors3id=$("#Tractors3id").val(); 
 var Tractors3=$("#Tractors3").val(); 
 var make3=$("#make3").val(); 
 var Tractors4id=$("#Tractors4id").val(); 
 var Tractors4=$("#Tractors4").val(); 
 var make4=$("#make4").val(); 
 var Tractors5id=$("#Tractors5id").val(); 
 var Tractors5=$("#Tractors5").val(); 
 console.log(Tractors2id);
 console.log(Tractors3id);
 console.log(Tractors4id);
 console.log(Tractors5id);
  console.log(Tractors1);
 console.log(Tractors2);
 console.log(Tractors3);
 console.log(Tractors4);
 console.log(Tractors5);

 
 var make5=$("#make5").val(); 
 var VIN1=$("#VIN1").val(); 
 var vin2=$("#vin2").val(); 
 var vin3=$("#vin3").val(); 
 var vin4=$("#vin4").val(); 
 var vin5=$("#vin5").val(); 
 var Stated1=$("#Stated1").val(); 
 var Stated2=$("#Stated2").val(); 
 var Stated3=$("#Stated3").val(); 
 var Stated4=$("#Stated4").val(); 
 var Stated5=$("#Stated5").val(); 
 var trailer1id=$("#trailer1id").val(); 
 var trailer1=$("#trailer1").val(); 
 var trailer2=$("#trailer2").val(); 
 var trailermake1=$("#trailermake1").val(); 
 var trailer2id=$("#trailer2id").val(); 
 var trailermake2=$("#trailermake2").val(); 
 var trailer3id=$("#trailer3id").val(); 
 var trailer3=$("#trailer3").val(); 
 var trailermake3=$("#trailermake3").val(); 
 var trailer4id=$("#trailer4id").val(); 
 var trailer4=$("#trailer4").val(); 
 var trailermake4=$("#trailermake4").val(); 
 var trailer5id=$("#trailer5id").val(); 
 var trailer5=$("#trailer5").val(); 
 var trailermake5=$("#trailermake5").val(); 
 var VIN_new=$("#VIN_new").val(); 
 var VIN_new2=$("#VIN_new2").val(); 
 var VIN_new3=$("#VIN_new3").val(); 
 var VIN_new4=$("#VIN_new4").val(); 
 var VIN_new5=$("#VIN_new5").val(); 
 var Amount1=$("#Amount1").val(); 
 var Amount2=$("#Amount2").val(); 
 var Amount3=$("#Amount3").val(); 
 var Amount4=$("#Amount4").val(); 
 var Amount5=$("#Amount5").val(); 
 var name1id=$("#name1id").val(); 
 var name2id=$("#name2id").val(); 
 var name3id=$("#name3id").val(); 
 var name4id=$("#name4id").val(); 
 var name5id=$("#name5id").val(); 
 var Name1=$("#Name1").val(); 
 var name2=$("#name2").val(); 
 var name3=$("#name3").val(); 
 var name4=$("#name4").val(); 
 var name5=$("#name5").val(); 
 var eo1=$("#eo1").val(); 
 var eo2=$("#eo2").val(); 
 var eo3=$("#eo3").val(); 
 var eo4=$("#eo4").val(); 
 var eo5=$("#eo5").val(); 
 var state_license1=$("#state_license1").val(); 
 var state_license2=$("#state_license2").val(); 
 var state_license3=$("#state_license3").val(); 
 var state_license4=$("#state_license4").val(); 
 var state_license5=$("#state_license5").val(); 
 var License_State=$("#License_State").val(); 
 var License_State1=$("#License_State1").val(); 
 var License_State2=$("#License_State2").val(); 
 var License_State3=$("#License_State3").val(); 
 var License_State4=$("#License_State4").val(); 
 var Years_of_Experience1=$("#Years_of_Experience1").val(); 
 var experience2=$("#experience2").val(); 
 var experience3=$("#experience3").val(); 
 var experience4=$("#experience4").val(); 
 var experience5=$("#experience5").val(); 
 var birth1=$("#birth1").val(); 
 var birth2=$("#birth2").val(); 
 var birth3=$("#birth3").val(); 
 var birth4=$("#birth4").val(); 
 var birth5=$("#birth5").val(); 
 var date1=$("#date1").val(); 
 var date2=$("#date2").val(); 
 var date3=$("#date3").val(); 
 var date4=$("#date4").val(); 
 var date5=$("#date5").val(); 
 var Violations1=$("#Violations1").val(); 
 var Violations2=$("#Violations2").val(); 
 var Violations3=$("#Violations3").val(); 
 var Violations4=$("#Violations4").val(); 
 var Violations5=$("#Violations5").val(); 
 var Commodity1id=$("#Commodity1id").val(); 
 var Commodity1=$("#Commodity1").val(); 
 var Commodity2id=$("#Commodity2id").val(); 
 var Commodity2=$("#Commodity2").val(); 
 var Commodity3id=$("#Commodity3id").val(); 
 var Commodity3=$("#Commodity3").val(); 
 var Commodity4id=$("#Commodity4id").val(); 
 var Commodity4=$("#Commodity4").val(); 
 var Commodity5id=$("#Commodity5id").val(); 
 var Commodity5=$("#Commodity5").val(); 
 var hauled1=$("#hauled1").val(); 
 var hauled2=$("#hauled2").val(); 
 var hauled3=$("#hauled3").val(); 
 var hauled4=$("#hauled4").val(); 
 var hauled5=$("#hauled5").val(); 
 var Value1=$("#Value1").val(); 
 var Value2=$("#Value2").val(); 
 var Value3=$("#Value3").val(); 
 var Value4=$("#Value4").val(); 
 var Value5=$("#Value5").val(); 
 var Stated_Amount1=$("#Stated_Amount1").val(); 
 var Stated_Amount2=$("#Stated_Amount2").val(); 
 var Stated_Amount3=$("#Stated_Amount3").val(); 
 var Stated_Amount4=$("#Stated_Amount4").val(); 
 var Stated_Amount5=$("#Stated_Amount5").val(); 
 var Units_box1id=$("#Units_box1id").val(); 
 var Units_box2id=$("#Units_box2id").val(); 
 var Units_box3id=$("#Units_box3id").val(); 
 var Units_box4id=$("#Units_box4id").val(); 
 var Units_box1=$("#Units_box1").val(); 
 var Units_box2=$("#Units_box2").val(); 
 var Units_box3=$("#Units_box3").val(); 
 var Units_box4=$("#Units_box4").val(); 
 var Total_Miles1=$("#Total_Miles1").val(); 
 var Total_Miles2=$("#Total_Miles2").val(); 
 var Total_Miles3=$("#Total_Miles3").val(); 
 var Total_Miles4=$("#Total_Miles4").val(); 
 var Receipts1=$("#Receipts1").val(); 
 var Receipts2=$("#Receipts2").val(); 
 var Receipts3=$("#Receipts3").val(); 
 var Receipts4=$("#Receipts4").val(); 
 var loss1id=$("#loss1id").val(); 
 var loss2id=$("#loss2id").val(); 
 var loss3id=$("#loss3id").val(); 

 var Power_new2=$("#Power_new2").val(); 
 var Power_new3=$("#Power_new3").val(); 
 var Power_new4=$("#Power_new4").val(); 
 var Total_Incurred1=$("#Total_Incurred1").val(); 
 var Total_Incurred2=$("#Total_Incurred2").val(); 
 var Total_Incurred3=$("#Total_Incurred3").val(); 
 var Losses_Damage1=$("#Losses_Damage1").val(); 
 var Losses_Damage2=$("#Losses_Damage2").val(); 
 var Losses_Damage3=$("#Losses_Damage3").val();  
 var Total_Incurred_1=$("#Total_Incurred_1").val(); 
 var Total_Incurred_2=$("#Total_Incurred_2").val(); 
 var Total_Incurred_3=$("#Total_Incurred_3").val(); 
 var Motor_Truck1=$("#Motor_Truck1").val(); 
 var Motor_Truck2=$("#Motor_Truck2").val(); 
 var Motor_Truck3=$("#Motor_Truck3").val(); 
 var Motor_Truck4=$("#Motor_Truck4").val(); 
 var Motor_Truck5=$("#Motor_Truck5").val(); 
 var Motor_Truck6=$("#Motor_Truck6").val(); 
 var Cost_id=$("#Cost_id").val(); 
 var cslid=$("#cslid").val(); 
console.log(Cost_id);
console.log(cslid);
  var url = "http://givesurance.herokuapp.com/non_fleet_form/ajaxdata.php";
   $.ajax({
      type: "POST",
      url: url,
      data: {savedata:'success',contact_id:contact_id, submitting_agency:submitting_agency, cslid:cslid, Cost_id:Cost_id, deductible:deductible, comprehensive:comprehensive, specified:specified, reefer:reefer, interchange:interchange, interchange_agreement:interchange_agreement, interchange_agreement_no:interchange_agreement_no, hired:hired, owned:owned, truckers:truckers, Contact_Person:Contact_Person, Applicant_Name:Applicant_Name,Applicant_lastName:Applicant_lastName, garaging_address:garaging_address, dot:dot, City:City, State:State, Zip:Zip, years_in_bus:years_in_bus, mailing_address:mailing_address, City2:City2, State2:State2, Zip2:Zip2, contact_name:contact_name, Phone:Phone, e_mail:e_mail, miles:miles, miles_2:miles_2, miles_3:miles_3, miles_4:miles_4, major:major, csl:csl, um_uim:um_uim, pip:pip, limit:limit, motor_deductible:motor_deductible, cost:cost, effective_date:effective_date, payroll:payroll, employees:employees, owners:owners, coverage_limit:coverage_limit, trailers:trailers,  active:active, Tractors1id:Tractors1id, Tractors1:Tractors1, make1:make1, Tractors2id:Tractors2id, Tractors2:Tractors2, make2:make2, Tractors3id:Tractors3id, Tractors3:Tractors3, make3:make3, Tractors4id:Tractors4id, Tractors4:Tractors4, make4:make4, Tractors5id:Tractors5id, Tractors5:Tractors5, make5:make5, VIN1:VIN1, vin2:vin2, vin3:vin3, vin4:vin4, vin5:vin5, Stated1:Stated1, Stated2:Stated2,  Stated3:Stated3, Stated4:Stated4, Stated5:Stated5, trailer1id:trailer1id,   trailer1:trailer1, trailermake1:trailermake1, trailer2id:trailer2id, trailermake2:trailermake2, trailer3id:trailer3id, trailer2:trailer2,trailer3:trailer3, trailermake3:trailermake3, trailer4id:trailer4id, trailer4:trailer4, trailermake4:trailermake4, trailer5id:trailer5id, trailer5:trailer5, trailermake5:trailermake5, VIN_new:VIN_new, VIN_new2:VIN_new2, VIN_new3:VIN_new3, VIN_new4:VIN_new4, VIN_new5:VIN_new5, Amount1:Amount1, Amount2:Amount2, Amount3:Amount3, Amount4:Amount4, Amount5:Amount5, name1id:name1id, name2id:name2id, name3id:name3id, name4id:name4id, name5id:name5id, Name1:Name1, name2:name2, name3:name3, name4:name4, name5:name5, eo1:eo1, eo2:eo2, eo3:eo3, eo4:eo4, eo5:eo5, License_State:License_State, License_State1:License_State1, License_State2:License_State2, License_State3:License_State3, License_State4:License_State4, state_license1:state_license1,  state_license2:state_license2, state_license3:state_license3, state_license4:state_license4, state_license5:state_license5, Years_of_Experience1:Years_of_Experience1, experience2:experience2, experience3:experience3, experience4:experience4, experience5:experience5, birth1:birth1, birth2:birth2, birth3:birth3, birth4:birth4, birth5:birth5, date1:date1, date2:date2, date3:date3, date4:date4, date5:date5, Violations1:Violations1, Violations2:Violations2, Violations3:Violations3, Violations4:Violations4, Violations5:Violations5, Commodity1id:Commodity1id, Commodity1:Commodity1, Commodity2id:Commodity2id, Commodity2:Commodity2, Commodity3id:Commodity3id, Commodity3:Commodity3, Commodity4id:Commodity4id, Commodity4:Commodity4, Commodity5id:Commodity5id, Commodity5:Commodity5, hauled1:hauled1, hauled2:hauled2, hauled3:hauled3,	hauled4:hauled4, hauled5:hauled5, Value1:Value1, Value2:Value2, Value3:Value3, Value4:Value4, Value5:Value5, Stated_Amount1:Stated_Amount1, Stated_Amount2:Stated_Amount2, Stated_Amount3:Stated_Amount3, Stated_Amount4:Stated_Amount4, Stated_Amount5, Units_box1id:Units_box1id, Units_box2id:Units_box2id, Units_box3id:Units_box3id, Units_box4id:Units_box4id,  Units_box1:Units_box1, Units_box2:Units_box2, Units_box3:Units_box3, Units_box4:Units_box4, Total_Miles1:Total_Miles1, Total_Miles2:Total_Miles2, Total_Miles3:Total_Miles3, Total_Miles4:Total_Miles4, Receipts1:Receipts1, Receipts2:Receipts2, Receipts3:Receipts3, Receipts4:Receipts4, loss1id:loss1id, loss2id:loss2id, loss2id:loss2id,loss3id:loss3id, Power_new2:Power_new2, Power_new3:Power_new3, Power_new4:Power_new4, Total_Incurred1:Total_Incurred1, Total_Incurred2:Total_Incurred2, Total_Incurred3:Total_Incurred3, Losses_Damage1:Losses_Damage1, Losses_Damage2:Losses_Damage2, Losses_Damage3:Losses_Damage3, Total_Incurred_1:Total_Incurred_1, Total_Incurred_2:Total_Incurred_2, Total_Incurred_3:Total_Incurred_3, Motor_Truck1:Motor_Truck1, Motor_Truck2:Motor_Truck2, Motor_Truck3:Motor_Truck3, Motor_Truck4:Motor_Truck4, Motor_Truck5:Motor_Truck5, Motor_Truck6:Motor_Truck6},
      dataType: "text",
      success: function(resultData){
		 console.log(resultData);
		alert(resultData);
      }
});
    });
});
<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(0);
   class handleFunctions {
	   
    /*  $trelloListId	= '5d2901e0207a1126d1d915ea' ;
     $trelloApiKey	= '1164815231d570ac9de8d17de3ec7715' ;
     $trelloToken	= 'ceb1f6872aac2666dd8a92332305e2ade498f18ad27f829a5cec641d925d9957' ; */
	
	function pgConnect(){
		$con = pg_connect ("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
		if($con) {
		return $con;
		} else {
			return 0;
		}	
		
		
	}
	 function businessCategories(){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.business_type";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	} 
	function businessSubCategories($id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.subcategory_business where category_id=$id";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	} 
	
	function vehicle_type(){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.vehicle";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	} 
	function VehicleCategory($id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.category where vehicale_id=$id";
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	} 
	function VehicleSubCategory($id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.subcategory_vehicle where category_id=$id";
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	}
	
	
	function Vehicleyears($cat){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.year where category_id=$cat";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	} 
	function VehicleMake($vehicle_cat){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.make WHERE category_id=$vehicle_cat";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	}
	function VehiclesubMake($vehicle_cat){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.make WHERE sub_category_id=$vehicle_cat";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	}

	function VehicleModel($vehicle_cat,$year,$vehicle_make){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.model WHERE category_id=$vehicle_cat AND year_id=$year AND make_id=$vehicle_make";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	} 
	function VehicleBodyStyle($vehicle_cat,$year,$vehicle_make,$vehicle_model){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.body_style WHERE category_id=$vehicle_cat AND year_id=$year AND make_id=$vehicle_make AND model_id=$vehicle_model";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	} 	
	function VehicleLosspayee(){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.loss_payee";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
				
	}
	function insertviolation($contact_id,$accident_violation,$date){
		$conn = $this->pgConnect();
		$query = "INSERT INTO public.violation(contact_id, accident_violation, date)VALUES('".$contact_id."', '".$accident_violation."', '".$date."')";
		$result = pg_query($query); 
					
		if($result){
			$response= 1;
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	} 
	
	function insertVehicle($contact_id,$data){
		$conn = $this->pgConnect();
		if($data['C2VehicleDetails_category']!=''){
			$category=$data['C2VehicleDetails_category'];
			}else{
		$category=$data['C2VehicleDetails_category'];
		}
		if($data['C2VehicleDetails_subcategory']!=''){
			$subcategory=$data['C2VehicleDetails_subcategory'];
			}else{
		$subcategory=$data['C2VehicleDetails_subcategory'];
		}				
		if($data['C2VehicleDetails_make_name']!=''){
			$make=$data['C2VehicleDetails_make_name'];
			}else{
		$make=$data['C2VehicleDetails_make'];
		}
		if($data['C2VehicleDetails_model_name']!=''){
			$model =$data['C2VehicleDetails_model_name'];
			}else{
			$model=$data['C2VehicleDetails_model'];
		}
		if($data['vahicle_type']=='Trailer'){
			$query = "INSERT INTO public.contact_vehicles(
		contact_id, vehicle_type,trailer_number, vin, category, year, garaging_zip_code, is_business, is_comprehensive, value, loss_payee, trailer_type, non_owned_value, name, address,need_modification)
		VALUES('".$contact_id."', '".$data['vahicle_type']."','".$data['C2VehicleDetails_Vehicle_Trailer']."','".$data['vehicle_VIN']."', '".$category."','".$data['C2VehicleDetails_year']."','".trim($data['C2VehicleDetails_GaragingZIPCode'])."','".trim($data['vehicle_used_for'])."','".trim($data['vehicle_used_comprehensive'])."','".trim($data['vehicle_modifications'])."','".$data['C2VehicleDetails_Loss']."','".$data['C2VehicleDetails_Trailer']."','".$data['trailer_value']."','".$data['loss_payee_full_name']."','".trim($data['loss_payee_address'])."','".trim($data['add_any_modification'])."') RETURNING *";
		}else{
		 $query = "INSERT INTO public.contact_vehicles(
		contact_id, vehicle_type,vehicle_number, vin, gross_weight, city_of_destination, category, year, make, model, body_style, garaging_zip_code, radius, is_business, is_comprehensive, value, loss_payee, name, address,need_modification, sub_category)
		VALUES('".$contact_id."', '".$data['vahicle_type']."', '".$data['C2VehicleDetails_Vehicle_v']."','".$data['vehicle_VIN']."','".$data['vehicle_Gross_weight']."','".$data['vehicle_Destination_City']."','".$category."','".$data['C2VehicleDetails_year']."','".$make."','".$model."','".$data['C2VehicleDetails_body']."','".$data['C2VehicleDetails_GaragingZIPCode']."','".$data['C2VehicleDetails_Radius']."','".$data['vehicle_used_for']."','".trim($data['vehicle_used_comprehensive'])."','".trim($data['vehicle_modifications'])."','".$data['C2VehicleDetails_Loss']."','".$data['loss_payee_full_name']."','".trim($data['loss_payee_address'])."','".trim($data['add_any_modification'])."','".$subcategory."') RETURNING *";
		}
		$result = pg_query($query); 
					
		if($result){
			$fch = pg_fetch_assoc($result);
			$response= $fch;
		}else{
		$response=0	;
			
		}


		return $response;
		
	} 
	//new add vehicle
	
	function newinsertVehicle($contact_id,$data){
		$conn = $this->pgConnect();
	if($data['C2VehicleDetails_GaragingZIPCode'] != ""){
			$query = "INSERT INTO public.new_test(contact_id,zip_code) VALUES('".$contact_id."','".trim($data['C2VehicleDetails_GaragingZIPCode'])."')";
			$result = pg_query($query); 
	}
		pg_close($conn);			
		if($result){
echo "added";
		}else{
echo "not added";
			
		}
		
	}
	
	
	
	
	
	function updateVehicle($contact_id,$data){
		$conn = $this->pgConnect();
		if($data['C2VehicleDetails_subcategory']=''){
			$category=$data['C2VehicleDetails_subcategory'];
			}else{
		$category=$data['C2VehicleDetails_category'];
		}
		if($data['C2VehicleDetails_make_name']!=''){
			$make=$data['C2VehicleDetails_make_name'];
			}else{
		$make=$data['C2VehicleDetails_make'];
		}
		if($data['C2VehicleDetails_model_name']!=''){
			$model =$data['C2VehicleDetails_model_name'];
			}else{
			$model=$data['C2VehicleDetails_model'];
		}
		if($data['vahicle_type']=='Trailer'){
			
			if($data['C2VehicleDetails_year']!='' && ($data['C2VehicleDetails_category']!='' || $data['C2VehicleDetails_subcategory']!='')){
		 $query = "UPDATE  public.contact_vehicles SET
		contact_id='".$contact_id."', vehicle_type='".$data['vahicle_type']."', vin='".$data['vehicle_VIN']."', category='".$category."', year='".$data['C2VehicleDetails_year']."', garaging_zip_code='".$data['C2VehicleDetails_GaragingZIPCode']."', is_business='".$data['vehicle_used_for']."', is_comprehensive='".trim($data['vehicle_used_comprehensive'])."', value='".trim($data['vehicle_modifications'])."', loss_payee='".$data['C2VehicleDetails_Loss']."', trailer_type='".$data['C2VehicleDetails_Trailer']."', non_owned_value='".$data['trailer_value']."', name='".$data['loss_payee_full_name']."', address='".$data['loss_payee_address']."',gross_weight=' ',city_of_destination='',  make=' ', model=' ', body_style=' ', radius=' ',need_modification='".trim($data['add_any_modification'])."' WHERE id=".$data['vehicle_id_to_update']."";
			}elseif($data['C2VehicleDetails_year']=='' && !empty($category)){
			$query = "UPDATE  public.contact_vehicles SET
		contact_id='".$contact_id."', vehicle_type='".$data['vahicle_type']."', vin='".$data['vehicle_VIN']."', category='".$category."', garaging_zip_code='".$data['C2VehicleDetails_GaragingZIPCode']."', is_business='".$data['vehicle_used_for']."', is_comprehensive='".trim($data['vehicle_used_comprehensive'])."', value='".trim($data['vehicle_modifications'])."', loss_payee='".$data['C2VehicleDetails_Loss']."', trailer_type='".$data['C2VehicleDetails_Trailer']."', non_owned_value='".$data['trailer_value']."', name='".$data['loss_payee_full_name']."', address='".$data['loss_payee_address']."',gross_weight=' ',  city_of_destination='',  make=' ', model=' ', body_style=' ', radius=' ',need_modification='".trim($data['add_any_modification'])."' WHERE id=".$data['vehicle_id_to_update']."";
			}else{
			$query = "UPDATE  public.contact_vehicles SET
			contact_id='".$contact_id."', vehicle_type='".$data['vahicle_type']."', vin='".$data['vehicle_VIN']."', garaging_zip_code='".$data['C2VehicleDetails_GaragingZIPCode']."', is_business='".$data['vehicle_used_for']."', is_comprehensive='".trim($data['vehicle_used_comprehensive'])."', value='".trim($data['vehicle_modifications'])."', loss_payee='".$data['C2VehicleDetails_Loss']."', trailer_type='".$data['C2VehicleDetails_Trailer']."', non_owned_value='".$data['trailer_value']."', name='".$data['loss_payee_full_name']."', address='".$data['loss_payee_address']."',gross_weight=' ', longest_trip=' ', city_of_destination='',  make=' ', model=' ', body_style=' ', radius=' ',need_modification='".trim($data['add_any_modification'])."' WHERE id=".$data['vehicle_id_to_update']."";
			}
		}else{
			
			if(!empty($category) && $data['C2VehicleDetails_year']!='' && !empty($model)){
		   $query = "UPDATE  public.contact_vehicles SET
			contact_id='".$contact_id."', vehicle_type='".$data['vahicle_type']."',vehicle_number='".$data['C2VehicleDetails_Vehicle_v']."', vin='".$data['vehicle_VIN']."', gross_weight='".$data['vehicle_Gross_weight']."',  city_of_destination='".$data['vehicle_Destination_City']."', category='".$category."', year='".$data['C2VehicleDetails_year']."', make='".$make."', model='".$model."', body_style='".$data['C2VehicleDetails_body']."', garaging_zip_code='".$data['C2VehicleDetails_GaragingZIPCode']."', radius='".$data['C2VehicleDetails_Radius']."', is_business='".trim($data['vehicle_used_for'])."', is_comprehensive='".trim($data['vehicle_used_comprehensive'])."', value='".trim($data['vehicle_modifications'])."', loss_payee='".$data['C2VehicleDetails_Loss']."',name='".$data['loss_payee_full_name']."', address='".$data['loss_payee_address']."' ,need_modification='".trim($data['add_any_modification'])."' WHERE id=".$data['vehicle_id_to_update']."";
			}else{
				$query = "UPDATE  public.contact_vehicles SET
			contact_id='".$contact_id."', vehicle_type='".$data['vahicle_type']."',vehicle_number='".$data['C2VehicleDetails_Vehicle_v']."', vin='".$data['vehicle_VIN']."', gross_weight='".$data['vehicle_Gross_weight']."', city_of_destination='".$data['vehicle_Destination_City']."', garaging_zip_code='".$data['C2VehicleDetails_GaragingZIPCode']."', radius='".$data['C2VehicleDetails_Radius']."', is_business='".trim($data['vehicle_used_for'])."', is_comprehensive='".trim($data['vehicle_used_comprehensive'])."', value='".trim($data['vehicle_modifications'])."', loss_payee='".$data['C2VehicleDetails_Loss']."',name='".$data['loss_payee_full_name']."', address='".$data['loss_payee_address']."',need_modification='".trim($data['add_any_modification'])."' WHERE id=".$data['vehicle_id_to_update']."";
			}
			
		}	
		$result = pg_query($query); 
		if($result){
			$fch = $this->GetContactVehicles($contact_id);
			$response= $fch;
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	} 
	
	
	
	function GetContactVehicles($contact_id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.contact_vehicles where contact_id=".$contact_id."";		
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}
	
	function GetContactlastVehicles($contact_id){
		$conn = $this->pgConnect();
		 $query = "SELECT * FROM public.contact_vehicles where contact_id=".$contact_id." AND vehicle_type!='Trailer' ORDER BY ID DESC LIMIT 1";		
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}
	
		function GetContactSingeVehicles($contact_id,$vehicle_id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.contact_vehicles where contact_id=".$contact_id." and id=$vehicle_id";		
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}

	
	function GetContactcommoditeies($contact_id,$field){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.contact_commodities where contact_id=".$contact_id." AND name='".$field."'";		
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}

	function insertcommoditiesconatctdata($contact_id,$field,$values){
		$conn = $this->pgConnect();
		if($field!=''){
		$query = "SELECT * FROM public.contact_commodities where contact_id=".$contact_id." AND name='".$field."'";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows==1){
			$query = "UPDATE  public.contact_commodities SET value='".$values."' WHERE contact_id=".$contact_id." AND name='".$field."'";
			$result = pg_query($conn, $query);
			
		}else{
			  $query = "INSERT INTO public.contact_commodities(contact_id, name,value)VALUES('".$contact_id."', '".$field."','".$values."')";
			$result = pg_query($query);
		}
		
		 pg_close($conn);
		if($result){
		 $response=1;
		}else{
		$response=0	;
			
		}
		}
		return $response;
	}
	
		function insertcommodities($contact_id,$field,$values){
		$conn = $this->pgConnect();
		if($field!=''){
		$query = "SELECT * FROM public.max_average_value where contact_id=".$contact_id." AND hauled='".$field."'";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows==1){
		$qry = "UPDATE  public.max_average_value SET percentage='".$values."' WHERE contact_id=".$contact_id." AND hauled='".$field."'";
		$result = pg_query($conn, $qry);

		}else{
		$qry = "INSERT INTO public.max_average_value(contact_id, hauled,percentage)VALUES('".$contact_id."', '".$field."','".$values."')";
		$result = pg_query($qry);
		}

		pg_close($conn);
		if($result){
		$response=1;
		}else{
		$response=0	;

		}
		}
		return $response;
	}

	function GetContactData($contact_id){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.zoho_contact_data where contactid=$contact_id";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows==1){
		$response=array();	
		while ($row = pg_fetch_assoc($rs)) {
		 $response[]=$row;
		}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}	




	function insertintroconatctdata($contact_id,$data){
		$conn = $this->pgConnect();
		$date=date("Y-m-d", strtotime($data['When_do_you_need_policy']));
		$query = "SELECT * FROM public.zoho_contact_data where contactid=$contact_id";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows==1){
		 $query = "UPDATE  public.zoho_contact_data SET when_do_you_need_policy_by='".$date."',are_you_the_owner='".$data['Are_you_the_owner']."',how_many_vehicles=".$data['how_many_vehicles'].",is_the_owner_also_the_driver='".$data['Is_the_owner_driver']."' WHERE contactid=$contact_id";	
			$result = pg_query($conn, $query);
			 
		}
		elseif($data['When_do_you_need_policy']!='' || $data['Are_you_the_owner']!='' || $data['Is_the_owner_driver']!='' ||   $data['how_many_vehicles']!=''){
			  $query = "INSERT INTO public.zoho_contact_data(contactid, is_the_owner_also_the_driver,when_do_you_need_policy_by,are_you_the_owner,how_many_vehicles)VALUES('".$contact_id."', '".$data['Is_the_owner_driver']."','".$date."','".$data['Are_you_the_owner']."','".$data['how_many_vehicles']."')";
			$result = pg_query($query); 
			 
			
		} 
		if($result){
			$response= 1;
		}else{
		$response=0	;
			
		} 

		pg_close($conn);
		return $response;
		
		 
	}
	
	
	
	function businessviolation($contact_id){
		$conn = $this->pgConnect();
		$query =  "SELECT * FROM public.violation where contact_id=$contact_id";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			
			}
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	}
	function updateviolation($contact_id,$Accident_id,$Accident_date,$Accident){
		$conn = $this->pgConnect();
		$query =  "update  public.violation SET accident_violation='".$Accident."', date='".$Accident_date."' where id=$Accident_id";	
		$rs = pg_query($conn, $query);
		
		if($rs){
			
			 $response=1;
			
			
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	}	
	function deleteviolation($violationId){
		$conn = $this->pgConnect();
		$query =  "Delete  FROM public.violation where id=$violationId";	
		$rs = pg_query($conn, $query);
		
		if($rs){
			
			 $response=1;
			
			
		}else{
		$response=0	;
			
		}

		pg_close($conn);
		return $response;
		
	} 
	
	

    function getDataFromSafer($odt){
		$response=$this->saferSearch($odt);
	
		if($response){
			if(strpos(strip_tags($response), 'Record Not Found') !== false) {
					return 0;
					die();
					
			}else{
					$dom = new DOMDocument;
					$dom->loadHTML($response);
					foreach($dom->getElementsByTagName('table') as $node)
					{
						$array[] = $dom->saveHTML($node);
					}
					
					$Carrier_Information= $array[6];
					$Operation_Classification=$array[7];
					$Carrier_Operation=$array[11];
					$Cargo_Carried=$array[15];
					
					$Operation_Classification_main=array();
					$Carrier_Operation_main=array();
					$Cargo_Carried_main=array();
					
					
					$DOM = new DOMDocument();
					$DOM->loadHTML($Carrier_Information);
					$Header = $DOM->getElementsByTagName('th');
					$Detail = $DOM->getElementsByTagName('td');
					foreach($Header as $NodeHeader) 
					{
						$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
					}
					 
					foreach($Detail as $NodeDetail)  
					{
						$aDataTableDetailHTML[] = preg_replace('/[^(\x20-\x7F)\x0A\x0D]*/','', trim($NodeDetail->textContent));
					}
					
					if (strpos($aDataTableDetailHTML[0], '    ') !== false) {
						$Entity_Type=trim(preg_replace('/\s+/', '', $aDataTableDetailHTML[0]));

						}else{
							$Entity_Type =$aDataTableDetailHTML[0];
						}
					
					 
					 $operating_status  =$aDataTableDetailHTML[1];
					 $Out_of_Service_date=$aDataTableDetailHTML[2];
					 $legal_name  =$aDataTableDetailHTML[3];
					 $dba_name  =$aDataTableDetailHTML[4];
					 
					if (strpos($aDataTableDetailHTML[5], '    ') !== false) {
						$physical_address=trim(preg_replace('/\s+/', ' ', $aDataTableDetailHTML[5]));

						}else{
							$physical_address  =$aDataTableDetailHTML[5];
						}
					 
					 if (strpos($aDataTableDetailHTML[7], '    ') !== false) {
						$mailing_address=trim(preg_replace('/\s+/', ' ', $aDataTableDetailHTML[7]));

						}else{
							$mailing_address  =$aDataTableDetailHTML[7];
						}
					 
					 $phone  =$aDataTableDetailHTML[6];
					
					 $usdot_number  =$aDataTableDetailHTML[8];
					 $mc_mx_ff_nmumberr = explode("MC-",trim(preg_replace('/\s\s+/', ' ', $aDataTableDetailHTML[10])));
					 $mc_mx_ff_nmumber = $mc_mx_ff_nmumberr[1];
					 $state_carrier_ID_Number  = $aDataTableDetailHTML[9];
					 $duns_Number  =$aDataTableDetailHTML[11];
					 $power_units  =$aDataTableDetailHTML[12];
					 $drivers  =$aDataTableDetailHTML[13];
					 $MCS_150_Form_Date  =$aDataTableDetailHTML[14];
					 $MCS_150_Mileage_year  =$aDataTableDetailHTML[15];
					 $o_c  = $aDataTableDetailHTML[17];
					 
					
					 
					
					/*******************************************Operation_Classification start*****************************/
					/* $DOM = new DOMDocument();
					$DOM->loadHTML($Operation_Classification);
					$Operation_Classificationhead = $DOM->getElementsByTagName('th');
					$DetailOperationClassification = $DOM->getElementsByTagName('td');
					 
					foreach($DetailOperationClassification as $NodeDetail)
					{
						$DetailOperation_ClassificationHTML[] = preg_replace('/[^(\x20-\x7F)\x0A\x0D]','', trim($NodeDetail->textContent));
					}
					
					foreach($DetailOperation_ClassificationHTML as $key=>$nDetailOperation_ClassificationHTML){
						if($nDetailOperation_ClassificationHTML=='X'){
						
						 array_push($Operation_Classification_main,$DetailOperation_ClassificationHTML[$key+1]);
					   }
					}  */
					
					
					
					/* echo '<pre>';
					print_r($Operation_Classification_main); 
					echo '<pre>'; */
					/*******************************************Carrier_Operation*************************************/
					/* $DOM = new DOMDocument();
					$DOM->loadHTML($Carrier_Operation);
					$DetailCarrier_Operation = $DOM->getElementsByTagName('td');
					foreach($DetailCarrier_Operation as $NodeDetail)
					{
						$DetailCarrier_OperationHTML[] = preg_replace('/[^(\x20-\x7F)\x0A\x0D]','', trim($NodeDetail->textContent));
					}
					foreach($DetailCarrier_OperationHTML as $key=>$nDetailCarrier_OperationHTML){
						if($nDetailCarrier_OperationHTML =='X'){
						
						 array_push($Carrier_Operation_main,$DetailCarrier_OperationHTML[$key+1]);
					   }
					} */
					/* echo '<pre>';
					print_r($Carrier_Operation_main); 
					echo '<pre>'; */
					
					
					
					/*******************************************Cargo_Carried*************************************/
					/* $DOM = new DOMDocument();
					$DOM->loadHTML($Cargo_Carried);
					
					$DetailCargo_Carried = $DOM->getElementsByTagName('td');
					
					 
					foreach($DetailCargo_Carried as $NodeDetail)  //#Get data name of the table
					{
						$DetailCargo_CarriedHTML[] = preg_replace('/[^(\x20-\x7F)\x0A\x0D]','', trim($NodeDetail->textContent));
					}
					foreach($DetailCargo_CarriedHTML as $key=>$nDetailCargo_CarriedHTML){
						if($nDetailCargo_CarriedHTML =='X'){
						
						 array_push($Cargo_Carried_main,$DetailCargo_CarriedHTML[$key+1]);
					   }
					}  */
					
					$street_address_p=explode(',',$physical_address);
					
					$street_address_e=$street_address_p[0];
					$street_zip_p=$street_address_p[1];
					
					
					$pp = $this->extract_zipcode($physical_address);
					$p_add=explode(" ",$pp);
					$pZip=$p_add[1] ;
					$p_state=$p_add[0] ;
					$pd=explode(",",$physical_address);
					$pdd=explode(" ",$pd[0]);
					
					$cities_array=
					array('Phenix City','Casa Grande','Sierra Vista','Window Rock','Arkansas Post','Forrest City','Fort Smith','Hot Springs','Little Rock','Pine Bluff','PALM SPRINGS','West Memphis','Van Buren','Gila Bend','Beverly Hills','Buena Park','Arkansas Post','El Dorado','Forrest City','Fort Smith','Little Rock','Pine Bluff','Van Buren','West Memphis','Beverly Hills','Buena Park','Chula Vista','Costa Mesa','Culver City','Daly City','El Centro','El Cerrito','El Monte','Garden Grove','Huntington Beach','La Habra','Laguna Beach','Long Beach','Los Angeles','Menlo Park','Mountain View','Newport Beach','Pacific Grove','Palm Springs','Palo Alto','Port Hueneme','Rancho Cucamonga','Red Bluff','Redondo Beach','Redwood City','San Bernardino','San Clemente','San Diego','San Fernando','San Francisco','San Gabriel','San Jose','San Leandro','San Marino','San Mateo','San Pedro','San Rafael','San Simeon','Santa Ana','Santa Barbara','Santa Clara','Santa Clarita','Santa Cruz','Santa Monica','Santa Rosa','Simi Valley','Thousand Oaks','Walnut Creek','West Covina','Yorba Linda','Yuba City','Canon City','Central City','Colorado Springs','Cripple Creek','Estes Park','Fort Collins','Fort Morgan','Glenwood Springs','Grand Junction','La Junta','Pagosa Springs','Steamboat Springs','East Hartford','East Haven','New Britain','New Haven','New London','North Haven','Old Saybrook','West Hartford','West Haven','Windsor Locks','New Castle','Belle Glade','Boca Raton','Cocoa Beach','Coral Gables','Cocoa-Rockledge','Coral Gables','Daytona Beach','Hill City');
					foreach ($cities_array as $city){
					if (strpos($pd[0], $city) !== false) {
						$pd1=explode(" ",$pd[0]);
						 $v=array_slice($pd1, -2, 2, true);
						
						 $p_city=implode(" ",$v);
						 array_splice($pd1, count($pd1) - 2, 2);
						$street_address_p= implode(" ",$pd1);
						
					}
					else{
					 $pd1=explode(" ",$pd[0]);
						end($pd1);        
					 $key = key($pd1);
					$p_city= $pd1[$key];
					array_pop($pd1);
					$street_address_p= implode(" ",$pd1);
					}
					}
					
					
					
					
					
					$mm = $this->extract_zipcode($mailing_address);
					$m_add=explode(" ",$mm);
					$mZip=$m_add[1] ;
					$m_state=$m_add[0] ;
					$md=explode(",",$mailing_address);
					foreach ($cities_array as $city){
					if (strpos($md[0], $city) !== false) {
						$md1=explode(" ",$md[0]);
						 $v=array_slice($md1, -2, 2, true);
						
						 $m_city=implode(" ",$v);
						 array_splice($md1, count($md1) - 2, 2);
						$street_address_m= implode(" ",$md1);
						
					}else{
					 $md1=explode(" ",$md[0]);
						end($md1);        
					 $key = key($md1);
					$m_city= $md1[$key];
					array_pop($md1);
					$street_address_m= implode(" ",$md1);
					}
					}
					
					
	//second address value 					
						
			


				/* 	,'state_carrier_ID_Number'=>$state_carrier_ID_Number,'duns_Number'=>$duns_Number,'power_units'=>$power_units,'drivers'=>$drivers, 'MCS_150_Form_Date'=>$MCS_150_Form_Date, 'MCS_150_Mileage_year'=>$MCS_150_Mileage_year,'Operation_Classification'=>implode(",",$Operation_Classification_main),'Carrier_Operation'=>implode(",",$Carrier_Operation_main),'Cargo_Carried'=>implode(",",$Cargo_Carried_main)
					  */
					
					return $saferData[]= array('Entity_Type'=>$Entity_Type,'operating_status'=>$operating_status,'Out_of_Service_date'=>$Out_of_Service_date, 'legal_name'=>$legal_name,'dba_name'=>$dba_name,'physical_address'=>$physical_address,'physical_zip'=>$pZip,'mailing_zip'=>$mZip,'p_street_address'=>$street_address_p,'m_street_address'=>$street_address_m,'phone'=>$phone,'mailing_address'=>$mailing_address,'m_postal'=>$m_postal,'m_city'=>$m_city,'p_city'=>$p_city,'p_state'=>$p_state,'m_state'=>$m_state,'usdot_number'=>$usdot_number,'mc_mx_ff_nmumber'=>$mc_mx_ff_nmumber);
					
					
			}
		}
	}
	
	function saferSearch($odt){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://safer.fmcsa.dot.gov/query.asp?query_type=queryCarrierSnapshot&query_param=USDOT&query_string=".$odt."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		  
		   "User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36",
			"cache-control: no-cache",
		  
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		 return 0;
		} else {
		  return $response;
		}
      
	}
	function getUnbounceData(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.unbounce.com/pages/601812a5-e1dc-43f4-b3fb-418fae0ec736/leads?secure=true",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Basic YWQ2ZjU0MTgzY2RhMGNjYTBiMTA5NzVjNDQ0MzBkMGY6QnJpZ2h0MjAyMCE=",
			"cache-control: no-cache"
			
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}	
		
		
	}
	function getTrelloData($url){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL =>$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
        'Accept: application/json'
		  ),
		));
		$response = curl_exec($curl);
		
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			
		 $response;
		 
		return $data = json_decode($response, true);
		
		}
		
		 
	}
	function updateTrelloCardCustomFields($url,$data){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "PUT",
			  CURLOPT_POSTFIELDS => $data,
			  CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json"
			  ),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			if ($err) {
			  return $err;
			} else {
			$d=json_decode($response, true);
			 if(empty($d['id'])){
				return $d ;
			 }
			}
	}
	
	
	function zoho_auth($url,$method,$data){
		$ch = curl_init('https://accounts.zoho.com/oauth/v2/'.$url);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if($method == "POST"){
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);	
		}
		$response = curl_exec($ch);
		  
		return json_decode($response,true);
		curl_close($ch); 
	}
	function zoho_curl($url,$method,$data,$access_token){
		$ch = curl_init('https://www.zohoapis.com/crm/v2/'.$url);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if($method == "POST"){
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);			
		}
		if($method == "PUT" ){
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);	
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);	
		}
		

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Zoho-oauthtoken '.$access_token));
		  $response = curl_exec($ch);
		 $err = curl_error($ch);
			curl_close($ch);
			if ($err) {
			  return $err;
			} else {
			return json_decode($response,true);
			}
	}
	
	//function for search business type
	function business_search($data){
		$conn = $this->pgConnect();
		$query = "SELECT * FROM public.business_type WHERE category LIKE '".$data."%'";	
		$rs = pg_query($conn, $query);
		$rows = pg_num_rows($rs);
		if($rows>=1){
			$response=array();	
			while ($row = pg_fetch_assoc($rs)) {
			 $response[]=$row;
			}
		}else{
		$response=0	;
			
		}
		pg_close($conn);
		return $response;
	}
		
	function extract_zipcode($address) {
    $zipcode = preg_match("/\b[A-Z]{2}\s+\d{5}(-\d{4})?\b/", $address, $matches);
	 return $matches[0];
	
	}
}
	if($_POST['InsuranceHistory'])
{
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
   // $contactId = $_POST['contactId'];
	$start_date1 = $_POST['perid_id_second'];
	$end_date1 = $_POST['perid_id_two_second'];
	$company_name1 = $_POST['input_companyname2'];
	$libility_number1 = $_POST['input_liabilitylosses2'];
	$libility_amount1 = $_POST['input_physicaldamag4'];
	$phsical_number1 = $_POST['physicaldamagenumber1'];
	$phsical_amount1 = $_POST['physicaldamageammount1'];
	//$contactId = $_POST['contactId'];
	$start_date2 = $_POST['perid_id_third'];
	$end_date2 = $_POST['perid_id_two_third'];
	$company_name2 = $_POST['input_companyname3'];
	$libility_number2= $_POST['input_liabilitylosses3'];
	$libility_amount2 = $_POST['input_physicaldamage6'];
	$phsical_number2 = $_POST['physicaldamagenumber8'];
	$phsical_amount2 = $_POST['physicaldamageammount8'];	
	$con = pg_connect ("host=ec2-54-243-47-196.compute-1.amazonaws.com dbname=da75gbsng1e37m user=ikheqtaxeqwazi password=800c91378dbd23c1752ef5722ad7c40a4f727966939b44d58361184792659ebd");
     $conn = $this->pgConnect();
     $query = "INSERT INTO public.insurance_history(
	 start_date_one, end_date_one, start_date_two, end_date_two, start_date_three, end_date_three, company_one, company_two, company_three, liability_number_one, liability_number_two, liability_number_three, liability_amount_one, liability_amount_two, liability_amount_three, physical_number_one, physical_number_two, physical_number_three, physical_amount_one, physical_amount_two, physical_amount_three, contact_id)
	VALUES ('$start_date','$end_date','$start_date1','$end_date1','$start_date2','$end_date2','$company_name','$company_name1','$company_name2', '$libility_number', $libility_number1,'$libility_number2', '$libility_amount','$libility_amount1','$libility_amount2','$phsical_number','$phsical_number1','$phsical_number2','$phsical_amount','$phsical_amount1','$phsical_amount2','$contactId')";
		$result = pg_query($query);
			if($result){
			echo "Record Created Sucessfully";
		}
		else
		{
			echo "failed to create";
		}
}

}	 

		

?>

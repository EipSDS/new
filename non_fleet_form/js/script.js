
 $(document).ready(function(){
  $('.save').click(function(){
  var contact_id =$(".ContactId").val();
//console.log(contact_id);
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
  var url = "http://givesurance.herokuapp.com/non_fleet_form/ajaxdata.php";
  alert(url);
//console.log(dataform);
   $.ajax({
   url:url,
   type: "POST",   
   dataType: 'json',
   data: {savedata: "success",contact_id:contact_id, dataform:dataform},
   success:function(result){		
    //  content.html(result);
	  console.log(result);
   }	   
   });
   $.ajax({
      type: "POST",
      url: url,
      data: {hi:'hi'contact_id:contact_id},
      dataType: "text",
      success: function(resultData){
          alert(resultData);
      }
});
    });
});

 $(document).ready(function(){
  $('.save').click(function(){
  var contact_id =$(".ContactId").val();
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
  var url = "http://givesurance.herokuapp.com/non_fleet_form/ajaxdata.php";
   $.ajax({
      type: "POST",
      url: url,
      data: {savedata:'success',contact_id:contact_id, dataform:dataform},
      dataType: "json",
      success: function(resultData){
         alert(resultData);
		 console.log(resultData);
      }
});
    });
});
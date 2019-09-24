$(document).ready(function(){
  $(".save").click(function(){
var thanks= "Data saved";
  var contact_id =$(".ContactId").val();
  
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
   console.log(contact_id);
   alert(contact_id);
   $.ajax({
   url:"ajaxdata.php",
   type: "POST",   
   dataType: 'json',
   data : ({savedata:"success",contact_id:contact_id, dataform:dataform}),
   success:function(result){
   $(".save_success").show();
   }	   
   })
    });
});
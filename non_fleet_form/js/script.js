$(document).ready(function(){
  $(".save").click(function(event){
  var contact_id =$(".ContactId").val();
console.log(contact_id);
  var dataform=	$('.dataform').find('select, textarea, input').serialize();

   $.ajax({
   url:"ajaxdata.php",
   type: "POST",   
   dataType: 'json',
   data: ({savedata: "success",contact_id:contact_id, dataform:dataform}),
   success:function(data){		
      content.html(data);
	  console.log(data);
   }	   
   });
    });
});
$(document).ready(function(){
  $(".save").click(function(event){
  var contact_id =$(".ContactId").val();
console.log(contact_id);
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
console.log(dataform);
   $.ajax({
   url:"ajaxdata.php",
   type: "POST",   
   dataType: 'text',
   data: ({savedata: "success",contact_id:contact_id }),
   success:function(result){		
      content.html(result);
	  console.log(result);
   }	   
   });
    });
});
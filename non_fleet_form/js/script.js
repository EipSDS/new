$(document).ready(function(){
  $(".save").click(function(){
    alert("The paragraph was clicked.");

  
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
   console.log(dataform);
   alert(dataform);
   $.ajax({
   url:"ajaxdata.php",
   type: "POST",   
   dataType: 'json',
   data : ({savedata:"success",contact_id:contact_id, dataform:dataform}),
   success:function(result){
   
   }	   
   })
    });
});
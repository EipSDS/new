$(document).ready(function(){
  $(".save").click(function(){
    alert("The paragraph was clicked.");
  });
  
  var dataform=	$('.dataform').find('select, textarea, input').serialize();
   console.log(dataform);
   alert(dataform);
  
});
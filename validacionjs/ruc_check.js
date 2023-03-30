//<script language="javascript" type="text/javascript">
$(document).ready(function(){    
 $("#ruc").keyup(function(){ 
	var ruc = $("#ruc").val(); 
  
  if(ruc.length > 3)
  {  
   $("#r_ruc").html('checking...');
   
   /*$.post("usernamecheck.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result").html(data);
   });*/
   
   $.ajax({
    
    type : 'POST',
    url  : 'validacion/ruc_check.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#r_ruc").html(data);
              
              if(data == "<span id='v' style='color:red;'>El RUC ya está registrado en la Base de datos</span>"){
                
                $('#boton').attr("disabled", true);              }
              else{
                $('#boton').attr("disabled", false);  
              }
        }
    });
    return false;
   
  }
  else
  {
   $("#r_ruc").html('');
  }
 });
 
});
//</script>
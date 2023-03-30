//<script language="javascript" type="text/javascript">
$(document).ready(function(){    
    $("#registro").keyup(function(){ 
       var registro = $("#registro").val(); 
     
     if(registro.length > 3)
     {  
      $("#r_registro").html('checking...');
      
      /*$.post("usernamecheck.php", $("#reg-form").serialize())
       .done(function(data){
       $("#result").html(data);
      });*/
      
      $.ajax({
       
       type : 'POST',
       url  : 'validacion/registro_check.php',
       data : $(this).serialize(),
       success : function(data)
           {
                 $("#r_registro").html(data);
                 
                 if(data == "<span id='v' style='color:red;'>El Nro de registro ya está en la BD</span>"){
                   
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
      $("#r_registro").html('');
     }
    });
    
   });
   //</script>
//<script language="javascript" type="text/javascript">
$(document).ready(function(){    
    $("#osinergmin").keyup(function(){ 
       var osinergmin = $("#osinergmin").val(); 
     
     if(osinergmin.length > 3)
     {  
      $("#r_osinergmin").html('checking...');
      
      /*$.post("usernamecheck.php", $("#reg-form").serialize())
       .done(function(data){
       $("#result").html(data);
      });*/
      
      $.ajax({
       
       type : 'POST',
       url  : 'validacion/osinergmin_check.php',
       data : $(this).serialize(),
       success : function(data)
           {
                 $("#r_osinergmin").html(data);
                 
                 if(data == "El Cod Osinergmin ya está registrado en la Base de datos"){
                   
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
      $("#r_osinergmin").html('');
     }
    });
    
   });
   //</script>
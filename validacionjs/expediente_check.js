//<script language="javascript" type="text/javascript">
$(document).ready(function(){    
    $("#expediente").keyup(function(){ 
        var expediente = $("#expediente").val(); 
      
      if(expediente.length > 3)
      {  
       $("#r_expediente").html('checking...');
       
       /*$.post("usernamecheck.php", $("#reg-form").serialize())
        .done(function(data){
        $("#result").html(data);
       });*/
       
       $.ajax({
        
        type : 'POST',
        url  : 'validacion/expediente_check.php',
        data : $(this).serialize(),
        success : function(data)
            {
                  $("#r_expediente").html(data);
                  
                  if(data == "<span id='v' style='color:red;'>El Nro de expediente ya está registrado en la Base de datos</span>"){
                    
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
       $("#r_expediente").html('');
      }
     });
    
   });
   //</script>
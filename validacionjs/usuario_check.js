$(document).ready(function(){    
    $("#nom_usuario").keyup(function(){ 
       var nom_usuario = $("#nom_usuario").val(); 
     
     if(nom_usuario.length > 3)
     {  
      $("#r_usuario").html('checking...');
      
      /*$.post("usernamecheck.php", $("#reg-form").serialize())
       .done(function(data){
       $("#result").html(data);
      });*/
      
      $.ajax({
       
       type : 'POST',
       url  : 'validacion/usuario_check.php',
       data : $(this).serialize(),
       success : function(data)
           {
                 $("#r_usuario").html(data);
                 
                 if(data == "span id='v' style='color:red;'>El nombre de usuario ya está en uso</span>"){
                   
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
      $("#r_usuario").html('');
     }
    });
    
   });
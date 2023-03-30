//<script language="javascript" type="text/javascript">
$(document).ready(function(){    
    $("#nombre_prod").keyup(function(){ 
       var nombre_prod = $("#nombre_prod").val(); 
     
     if(nombre_prod.length > 3)
     {  
      $("#r_producto").html('checking...');
      
      /*$.post("usernamecheck.php", $("#reg-form").serialize())
       .done(function(data){
       $("#result").html(data);
      });*/
      
      $.ajax({
       
       type : 'POST',
       url  : 'validacion/producto_check.php',
       data : $(this).serialize(),
       success : function(data)
           {
                 $("#r_producto").html(data);
                 
                 if(data == "<span id='v' style='color:red;'>El Producto ya está registrado en la Base de datos</span>"){
                   
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
      $("#r_producto").html('');
     }
    });
    
   });
   //</script>
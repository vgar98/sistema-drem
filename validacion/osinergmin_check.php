<?php
  
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $osinergmin = strip_tags($_POST['osinergmin']);
      
   $stmt=$dbcon->prepare("SELECT cod_osinergmin FROM registro WHERE cod_osinergmin=:osinergmin");
   $stmt->execute(array(':osinergmin'=>$osinergmin));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El Cod Osinergmin ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El Cod Osinergmin ya está registrado en la Base de datos</span>";
     
   }
   else
   {
    //echo "";
    echo "<span id='f' style='color:green;'>Cod Osinergmin disponible</span>";

   }
  }
 
?>

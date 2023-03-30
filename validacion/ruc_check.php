<?php
  
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $ruc = strip_tags($_POST['ruc']);
      
   $stmt=$dbcon->prepare("SELECT ruc FROM grifo WHERE ruc=:ruc");
   $stmt->execute(array(':ruc'=>$ruc));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El RUC ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El RUC ya está registrado en la Base de datos</span>";
     
   }
   else
   {
    //echo "RUC disponible";
    echo "<span id='f' style='color:green;'>RUC disponible</span>";

   }
  }
 
?>

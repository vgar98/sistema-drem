<?php
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $expediente = strip_tags($_POST['expediente']);
      
   $stmt=$dbcon->prepare("SELECT nro_exped FROM registro WHERE nro_exped=:expediente");
   $stmt->execute(array(':expediente'=>$expediente));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El Nro de expediente ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El Nro de expediente ya está registrado en la Base de datos</span>";
     
   }
   else
   {
    //echo "Nro de expediente disponible";
    echo "<span id='f' style='color:green;'>Nro de expediente disponible</span>";

   }
  }
 
?>

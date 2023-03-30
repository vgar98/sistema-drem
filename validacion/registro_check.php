<?php
  
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $registro = strip_tags($_POST['registro']);
      
   $stmt=$dbcon->prepare("SELECT id_registro FROM registro WHERE id_registro=:registro");
   $stmt->execute(array(':registro'=>$registro));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El RUC ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El Nro de registro ya está en la BD</span>";
     
   }
   else
   {
    //echo "RUC disponible";
    echo "<span id='f' style='color:green;'>El Nro de registro está disponible</span>";

   }
  }
 
?>

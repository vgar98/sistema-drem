<?php
  
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $nombre_prod = strip_tags($_POST['nombre_prod']);
      
   $stmt=$dbcon->prepare("SELECT nombre_prod FROM producto WHERE nombre_prod=:nombre_prod");
   $stmt->execute(array(':nombre_prod'=>$nombre_prod));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El RUC ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El Producto ya está registrado en la Base de datos</span>";
     
   }
   else
   {
    //echo "RUC disponible";
    echo "<span id='f' style='color:green;'>Nombre del producto disponible</span>";

   }
  }
 
?>

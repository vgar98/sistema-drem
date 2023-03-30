<?php
  
  $host="localhost";
  $dbname="drem_bd";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $nom_usuario = strip_tags($_POST['nom_usuario']);
      
   $stmt=$dbcon->prepare("SELECT nom_usuario FROM usuario WHERE nom_usuario=:nom_usuario");
   $stmt->execute(array(':nom_usuario'=>$nom_usuario));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    //echo "El RUC ya está registrado en la Base de datos";
    echo "<span id='v' style='color:red;'>El nombre de usuario ya está en uso</span>";
     
   }
   else
   {
    //echo "RUC disponible";
    echo "<span id='f' style='color:green;'>Nombre de usuario disponible</span>";

   }
  }
 
?>
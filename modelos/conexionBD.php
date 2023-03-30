<?php

class ConexionBD{
    public function cBD(){
        
        $bd = new PDO("mysql:host=localhost;dbname=drem_bd","root","");
        
        return $bd;
        echo $bd;
    }

}
?>


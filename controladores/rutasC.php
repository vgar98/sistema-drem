<?php

class RutasControlador{
    
    

    public function Plantilla(){
        include 'plantilla.php';
    }


    public function Rutas(){
        if(isset($_GET["ruta"])){
            $rutas = $_GET["ruta"];
        }
        else{
            $rutas = "ruteador";
        }

        $respuesta = Modelo::RutasModelo($rutas);
        include $respuesta;

    }
}


?>
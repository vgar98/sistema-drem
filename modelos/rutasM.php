<?php

class Modelo{
    static public function RutasModelo($rutas){
        if($rutas == "registrargrifo" || $rutas == "usuario" || $rutas == "agregarusuario" || $rutas == "editarusuario" || $rutas == "resultado" || $rutas == "reportes" || $rutas == "agregarproducto" || $rutas == "editarproducto"  || $rutas == "verdetalles" || $rutas == "tanque" || $rutas == "grifo" || $rutas == "editargrifo" || $rutas == "salir" || $rutas == "producto" || $rutas == "vistacompleta"){
            $pagina = "vistas/modulos/" . $rutas . ".php";
        }
        else if($rutas == "ingreso"){
            $pagina = "index.php";

        }
        else{
            $pagina = "error404.php";

        }
        return $pagina;
    }
}
?>
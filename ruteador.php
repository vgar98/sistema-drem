<?php
//controladores
require_once 'controladores/rutasC.php';
require_once 'controladores/adminC.php';
require_once 'controladores/grifoC.php';
require_once 'controladores/productoC.php';
require_once 'controladores/tanqueC.php';
require_once 'controladores/reporteC.php';



//modelos
require_once 'modelos/rutasM.php';
require_once 'modelos/adminM.php';
require_once 'modelos/grifoM.php';
require_once 'modelos/productoM.php';
require_once 'modelos/tanqueM.php';
require_once 'modelos/reporteM.php';



//include 'Vistas/modulos/ingreso.php';
$rutas = new RutasControlador();
$rutas -> Plantilla();


?>
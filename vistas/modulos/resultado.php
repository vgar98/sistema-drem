<?php

    $date = '2003-02-12';  
	$fecha = date("d/m/Y", strtotime($date)); 
	echo $fecha;
?>
<input type="date" name="fecha">
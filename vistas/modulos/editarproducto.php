<?php
ob_start();
//session_start();
if(!$_SESSION["Ingreso"]){
	header("location: index.php");
}
?>



<br>
	<h3 class="text-center">EDITAR PRODUCTO</h3>
	<div class="container">
        <form method="post" action="">
            
            
            <?php
            
           
            $editarproducto = new ProductoC();
            $editarproducto -> EditarProductoC();
            
                        
            ?>


            <?php
        
            
            $actualizarproducto = new ProductoC();
            $actualizarproducto -> ActualizarProductoC();
            
            ?>
        </form>
        
    </div>
	
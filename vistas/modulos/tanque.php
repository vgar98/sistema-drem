<?php
ob_start();
//session_start();
if(!$_SESSION["Ingreso"]){
	header("location: index.php");
}
?>



<br>
	<h3 class="text-center">EDITAR CONTENIDO DE TANQUE</h3>
	<div class="container">
        <form method="post" action="">
            
            
            <?php
            
           
            $editartanque = new TanqueC();
            $editartanque -> EditarTanqueC();
            
                        $listarproducto = new TanqueC();
                        $listarproducto -> ListarProductoC();
            ?></select>
            </div> 
            </div>

            
            <input class="btn btn-success" id="boton" type="submit" value="Actualizar">

            <?php
        
    
            $actualizartanque = new TanqueC();
            $actualizartanque -> ActualizarTanqueC();

            ?>
        </form>
        
    </div>
	
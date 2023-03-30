<?php
ob_start();
//session_start();
if(!$_SESSION["Ingreso"]){
	header("location: index.php");
}
?>



<br>
	<h3 class="text-center">EDITAR USUARIO</h3>
	<div class="container">
        <form method="post" action="">
            
            
            <?php
           
            $editarusuario = new AdminC();
            $editarusuario -> EditarUsuarioC();
                                    
            ?>


            <?php
                    
            $actualizarusuario = new AdminC();
            $actualizarusuario -> ActualizarUsuarioC();
            
            ?>
        </form>
        
    </div>
	
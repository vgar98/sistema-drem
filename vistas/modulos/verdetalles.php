<?php
ob_start();
//session_start();
if(!$_SESSION["Ingreso"]){
	header("location: index.php");
}
?>
<h1><?php
	echo $_SESSION["nombre"];
	$ruc = $_GET["ruc"];
	
?></h1>


	

	<br>
	<h3 class="text-center">Información del establecimiento</h3>
	<div>
		<div class="container">
		<form method="post" action="">
			
			
			<?php
			
			$verdetalles = new GrifoC();
			$verdetalles -> VerDetallesC();

			?>
		</form>

		<?php
        
            $actualizargrifo = new GrifoC();
            $actualizargrifo -> ActualizarGrifoC();
            
        ?>
		</div>
	
	

	<h3 class="text-center">Agregar un Tanque</h3>
	<br>
	<div class="container">
	<form method="post" action="">
		
		
        <?php

		echo '
		<input type="hidden" value="'.$ruc.'" id="ruc1" name="ruc1" readonly>			
		';
        ?>	
		<div class="row">
			<div class="form-group col-md-3">
				<label for="id_tanque">Número de tanque</label>
				<select class="form-control" name="id_tanque" id="id_tanque">
				<?php
					$listartanque = new TanqueC();
					$listartanque -> ListarTanqueC();
				?>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="id_producto">Producto</label>
				<select class="form-control" name="id_producto" id="id_producto">
				<?php
					$listarproducto = new TanqueC();
					$listarproducto -> ListarProductoC();
				?>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="cant_galones">Cantidad de galones</label>
				<input class="form-control" type="text" placeholder="Cantidad de galones" id="cant_galones" name="cant_galones">
			</div>
			<div class="form-group col-md-3">
				<br>
				<input class="btn btn-success btn-lg" name="boton" id="boton" type="submit" value="Agregar">
			</div>
		</div>
		
		
	</form>
	</div>
	<?php
    
		$agregartanque = new TanqueC();
		$agregartanque -> AgregarTanqueC();

    ?>

<h3 class="text-center">Tanques Utilizados</h3>

	<div class="container">
	<table id="t2" class="table-responsive">
		
		<thead>
			
			<tr>
				<th>Nro Tanque</th>
				<th>Cantidad de Galones</th>
				<th>Producto</th>
				<th>Editar</th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrartanque = new TanqueC();
				$mostrartanque -> MostrarTanqueC();

			?>
			
			
	
		</tbody>
		

	</table>
	</div>

	</div>


<?php
ob_start();
//session_start();
if(!$_SESSION["Ingreso"]){
	header("location: index.php");
}
?>
<h1><?php
	echo $_SESSION["nombre"];
?></h1>

<script type="text/javascript" class="init">
	

	
</script>	



	


	<br>
	<h3 class="text-center">Registros</h3>
	<table cellspacing="5" cellpadding="5">
        <tbody>
		<tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
	</table>
	<table id="vista" name="vista" class="display nowrap">
		
		<thead>
			
			<tr>
				<th>Nro Expediente</th>
				<th>Codigo Osinergmin</th>
				<th>Registro</th>
				<th>RUC</th>
				<th>Razon Social</th>
				<th>Dirección</th>
				<th>Departamento</th>
				<th>Provincia</th>
				<th>Distrito</th>
				<th>Total Gal</th>
				<th>Fecha de emisión</th>
				<th>Termino de vigencia</th>
				<th>Representante</th>
				<th>Productos    </th>
				<th>Tipo de grifo</th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrar = new GrifoC();
				$mostrar -> VistaCompleta();

			?>
			
			
	
		</tbody>
		

	</table>
	


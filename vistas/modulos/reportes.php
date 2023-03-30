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




<div class="container">
	<h3 class="text-center">Buscar grifos para generar reporte:</h3>
	<form action="ruteador.php?ruta=reportes" method="post">
		<div class="row">
			<div class="form-group col-md-5">
				<label for="pronvicia">Provincia</label>
				<select class="form-control" id="provincia" name="provincia" required>
					<option value="" disabled selected>Selecciona una provincia</option>
					<option value="TODOS">TODOS</option>
					<option value="ALTO AMAZONAS">ALTO AMAZONAS</option>
					<option value="DATEM DEL MARAÑON">DATEM DEL MARAÑON</option>
					<option value="LORETO">LORETO</option>
					<option value="RAMON CASTILLA">RAMON CASTILLA</option>
					<option value="MAYNAS">MAYNAS</option>
					<option value="PUTUMAYO">PUTUMAYO</option>
					<option value="REQUENA">REQUENA</option>
					<option value="UCAYALI">UCAYALI</option>				
				</select>
			</div>

			<div class="form-group col-md-5">
				<label for="distrito">Distrito</label>
				<select class="form-control col-md-5" id="distrito" name="distrito" required>
					<option value="" disabled selected>Selecciona un distrito</option>
					<option value="TODOS">TODOS</option>
				</select>
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="tipo">Tipo de grifo</label>
				<select class="form-control" id="tipo" name="tipo" required>
					<option value="TODOS">TODOS</option>
					<option value="INSTALACIONES FIJAS">INSTALACIONES FIJAS</option>
					<option value="GRIFO FLOTANTE">GRIFO FLOTANTE</option>
					<option value="GRIFOS RURALES">GRIFOS RURALES</option>
				</select>
			</div>
		</div>
		<div class="row">
			<h5>Fecha de emisión:</h5>
			<div class="form-group col-md-4">
				<label for="fecha1">Desde:</label>				
				<input class="form-control" type="date" id="fecha1" name="fecha1">
			</div>
			<div class="form-group col-md-4">
				<label for="fecha2">Hasta:</label>
				<input class="form-control" type="date"  id="fecha2" name="fecha2">
			</div>
		</div>
		<div class="row">
			<input class="btn btn-success" name="boton" id="boton" type="submit" value="Buscar">
		</div>
	</form>
</div>

<br><br>
<?php

 
 
  


?>

<script>	
	$(document).ready(function() {

		$('#report').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print',
                
                { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 
                    customize: function (doc) { doc.defaultStyle.fontSize = 4;
                 //2,3,4,etc 
                 doc.styles.tableHeader.fontSize = 4; //2, 3, 4, etc 
                } 
                } 
                 
            ]
        } );
		
		$("#fecha1").change(function(){
			if(($("fecha1").val() != "") && ($("#fecha2").val() != "")){
				var fecha1 = $("#fecha1").val();
				var fecha2 = $("#fecha2").val();
				if(fecha1 > fecha2){
					alert("Ingrese una fecha válida")
					$("#fecha1").val('');
				}
				else{
					
				}
			}
		});

		$("#fecha2").change(function(){
			if(($("fecha1").val() != "") && ($("#fecha2").val() != "")){
				var fecha1 = $("#fecha1").val();
				var fecha2 = $("#fecha2").val();
				if(fecha1 > fecha2){
					alert("Ingrese una fecha válida")
					$("#fecha2").val('');
				}
				else{
					
				}
			}
		});
		


	/*
    // Setup - add a text input to each footer cell
    $('#t1 thead th').each( function () {
		
        var title = $(this).text();
		if(title == "Nombre"){
			$(this).html( '<label for="Name">'+title+'</label>' );
		}
		else{
			$(this).html( '<label for="'+title+'">'+title+'</label>' );
			$(this).html( '<input type="text" id="'+title+'" name="'+title+'" placeholder="Buscar '+title+'" />' );
		}
		
    } );
 
    // DataTable
    var table = $('#t1').DataTable({
		

        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
				
				//var column = this;
                //var some = column.index();
				//if (column.index() == 1) return;
                
				
				$( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });*/

	
	
 
} );


</script>

<table id="report" name="report" class="display">
		
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
				<th>Tipo de grifo</th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
				if(isset($_POST["distrito"])){
			
					$buscar = new ReporteC();
					$buscar -> BuscarC();
			
				}
			
			?>
			
			
	
		</tbody>
		

	</table>




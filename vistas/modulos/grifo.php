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
<script>	
	$(document).ready(function() {

	$('#t1').DataTable();

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
	<br>
	<h3 class="text-center">Registros</h3>

	<table id="t1" class="table-responsive">
		
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
				<th>Ver detalles</th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrar = new GrifoC();
				$mostrar -> MostrarGrifoC();

			?>
			
			
	
		</tbody>
		

	</table>
	


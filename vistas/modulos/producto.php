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


<div class="container">
<h3 class="text-center">AGREGAR PRODUCTO</h3>

<form class="form-group" method="post" action="">
    <div class="row">
        <div class="form-group col-md-3">
            <label for="ruc">Nombre del producto</label>
            <input class="form-control" type="text" placeholder="Nombre del producto" name="nombre_prod" id="nombre_prod" required>
            <span id="r_producto"></span>
        </div>
    </div>

    <div class="row">
        
        <div class="form-group col-md-4">
            <label for="tipo">Estado</label>
            <select class="form-control" name="estado" id="estado" required>
                <option value="DISPONIBLE" selected>DISPONIBLE</option>
                <option value="NO DISPONIBLE">NO DISPONIBLE</option>
            </select>
        </div> 
    </div>   
    <div class="row">
        
        <div class="form-group col-md-4">
            <input class="btn btn-success" name="boton" id="boton" type="submit" value="Registrar">
        </div>
        
    </div>



</form>

</div>

<?php

$registrar = new ProductoC();
$registrar -> AgregarProductoC();

?>

	<br>
	<h3 class="text-center">Registros</h3>
    <div class="container">
        <div class="container-fluid">
        <table id="t1" class="table-responsive">
		
		<thead>
			
			<tr>
				<th>ID del producto</th>
				<th>Nombre del Producto</th>
				<th>Estado del producto</th>
				<th>Editar</th>
				
			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrar = new ProductoC();
				$mostrar -> MostrarProductoC();

			?>
			
			
	
		</tbody>
		

	</table>
        
        </div>
    </div>
	
	

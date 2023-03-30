<?php
ob_start();
//session_start();
if((!$_SESSION["Ingreso"]) || ($_SESSION["tipo_usuario"]=="NORMAL") ){
	header("location: index.php");
}
?>
<h1><?php
	echo $_SESSION["nombre"];
?></h1>

<script>	
	$(document).ready(function() {

	$('#tuser').DataTable();

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
	<h3 class="text-center">Usuarios:</h3>

	<table id="tuser" class="table-responsive">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Clave</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Tipo de usuario</th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrarusuario = new AdminC();
				$mostrarusuario -> MostrarUsuario();

			?>
			
			
	
		</tbody>
		

	</table>
	
<?php
	
$eliminarusuario = new AdminC();
$eliminarusuario -> BorrarUsuarioC();	
?>


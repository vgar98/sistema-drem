<div class="container">
<h3 class="text-center">AGREGAR PRODUCTO</h3>

<form class="form-group" method="post" action="">
    <div class="row">
        <div class="form-group col-md-3">
            <label for="ruc">Nombre del producto</label>
            <input class="form-control" type="text" placeholder="Nombre del producto" name="nombre_prod" id="nombre_prod" required>
            <span id="result"></span>
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
<br><br><br><br><br><br><br><br><br><br>
<?php

$registrar = new GrifoC();
$registrar -> RegistrarGrifoC();

?>


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
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}
</script>
<div class="container">
<h3 class="text-center">AGREGAR USUARIO</h3>

<form class="form-group" method="post" action="">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="nom_usuario">Nombre de usuario</label>
            <input class="form-control" type="text" placeholder="Nombre de usuario" name="nom_usuario" id="nom_usuario" onkeypress="return AvoidSpace(event)" required>
            <span id="r_usuario"></span>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="nombre">Nombres</label>
            <input class="form-control" type="text" placeholder="Nombres" name="nombre" id="nombre" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="apellido">Apellidos</label>
            <input class="form-control" type="text" placeholder="Apellidos" name="apellido" id="apellido" required>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-5">
            <label for="clave">Contraseña</label>
            <input class="form-control" type="text" placeholder="Contraseña" name="clave" id="clave" required>
        </div>
    </div>

    <div class="row">
        
        <div class="form-group col-md-5">
            <label for="tipo">Tipo de usuario</label>
            <select class="form-control" name="tipo_usuario" id="tipo_usuario" required>
                <option value="NORMAL" selected>NORMAL</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            </select>
        </div> 
    </div>   
    <div class="row">
        
        <div class="form-group col-md-5">
            <input class="btn btn-success" name="boton" id="boton" type="submit" value="Registrar">
        </div>
        
    </div>



</form>

</div>
<br><br><br><br><br><br><br><br><br><br>
<?php

    $registrarusuario = new AdminC();
    $registrarusuario -> AgregarUsuarioC();

?>


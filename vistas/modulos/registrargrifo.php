


<h3 class="text-center">REGISTRAR UN GRIFO</h3>
	
<form class="form-group" method="post" action="">
    <div class="row">
        <div class="form-group col-md-3">
            <label for="ruc">RUC</label>
            <input class="form-control" type="text" placeholder="RUC" name="ruc" id="ruc" required>
            <span style="color: red;" id="r_ruc"></span>
        </div>

        <div class="form-group col-md-9">
            <label for="razonsocial">Razon Social</label>
            <input class="form-control" type="text" placeholder="Razon Social" name="razonsocial" id="razonsocial" required>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-4">
            <label for="expediente">Nro de Expediente</label>
            <input class="form-control" type="text" placeholder="Expediente" name="expediente" id="expediente" required>
            <span id="r_expediente"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="osinergmin">Código Osinergmin</label>
            <input class="form-control" type="text" placeholder="Codigo Osinergmin" name="osinergmin" id="osinergmin" required>
            <span id="r_osinergmin"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="registro">Nro de Registro</label>
            <input class="form-control" type="text" placeholder="Registro" name="registro" id="registro" required>
            <span id="r_registro"></span>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="direccion">Dirección Operativa</label>
            <input class="form-control" type="text" placeholder="Dirección Operativa" name="direccion" id="direccion" required>
        </div>
        <div class="form-group col-md-3">
            <label for="departamento">Departamento</label>
            <input class="form-control" type="text" placeholder="Departamento" name="departamento" id="departamento" value="LORETO" readOnly required>
        </div>
        <div class="form-group col-md-3">
        <label for="pronvicia">Provincia</label>
				<select class="form-control" id="provincia" name="provincia" required>
					<option value="" disabled selected>Selecciona una provincia</option>
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
    </div>
    
    <div class="row">
        
        <div class="form-group col-md-4">
            <label for="fecha_em">Fecha de emisión</label>
            <input class="form-control" type="date" placeholder="Fecha de emision" name="fecha_em" id="fecha_em" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Término de vigencia</label>
            <select class="form-control" name="" id="opcion">
                <option value="fecha">fecha</option>
                <option value="INDEFINIDO">INDEFINIDO</option>
            </select>

            <input class="form-control" type="text" id="termino" name="termino">
            
            
        </div>

        <div class="form-group col-md-4">
        <label for="distrito">Distrito</label>
				<select class="form-control col-md-5" id="distrito" name="distrito" required>
					<option value="" disabled selected>Selecciona un distrito</option>
				</select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="representante">Representante legal</label>
            <input class="form-control" type="text" placeholder="Representante legal" name="representante" id="representante" required>
        </div>   
        <div class="form-group col-md-4">
            <label for="tipo">Tipo de grifo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="INSTALACIONES FIJAS">INSTALACIONES FIJAS</option>
                <option value="GRIFO FLOTANTE" selected>GRIFO FLOTANTE</option>
                <option value="GRIFOS RURALES">GRIFOS RURALES</option>
            </select>
        </div> 
        <div class="form-group col-md-3">
            <br><br>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">        
        </div>
        <div class="form-group col-md-2">
            <input class="btn btn-success" name="boton" id="boton" type="submit" value="Registrar">
        </div>
        <div class="form-group col-md-5">        
        </div>
    </div>



</form>
<?php

$registrar = new GrifoC();
$registrar -> RegistrarGrifoC();

?>


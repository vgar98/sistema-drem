<?php

class GrifoC{

    //Registrar los grifos
    public function RegistrarGrifoC(){
         
        if(isset($_POST["ruc"])){
            $date = $_POST["fecha_em"];  
            $fecha = date("d/m/Y", strtotime($date)); 
            //$datosC = array("ruc"=>$_POST["ruc"],"razonsocial"=>$_POST["razonsocial"],"expediente"=>$_POST["expediente"],"osinergmin"=>$_POST["osinergmin"],"registro"=>$_POST["registro"],"direccion"=>$_POST["direccion"],"departamento"=>$_POST["departamento"],"distrito"=>$_POST["distrito"],"provincia"=>$_POST["provincia"],"fecha_em"=>$_POST["fecha_em"],"termino"=>$_POST["termino"],"representante"=>$_POST["representante"],"tipo"=>$_POST["tipo"]);
            $datosC = array("ruc"=>$_POST["ruc"],"razonsocial"=>$_POST["razonsocial"],"expediente"=>$_POST["expediente"],"osinergmin"=>$_POST["osinergmin"],"registro"=>$_POST["registro"],"direccion"=>$_POST["direccion"],"departamento"=>$_POST["departamento"],"distrito"=>$_POST["distrito"],"provincia"=>$_POST["provincia"],"fecha_em"=>$fecha,"termino"=>$_POST["termino"],"representante"=>$_POST["representante"],"tipo"=>$_POST["tipo"]);

            $tablaBD = "grifo";
            
            $respuesta = grifoM::RegistrarGrifoM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=grifo");
            }
            else{
                echo "Error";
            }
        }
    }

    //mostrar los grifos

    function MostrarGrifoC(){


        $tablaBD = "grifo";
        $respuesta = GrifoM::MostrarGrifoM($tablaBD);

        //boton
        //<td><a href="ruteador.php?ruta=editar&id_empresa='.$value["id_empresa"].'"><button>Editar</button></a></td>


        foreach ($respuesta as $key => $value){
            if($value["ctotal"]==null){
                $value["ctotal"] = "00";
            }
            echo'<tr>
            <td>'.$value["nro_exped"].'</td>
            <td>'.$value["cod_osinergmin"].'</td>
            <td>'.$value["id_registro"].'</td>
            <td>'.$value["ruc"].'</td>
            <td>'.$value["razon_social"].'</td>
            <td>'.$value["direccion"].'</td>
            <td>'.$value["departamento"].'</td>
            <td>'.$value["provincia"].'</td>
            <td>'.$value["distrito"].'</td>
            <td>'.$value["ctotal"].'</td>
            <td>'.$value["fecha_emision"].'</td>
            <td>'.$value["term_vigencia"].'</td>
            <td>'.$value["representante"].'</td>
            <td>'.$value["tipo"].'</td>
            <td><a href="ruteador.php?ruta=verdetalles&ruc='.$value["ruc"].'"><button class="btn btn-success">Ver detalles</button></a></td>

            </tr>';
        }


    }


    public function VistaCompleta(){
        $tablaBD = "grifo";
        $respuesta = GrifoM::VistaCompletaM($tablaBD);

        //boton
        //<td><a href="ruteador.php?ruta=editar&id_empresa='.$value["id_empresa"].'"><button>Editar</button></a></td>


        foreach ($respuesta as $key => $value){
            echo'<tr>
            <td>'.$value["nro_exped"].'</td>
            <td>'.$value["cod_osinergmin"].'</td>
            <td>'.$value["id_registro"].'</td>
            <td>'.$value["ruc"].'</td>
            <td>'.$value["razon_social"].'</td>
            <td>'.$value["direccion"].'</td>
            <td>'.$value["departamento"].'</td>
            <td>'.$value["provincia"].'</td>
            <td>'.$value["distrito"].'</td>
            <td>'.$value["ctotal"].'</td>
            <td>'.$value["fecha_emision"].'</td>
            <td>'.$value["term_vigencia"].'</td>
            <td>'.$value["representante"].'</td>
            <td>'.$value["nombre_prod"].'</td>
            <td>'.$value["tipo"].'</td>

            </tr>';
        }

    }

    //ver detalles
    public function VerDetallesC(){

        $datosC = $_GET["ruc"];
        $tablaBD = "grifo";

        $respuesta = GrifoM::VerDetallesM($datosC,$tablaBD);

        echo '
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="ruc">RUC:</label>
                    <input class="form-control" type="text" value="'.$respuesta["ruc"].'" placeholder="Ruc" name="ruc" id="ruc" readonly required>
                </div>
                <div class="form-group col-md-8">
                    <label for="razon_social">Razón social:</label>
                    <input class="form-control" type="text" value="'.$respuesta["razon_social"].'" placeholder="razon_social" name="razon_social" id="razon_social" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nro_exped">Número de expediente:</label>
                    <input class="form-control" type="text" value="'.$respuesta["nro_exped"].'" placeholder="nro_exped" name="nro_exped" id="nro_exped" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cod_osinergmin">Código Osingermin:</label>
                    <input class="form-control" type="text" value="'.$respuesta["cod_osinergmin"].'" placeholder="cod_osinergmin" readonly name="cod_osinergmin" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="id_registro">Número de registro:</label>
                    <input class="form-control" type="text" value="'.$respuesta["id_registro"].'" placeholder="id_registro" readonly name="id_registro" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="direccion">Dirección operativa</label>
                    <input class="form-control" type="text" value="'.$respuesta["direccion"].'" placeholder="direccion" name="direccion" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="departamento">Departamento</label>
                    <input class="form-control" type="text" value="'.$respuesta["departamento"].'" placeholder="departamento" name="departamento" id="departamento" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="distrito">Distrito</label>
                    <input class="form-control" type="text" value="'.$respuesta["distrito"].'" placeholder="distrito" name="distrito" id="distrito" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="provincia">Provincia</label>
                    <input class="form-control" type="text" value="'.$respuesta["provincia"].'" placeholder="provincia" name="provincia" id="provincia" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fecha_emision">Fecha de emisión</label>
                    <input class="form-control" type="text" value="'.$respuesta["fecha_emision"].'" placeholder="fecha_emision" name="fecha_emision" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="term_vigencia">Término de vigencia</label>
                    <input class="form-control" type="text" value="'.$respuesta["term_vigencia"].'" placeholder="term_vigencia" name="term_vigencia" id="term_vigencia" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="representante">Representante legal</label>
                    <input class="form-control" type="text" value="'.$respuesta["representante"].'" placeholder="representante" name="representante" id="representante" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipo">Tipo</label>
                    <input class="form-control" type="text" value="'.$respuesta["tipo"].'" placeholder="tipo" name="tipo" id="tipo" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="ctotal">Total de galones</label>
                    <input class="form-control" type="text" value="'.$respuesta["ctotal"].'" placeholder="ctotal" name="ctotal" id="ctotal" readonly required>
                </div>
            </div>
            <div class="row">
                <input class="btn btn-success" id="boton" type="submit" value="Actualizar">
            </div>

            ';

    }

    //actualizar info del grifo
    public function ActualizarGrifoC(){
        if(isset($_POST["ruc"])){
            $datosC = array("ruc"=>$_POST["ruc"],"razon_social"=>trim($_POST["razon_social"]),"direccion"=>$_POST["direccion"],"departamento"=>$_POST["departamento"],"distrito"=>$_POST["distrito"],"provincia"=>$_POST["provincia"],"fecha_emision"=>$_POST["fecha_emision"],"term_vigencia"=>$_POST["term_vigencia"],"representante"=>$_POST["representante"],"tipo"=>$_POST["tipo"]);
            $tablaBD = "grifo";

            $respuesta = GrifoM::ActualizarGrifoM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=verdetalles&ruc=".$datosC["ruc"]."");
            }
            else{
                echo "Error";
            }
        }

    }
   
    

}

?>
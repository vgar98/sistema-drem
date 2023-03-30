<?php
class ProductoC{
    public function MostrarProductoC(){
        $tablaBD = "producto";
        $respuesta = ProductoM::MostrarProductoM($tablaBD);


        foreach ($respuesta as $key => $value){
            echo'<tr>
            <td>'.$value["id_producto"].'</td>
            <td>'.$value["nombre_prod"].'</td>
            <td>'.$value["estado"].'</td>
            <td><a href="ruteador.php?ruta=editarproducto&id_producto='.$value["id_producto"].'"><button class="btn btn-success">Editar</button></a></td>
            
            </tr>';
        }
    }

    //agregarproducto
    public function AgregarProductoC(){

        if(isset($_POST["nombre_prod"])){
            $datosC = array("nombre_prod"=>trim($_POST["nombre_prod"]),"estado"=>$_POST["estado"]);
            
            $tablaBD = "producto";
            
            $respuesta = ProductoM::AgregarProductoM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=producto");
            }
            else{
                echo "Error";
            }
        }
    }

    //editar producto
    public function EditarProductoC(){

        $datosC = $_GET["id_producto"];
        $tablaBD = "producto";

        $respuesta = ProductoM::EditarProductoM($datosC,$tablaBD);

        echo '
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="id_producto">ID del producto</label>
                    <input class="form-control" type="text" value="'.$respuesta["id_producto"].'" placeholder="ID del producto" name="id_producto" id="id_producto" readonly required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre_prod">Nombre del producto</label>
                    <input class="form-control" type="text" value="'.$respuesta["nombre_prod"].'" placeholder="Nombre del producto" name="nombre_prod" id="nombre_prod" required>
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
            
            
            <br>
            <input class="btn btn-success" id="boton" type="submit" value="Actualizar">
            <a href="ruteador.php?ruta=producto"><input class="btn btn-danger" type="submit" value="Volver"></a>
            ';

    }


    //actualizar producto
    public function ActualizarProductoC(){

        if(isset($_POST["id_producto"])){
            $datosC = array("id_producto"=>$_POST["id_producto"],"nombre_prod"=>trim($_POST["nombre_prod"]),"estado"=>$_POST["estado"]);
            $tablaBD = "producto";

            $respuesta = ProductoM::ActualizarProductoM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=producto");
            }
            else{
                echo "Error";
            }
        }

    }

}
?>
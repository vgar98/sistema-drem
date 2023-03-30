<?php
class TanqueC{
    function MostrarTanqueC(){

        //<td><a href="ruteador.php?ruta=verdetalles&ruc='.$value["ruc"].'"><button class="btn btn-success">Ver detalles</button></a></td>

        $datosC = $_GET["ruc"];
        $tablaBD = "grifo";

        $respuesta = TanqueM::MostrarTanqueM($datosC,$tablaBD);

        foreach ($respuesta as $key => $value){
            
            echo'<tr>
            <td>'.$value["id_tanque"].'</td>
            <td>'.$value["cant_galones"].'</td>
            <td>'.$value["nombre_prod"].'</td>

            <td><a href="ruteador.php?ruta=tanque&ruc='.$value["ruc"].'&id_tanque='.$value["id_tanque"].'"><button class="btn btn-success">Editar</button></a></td>

            </tr>';
        }


    }


    public function AgregarTanqueC(){

        if(isset($_POST["ruc1"])){
            $datosC = array("ruc"=>$_POST["ruc1"],"id_tanque"=>$_POST["id_tanque"],"id_producto"=>$_POST["id_producto"],"cant_galones"=>$_POST["cant_galones"]);
            $tablaBD = "detalle_registro";

            $respuesta = TanqueM::AgregarTanqueM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=verdetalles&ruc=".$datosC["ruc"]."");
            }
            else{
                echo "Error";
            }
        }

    }
    

    //listar productos
    public function ListarProductoC(){
        $tablaBD = "producto";
        $respuesta = TanqueM::ListarProductoM($tablaBD);

        //boton
        //<td><a href="ruteador.php?ruta=editar&id_empresa='.$value["id_empresa"].'"><button>Editar</button></a></td>


        foreach ($respuesta as $key => $value){
            echo'
                <option value="'.$value["id_producto"].'">'.$value["nombre_prod"].'</option>

            ';
        }

    }

    public function ListarTanqueC(){
        $datosC = $_GET["ruc"];
        $tablaBD = "tanque";

        $respuesta = TanqueM::ListarTanqueM($datosC,$tablaBD);


        foreach ($respuesta as $key => $value){
            echo'
                <option value="'.$value["id_tanque"].'">'.$value["id_tanque"].'</option>

            ';
        }
    }


    function EditarTanqueC(){

        //$datosC = $_GET["ruc"];
        //$datosC1 = $_GET["id_tanque"];
        $ruc = $_GET["ruc"];
        $id_tanque = $_GET["id_tanque"];
        $datosC = array("ruc"=>$ruc,"id_tanque"=>$id_tanque);
        
        $tablaBD = "grifo";

        $respuesta = TanqueM::EditarTanqueM($datosC,$tablaBD);

        echo '
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="RUC">RUC</label>
                    <input class="form-control" type="text" value="'.$respuesta["ruc"].'" placeholder="RUC" name="ruc" id="ruc" readonly required>
                </div> 
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="razon_social">Razón social</label>
                    <input class="form-control" type="text" value="'.$respuesta["razon_social"].'" placeholder="Razon Social" name="razon_social" id="razon_social" readonly required>
                </div> 
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="id_tanque">Número de tanque</label>
                    <input class="form-control" type="text" value="'.$respuesta["id_tanque"].'" placeholder="Tanque" name="id_tanque" id="id_tanque" readonly required>
                    </div> 
            </div>
            <input class="form-control" type="hidden" value="'.$respuesta["id_registro"].'" placeholder="Id registro" name="id_registro" id="id_registro" readonly required>


            <div class="row">
                <div class="form-group col-md-5">
                    <label for="id_tanque">Número de tanque</label>
                    <select class="form-control" name="id_producto" id="id_producto" required>
                        <option value="'.$respuesta["id_producto"].'">'.$respuesta["nombre_prod"].'</option>
                   





            
                
            
          
        ';
        

    }

    public function ActualizarTanqueC(){

        if(isset($_POST["ruc"])){
            $datosC = array("id_registro"=>$_POST["id_registro"],"ruc"=>$_POST["ruc"],"id_tanque"=>$_POST["id_tanque"],"id_producto"=>$_POST["id_producto"]);
            $tablaBD = "detalle_registro";

            $respuesta = TanqueM::ActualizarTanqueM($datosC,$tablaBD);

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
<?php

class AdminC{

    public function IngresoC(){
     if(isset($_POST['usuarioI'])){
        
        $datosC = array("nom_usuario"=>$_POST['usuarioI'], "clave"=>$_POST['claveI']);
       
        $tablaBD = "usuario";
        
        $respuesta = AdminM::IngresoM($datosC,$tablaBD);
        //$nombre = $this -> respuesta["usuario"];    

        if($respuesta["nom_usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]){
            
            //if($respuesta["usuario"=="admin"])
            //if($respuesta["tipo"]=="Normal"){
                session_start();
                $_SESSION["Ingreso"] = true;
                $_SESSION["name"] = "normal";
                $_SESSION["tipo_usuario"] = $respuesta["tipo_usuario"];
                //$nombre -> $respuesta["usuario"];
                $_SESSION["nombre"] = $respuesta["nombre"];
                header("location:ruteador.php?ruta=grifo");
                exit();
                //echo 'sesion iniciada';
                
            
            
            /*
            
            session_start();
            $_SESSION["Ingreso"] = true;
            header("location:index.php?ruta=empresas");
            
            */

        }else{
            echo "ERROR AL INGRESAR";
        }

     }   
    }

    public function MostrarUsuario(){

        $tablaBD = "usuario";
        $respuesta = AdminM::MostrarUsuarioM($tablaBD);

        
        foreach ($respuesta as $key => $value){
            
            echo'<tr>
            <td>'.$value["nom_usuario"].'</td>
            <td>'.$value["clave"].'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["apellido"].'</td>
            <td>'.$value["tipo_usuario"].'</td>
            
            <td><a href="ruteador.php?ruta=editarusuario&id_usuario='.$value["id_usuario"].'"><button class="btn btn-success">Editar</button></a></td>

            <td><a href="ruteador.php?ruta=usuario&idB='.$value["id_usuario"].'"><button class="btn btn-danger">Borrar</button></a></td>

            </tr>';
        }
    }

    public function AgregarUsuarioC(){

        if(isset($_POST["nom_usuario"])){
            $datosC = array("nom_usuario"=>trim($_POST["nom_usuario"]),"nombre"=>$_POST["nombre"],"apellido"=>$_POST["apellido"],"clave"=>$_POST["clave"],"tipo_usuario"=>$_POST["tipo_usuario"]);
            
            $tablaBD = "usuario";
            
            $respuesta = AdminM::AgregarusuarioM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=usuario");
            }
            else{
                echo "Error";
            }
        }
    }


    public function EditarUsuarioC(){

        $datosC = $_GET["id_usuario"];
        $tablaBD = "usuario";

        $respuesta = AdminM::EditarUsuarioM($datosC,$tablaBD);
        $tipo_u = $respuesta["tipo_usuario"];
        if($tipo_u == "ADMINISTRADOR"){
            $tipo_u2 = "NORMAL";
        }
        else{
            $tipo_u2 = "ADMINISTRADOR";
        }
        echo '
            
            <input type="hidden" id="id_usuario" name="id_usuario" value="'.$respuesta["id_usuario"].'">

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nom_usuario">Nombre de usuario</label>
                    <input class="form-control" type="text" value="'.$respuesta["nom_usuario"].'" placeholder="Nombre de usuario" name="nom_usuario" id="nom_usuario" readonly required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombres</label>
                    <input class="form-control" type="text" value="'.$respuesta["nombre"].'" placeholder="Nombres" name="nombre" id="nombre" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="apellido">Apellidos</label>
                    <input class="form-control" type="text" value="'.$respuesta["apellido"].'" placeholder="Apellidos" name="apellido" id="apellido" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="clave">Contraseña</label>
                    <input class="form-control" type="text" value="'.$respuesta["clave"].'" placeholder="Contraseña" name="clave" id="clave" required>
                </div>
            </div>
           
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="tipo_usuario">Estado</label>
                    <select class="form-control" name="tipo_usuario" id="tipo_usuario" required>
                        <option value="'.$respuesta["tipo_usuario"].'" selected>'.$respuesta["tipo_usuario"].'</option>
                        <option value="'.$tipo_u2.'">'.$tipo_u2.'</option>
                    </select>
                </div>
            </div>
            
            
            <br>
            <input class="btn btn-success" id="boton" type="submit" value="Actualizar">
            <a href="ruteador.php?ruta=usuario"><input class="btn btn-danger" type="submit" value="Volver"></a>
            ';

    }

    public function ActualizarUsuarioC(){

        if(isset($_POST["id_usuario"])){
            $datosC = array("id_usuario"=>$_POST["id_usuario"],"nom_usuario"=>trim($_POST["nom_usuario"]),"nombre"=>$_POST["nombre"],"apellido"=>$_POST["apellido"],"clave"=>$_POST["clave"],"tipo_usuario"=>$_POST["tipo_usuario"]);
            $tablaBD = "usuario";

            $respuesta = AdminM::ActualizarUsuarioM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=usuario");
            }
            else{
                echo "Error";
            }
        }

    }


    public function BorrarUsuarioC(){

        if(isset($_GET["idB"]))
        {
            $datosC = $_GET["idB"];
            $tablaBD = "usuario";
            
            $respuesta = AdminM::BorrarUsuarioM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:ruteador.php?ruta=usuario");
            }
            else{
                echo "Error";
            }
        }

    }


}

?>
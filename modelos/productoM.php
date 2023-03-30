<?php
class ProductoM extends conexionBD{
    static public function MostrarProductoM($tablaBD){
        //$pdo = ConexionBD::cBD()->prepare("SELECT ruc FROM $tablaBD");
        $pdo = ConexionBD::cBD()->prepare("SELECT id_producto, nombre_prod, estado FROM $tablaBD");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    //agregar producto
    static public function AgregarProductoM($datosC,$tablaBD){
        $tablaregistro ="registro";
        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre_prod, estado) VALUES (:nombre_prod, :estado)");

        $pdo -> bindParam(":nombre_prod", $datosC["nombre_prod"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        


        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        
        }
        
    }

    //editar producto
    static public function EditarProductoM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("SELECT id_producto, nombre_prod, estado FROM $tablaBD WHERE id_producto = :id_producto");
        $pdo -> bindParam(":id_producto",$datosC,PDO::PARAM_INT);
        $pdo ->execute();
        return $pdo -> fetch();
        $pdo -> close();
        
    }


    //actualizar producto

    static public function ActualizarProductoM($datosC,$tablaBD){

        $pdo = ConexionBD::CBD()->prepare("UPDATE $tablaBD SET nombre_prod = :nombre_prod, estado = :estado WHERE id_producto = :id_producto");

        $pdo -> bindParam(":id_producto", $datosC["id_producto"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre_prod", $datosC["nombre_prod"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }


    }


}
?>
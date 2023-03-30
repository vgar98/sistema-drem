<?php
require_once "conexionBD.php";

class AdminM extends ConexionBD{
    static public function IngresoM($datosC,$tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT nom_usuario, nombre, clave, tipo_usuario FROM $tablaBD WHERE nom_usuario = :nom_usuario");
    
        $pdo -> bindParam(":nom_usuario", $datosC["nom_usuario"], PDO::PARAM_STR);
        
        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
    }

    static public function MostrarUsuarioM($tablaBD){
        //$pdo = ConexionBD::cBD()->prepare("SELECT ruc FROM $tablaBD");
        $pdo = ConexionBD::cBD()->prepare("select id_usuario, nom_usuario, clave, nombre, apellido, tipo_usuario from $tablaBD");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    static public function AgregarusuarioM($datosC,$tablaBD){
        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (nom_usuario, clave, nombre, apellido, tipo_usuario) VALUES (:nom_usuario, :clave, :nombre, :apellido, :tipo_usuario)");

        $pdo -> bindParam(":nom_usuario", $datosC["nom_usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo_usuario", $datosC["tipo_usuario"], PDO::PARAM_STR);


        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        
        }

        $pdo ->close();
        
    }


    static public function EditarUsuarioM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("SELECT id_usuario, nom_usuario, clave, nombre, apellido, tipo_usuario FROM $tablaBD WHERE id_usuario = :id_usuario");
        $pdo -> bindParam(":id_usuario",$datosC,PDO::PARAM_INT);
        $pdo ->execute();
        return $pdo -> fetch();
        $pdo -> close();
        
    }

    static public function ActualizarUsuarioM($datosC,$tablaBD){

        $pdo = ConexionBD::CBD()->prepare("UPDATE $tablaBD SET nom_usuario = :nom_usuario, nombre = :nombre, apellido = :apellido, clave = :clave, tipo_usuario = :tipo_usuario WHERE id_usuario = :id_usuario");

        $pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_INT);
        $pdo -> bindParam(":nom_usuario", $datosC["nom_usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo_usuario", $datosC["tipo_usuario"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }

        $pdo ->close();


    }

    static public function BorrarUsuarioM($datosC,$tablaBD){

        $pdo = ConexionBD::cBD()->prepare("DELETE from usuario where id_usuario = :id_usuario");
    
        $pdo -> bindParam(":id_usuario", $datosC, PDO::PARAM_INT);

        
        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }

        $pdo ->close();


    }

}
?>
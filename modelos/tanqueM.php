<?php
class TanqueM{

    //mostrar tanque
    static public function MostrarTanqueM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("select g.ruc as ruc, dr.cant_galones as cant_galones, t.id_tanque as id_tanque, p.nombre_prod as nombre_prod from $tablaBD as g inner join registro as r on g.ruc = r.ruc inner join detalle_registro as dr on r.id_registro = dr.id_registro inner join tanque as t on dr.id_tanque = t.id_tanque inner join producto as p on dr.id_producto = p.id_producto where g.ruc = :ruc order by id_tanque asc");
        $pdo -> bindParam(":ruc",$datosC,PDO::PARAM_STR);
        $pdo ->execute();
        return $pdo -> fetchAll();
        $pdo -> close();
        
    }


    static public function AgregarTanqueM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("insert into $tablaBD (id_registro, id_tanque, cant_galones, id_producto) values ((select id_registro from registro where ruc = :ruc),(SELECT id_tanque from tanque where id_tanque = :id_tanque), :cant_galones, (SELECT id_producto FROM producto where id_producto = :id_producto))");
        $pdo -> bindParam(":ruc",$datosC["ruc"],PDO::PARAM_STR);
        $pdo -> bindParam(":id_tanque",$datosC["id_tanque"],PDO::PARAM_STR);
        $pdo -> bindParam(":id_producto",$datosC["id_producto"],PDO::PARAM_STR);
        $pdo -> bindParam(":cant_galones",$datosC["cant_galones"],PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        
        }
        
    }

    static public function ListarProductoM($tablaBD){
        //$pdo = ConexionBD::cBD()->prepare("SELECT ruc FROM $tablaBD");
        $pdo = ConexionBD::cBD()->prepare("select id_producto, nombre_prod from producto where estado='DISPONIBLE'");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    static public function ListarTanqueM($datosC,$tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT id_tanque from $tablaBD where id_tanque not in (select id_tanque from detalle_registro as dr inner join registro as r on r.id_registro = dr.id_registro where ruc = :ruc)");
        $pdo -> bindParam(":ruc",$datosC,PDO::PARAM_STR);
        $pdo ->execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    
    static public function EditarTanqueM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("select r.id_registro as id_registro, g.razon_social as razon_social, g.ruc as ruc, t.id_tanque as id_tanque, p.id_producto as id_producto, p.nombre_prod as nombre_prod from grifo as g inner join registro as r on g.ruc = r.ruc inner join detalle_registro as dr on r.id_registro = dr.id_registro inner join tanque as t on dr.id_tanque = t.id_tanque inner join producto as p on p.id_producto = dr.id_producto where g.ruc = :ruc and t.id_tanque = :id_tanque");
        $pdo -> bindParam(":ruc",$datosC["ruc"],PDO::PARAM_STR);
        $pdo -> bindParam(":id_tanque",$datosC["id_tanque"],PDO::PARAM_STR);
        $pdo ->execute();
        return $pdo -> fetch();
        $pdo -> close();
        
    }

    static public function ActualizarTanqueM($datosC,$tablaBD){

        $pdo = ConexionBD::CBD()->prepare("update detalle_registro set id_producto = :id_producto where id_tanque = :id_tanque and id_registro = :id_registro");

        $pdo -> bindParam(":id_registro", $datosC["id_registro"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_tanque", $datosC["id_tanque"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_producto", $datosC["id_producto"], PDO::PARAM_STR);
        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }


    }

}
?>
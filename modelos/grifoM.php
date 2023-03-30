<?php

require_once "conexionBD.php";

class GrifoM extends conexionBD{

    // registrar grifo
    static public function RegistrarGrifoM($datosC,$tablaBD){
        $tablaregistro ="registro";
        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (ruc, razon_social, representante, direccion, departamento, provincia, distrito, tipo) VALUES (:ruc, :razonsocial, :representante, :direccion, :departamento, :provincia, :distrito, :tipo);
        INSERT INTO registro (id_registro, ruc, cod_osinergmin, nro_exped, fecha_emision, term_vigencia) VALUES (:registro, (Select ruc from grifo where ruc = :ruc), :osinergmin, :expediente, :fecha_em, :termino)
        ");

        $pdo -> bindParam(":ruc", $datosC["ruc"], PDO::PARAM_STR);
        $pdo -> bindParam(":razonsocial", $datosC["razonsocial"], PDO::PARAM_STR);
        $pdo -> bindParam(":representante", $datosC["representante"], PDO::PARAM_STR);
        $pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo -> bindParam(":departamento", $datosC["departamento"], PDO::PARAM_STR);
        $pdo -> bindParam(":provincia", $datosC["provincia"], PDO::PARAM_STR);
        $pdo -> bindParam(":distrito", $datosC["distrito"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        $pdo -> bindParam(":registro", $datosC["registro"], PDO::PARAM_STR);
        //$pdo2 -> bindParam(":ruc", $datosC["ruc"], PDO::PARAM_STR);
        $pdo -> bindParam(":osinergmin", $datosC["osinergmin"], PDO::PARAM_STR);
        $pdo -> bindParam(":expediente", $datosC["expediente"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha_em", $datosC["fecha_em"], PDO::PARAM_STR);
        $pdo -> bindParam(":termino", $datosC["termino"], PDO::PARAM_STR);
        

        $pdo2 = conexionBD::cBD()->prepare("INSERT INTO $tablaregistro (registro, ruc, cod_osinergmin, nro_exped, fecha_emision, term_vigencia) VALUES (:registro, LAST_INSERT_ID(), :osinergmin, :expediente, :fecha_em, :termino)");
        $pdo2 -> bindParam(":registro", $datosC["registro"], PDO::PARAM_STR);
        //$pdo2 -> bindParam(":ruc", $datosC["ruc"], PDO::PARAM_STR);
        $pdo2 -> bindParam(":osinergmin", $datosC["osinergmin"], PDO::PARAM_STR);
        $pdo2 -> bindParam(":expediente", $datosC["expediente"], PDO::PARAM_STR);
        $pdo2 -> bindParam(":fecha_em", $datosC["fecha_em"], PDO::PARAM_STR);
        $pdo2 -> bindParam(":termino", $datosC["termino"], PDO::PARAM_STR);


        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        
        }
        
    }


    
    // mostrar grifos    

    static public function MostrarGrifoM($tablaBD){
        //$pdo = ConexionBD::cBD()->prepare("SELECT ruc FROM $tablaBD");
        $pdo = ConexionBD::cBD()->prepare("SELECT g.tipo as tipo,r.nro_exped as nro_exped, r.cod_osinergmin as cod_osinergmin, r.id_registro as id_registro, g.ruc as ruc, g.razon_social as razon_social, g.direccion as direccion, g.departamento as departamento, g.provincia as provincia, g.distrito as distrito, SUM(dr.cant_galones) AS ctotal, r.fecha_emision as fecha_emision, r.term_vigencia as term_vigencia, g.representante as representante FROM grifo AS g left join registro AS r ON g.ruc = r.ruc left join detalle_registro as dr ON r.id_registro = dr.id_registro left join tanque AS t ON dr.id_tanque = t.id_tanque left join producto AS p ON dr.id_producto = p.id_producto group by g.ruc");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }


    static public function VerDetallesM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("SELECT g.tipo as tipo,r.nro_exped as nro_exped, r.cod_osinergmin as cod_osinergmin, r.id_registro as id_registro, g.ruc as ruc, g.razon_social as razon_social, g.direccion as direccion, g.departamento as departamento, g.provincia as provincia, g.distrito as distrito, SUM(dr.cant_galones) AS ctotal, r.fecha_emision as fecha_emision, r.term_vigencia as term_vigencia, g.representante as representante FROM grifo AS g left join registro AS r ON g.ruc = r.ruc left join detalle_registro as dr ON r.id_registro = dr.id_registro left join tanque AS t ON dr.id_tanque = t.id_tanque left join producto AS p ON dr.id_producto = p.id_producto where g.ruc = :ruc");
        $pdo -> bindParam(":ruc",$datosC,PDO::PARAM_STR);
        $pdo ->execute();
        return $pdo -> fetch();
        $pdo -> close();
        
    }

    static public function VistaCompletaM($tablaBD){
        //$pdo = ConexionBD::cBD()->prepare("SELECT ruc FROM $tablaBD");
        $pdo = ConexionBD::cBD()->prepare("SELECT group_concat(p.nombre_prod) as nombre_prod,g.tipo as tipo,r.nro_exped as nro_exped, r.cod_osinergmin as cod_osinergmin, r.id_registro as id_registro, g.ruc as ruc, g.razon_social as razon_social, g.direccion as direccion, g.departamento as departamento, g.provincia as provincia, g.distrito as distrito, SUM(dr.cant_galones) AS ctotal, r.fecha_emision as fecha_emision, r.term_vigencia as term_vigencia, g.representante as representante FROM grifo AS g inner join registro AS r ON g.ruc = r.ruc inner join detalle_registro as dr ON r.id_registro = dr.id_registro inner join tanque AS t ON dr.id_tanque = t.id_tanque inner join producto AS p ON dr.id_producto = p.id_producto group by dr.id_registro");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    //actualizar grifo
    static public function ActualizarGrifoM($datosC,$tablaBD){

        $pdo = ConexionBD::CBD()->prepare("UPDATE grifo as g, registro as r SET g.razon_social = :razon_social, g.direccion = :direccion, g.departamento = :departamento, g.distrito = :distrito, g.provincia = :provincia, g.representante = :representante, r.fecha_emision = :fecha_emision, r.term_vigencia = :term_vigencia, g.tipo = :tipo WHERE g.ruc = :ruc AND r.ruc = :ruc");

        $pdo -> bindParam(":ruc", $datosC["ruc"], PDO::PARAM_STR);
        $pdo -> bindParam(":razon_social", $datosC["razon_social"], PDO::PARAM_STR);
        $pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo -> bindParam(":departamento", $datosC["departamento"], PDO::PARAM_STR);
        $pdo -> bindParam(":distrito", $datosC["distrito"], PDO::PARAM_STR);
        $pdo -> bindParam(":provincia", $datosC["provincia"], PDO::PARAM_STR);
        $pdo -> bindParam(":representante", $datosC["representante"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha_emision", $datosC["fecha_emision"], PDO::PARAM_STR);
        $pdo -> bindParam(":term_vigencia", $datosC["term_vigencia"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);


        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }


    }

    
}

?>
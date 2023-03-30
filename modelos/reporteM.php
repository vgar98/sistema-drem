<?php
class ReporteM extends conexionBD{
    static public function BuscarM($datosC,$tablaBD){
        
        if($datosC["provincia"]=="TODOS"){
            $prov = "false";
            
        }
        else{
            $prov = '"'.$datosC["provincia"].'"';
        }

        if($datosC["distrito"]=="TODOS"){
            $dis = "false";
        }
        else{
            $dis = '"'.$datosC["distrito"].'"';
        }

        if($datosC["tipo"]=="TODOS"){
            $tipo = "false";
        }
        else{
            $tipo = '"'.$datosC["tipo"].'"';
        }
        
        echo '<H6 class="text-center">PROVINCIA:'.$datosC["provincia"].' DISTRITO:'.$datosC["distrito"].' TIPO: '.$datosC["tipo"].' FECHA DE EMISION DESDE:'.$datosC["fecha1"].' HASTA:'.$datosC["fecha2"].'</H6>';
        echo '<br>';
        $pdo = ConexionBD::cBD()->prepare("SELECT g.tipo as tipo,r.nro_exped as nro_exped, r.cod_osinergmin as cod_osinergmin, r.id_registro as id_registro, g.ruc as ruc, g.razon_social as razon_social, g.direccion as direccion, g.departamento as departamento, g.provincia as provincia, g.distrito as distrito, SUM(dr.cant_galones) AS ctotal, r.fecha_emision as fecha_emision, r.term_vigencia as term_vigencia, g.representante as representante FROM grifo AS g left join registro AS r ON g.ruc = r.ruc left join detalle_registro as dr ON r.id_registro = dr.id_registro left join tanque AS t ON dr.id_tanque = t.id_tanque left join producto AS p ON dr.id_producto = p.id_producto where 
        g.provincia = $prov AND g.distrito = $dis and g.tipo = $tipo AND
        date(str_to_date(r.fecha_emision, '%d/%m/%Y')) >
        date(str_to_date(:fecha1,'%d/%m/%Y')) 
        AND
        date(str_to_date(r.fecha_emision, '%d/%m/%Y')) <
        date(str_to_date(:fecha2,'%d/%m/%Y')) 
        group by g.ruc");

        //$pdo -> bindParam(":provincia", $datosC["provincia"], PDO::PARAM_STR);
        //$pdo -> bindParam(":distrito", $datosC["distrito"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha1", $datosC["fecha1"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha2", $datosC["fecha2"], PDO::PARAM_STR);
        //$pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

}

?>

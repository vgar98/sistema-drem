<?php
class ReporteC{
    public function BuscarC(){
        $originalDate1 = $_POST["fecha1"];
        $fecha1 = date("d/m/Y", strtotime($originalDate1));

        $originalDate2 = $_POST["fecha2"];
        $fecha2 = date("d/m/Y", strtotime($originalDate2));
       
        $datosC = array("distrito"=>$_POST["distrito"],"provincia"=>trim($_POST["provincia"]),"tipo"=>$_POST["tipo"],"fecha1"=>$fecha1,"fecha2"=>$fecha2);

        $tablaBD = "grifo";
        $respuesta = ReporteM::BuscarM($datosC,$tablaBD);

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
            <td>'.$value["tipo"].'</td>

            </tr>';
        }

    }
}
?>
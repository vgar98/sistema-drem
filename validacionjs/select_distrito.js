
 //<script language="javascript" type="text/javascript">
$(document).ready(function(){    
// Map your choices to your option value
var lookup = {
    'TODOS': ['TODOS'],
    'ALTO AMAZONAS': ['BALSAPUERTO', 'JEBEROS', 'LAGUNAS', 'SANTA CRUZ', 'TNTE. CESAR LOPEZ ROJAS', 'YURIMAGUAS'],
    'DATEM DEL MARAÑON': ['ANDOAS', 'BARRANCA', 'CAHUANAPAS', 'MANSERICHE', 'MORONA', 'PASTAZA'],
    'LORETO': ['NAUTA', 'TIGRE', 'PARINARI', 'TROMPETEROS', 'URARINAS'],
    'RAMON CASTILLA': ['PEBAS', 'RAMON CASTILLA', 'SAN PABLO', 'YAVARI'],
    'MAYNAS': ['ALTO NANAY', 'BELEN', 'FERNANDO LORES', 'INDINA', 'IQUITOS', 'LAS AMAZONAS', 'MAZÁN', 'NAPO', 'PUNCHANA', 'SAN JUAN BAUTISTA', 'TORRES CASUANA'],
    'PUTUMAYO': ['PUTUMAYO', 'ROSA PANDURO', 'TNTE. MANUEL CLAVERO', 'YAGUAS'],
    'REQUENA': ['ALTO TAPICHE', 'CAPELO', 'EMILIO SAN MARTIN', 'JENARO HERRERA', 'MAQUÍA', 'PUINAHUA', 'REQUENA', 'SAQUENA', 'SOPLIN', 'TAPICHE','YAQUERANA'],
    'UCAYALI': ['CONTAMANA', 'INAHUAYA', 'PADRE MÁRQUEZ', 'PAMPA HERMOSA', 'SARAYACU', 'VARGAS GUERRA'],
};
 
 // When an option is changed, search the above for matching choices
 $('#provincia').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
 
    // Empty the target field
    $('#distrito').empty();
    
    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
       // Output choice in the target field
       $('#distrito').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
 });


 $("#opcion").click(function(){
    if($(this).val()=="fecha"){
        $("#termino").get(0).type = 'date';
        $("#termino").attr('readonly',false);;

    }
    
    else if($(this).val()=="INDEFINIDO"){
        $("#termino").get(0).type = 'text';
        $("#termino").attr('readonly','readonly');;
        $("#termino").val("INFEFINIDO");
    }
});

    
});
   //</script>


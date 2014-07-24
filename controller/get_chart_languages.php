<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * 
 *
 *******************************************
 *
 * Genera una gráfica usando la libreria Higcharts.js para mostrar información
 *
 ******************************************************************************/
?>
<div id="chart-languages" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
var chart_languages; // variable global para poder re-asignarle los datos mediante ajax

// Pedimos los datos al servidor, los asignamos al chart y establecemos un timeout
// para volver a llamar a la funcion
function requestData2() {
    $.ajax({
        url: 'controller/chart_languages_data.php',
        datatype: 'json',
        success: function(data) {

            data = eval('{' + data + '}');
            chart_languages.series[0].setData(data, true);
            setTimeout(requestData2, 3000);  
        },
        error: function (error) {
            console.log(error);
        },
        cache: false
    });
    
}

$(document).ready(function() {
    chart_languages = new Highcharts.Chart({
        chart: {
            renderTo: 'chart-languages',
            type: 'column',
            events: {
                load: requestData2
            }
        },
        title: {
            text: 'Questions per language'
        },
        credits: {
            enabled: false
        },
        series: [{
            name: "Questions",
            data: []
        }]
    });        
});
</script>
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
<div id="chart-questions" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>

var chart_questions; // variable global para poder re-asignarle los datos mediante ajax

// Pedimos los datos al servidor, los asignamos al chart y establecemos un timeout
// para volver a llamar a la funcion
function requestData3() {
    $.ajax({
        url: 'controller/chart_categories_data.php',
        datatype: 'json',
        success: function(data) {

            data = eval('{' + data + '}');
            chart_questions.series[0].setData(data, true);
            setTimeout(requestData3, 3000);  
        },
        error: function (error) {
            console.log(error);
        },
        cache: false
    });
    
}

$(document).ready(function() {
    chart_questions = new Highcharts.Chart({
        chart: {
            renderTo: 'chart-questions',
            type: 'pie',
            events: {
                load: requestData3
            }
        },
        title: {
            text: 'Questions per category'
        },
        credits: {
            enabled: false
        },
        series: [{
            data: []
        }]
    });        
});
</script>

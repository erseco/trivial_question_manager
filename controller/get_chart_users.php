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
<div id="chart-users" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>
var chart_users; // variable global para poder re-asignarle los datos mediante ajax

// Pedimos los datos al servidor, los asignamos al chart y establecemos un timeout
// para volver a llamar a la funcion
function requestData() {
    $.ajax({
        url: 'controller/chart_users_data.php',
        datatype: 'json',
        success: function(data) {

            data = eval('{' + data + '}');
            chart_users.series[0].setData(data, true);
            setTimeout(requestData, 3000);  
        },
        error: function (error) {
            console.log(error);
        },
        cache: false
    });
    
}

$(document).ready(function() {
    chart_users = new Highcharts.Chart({
        chart: {
            renderTo: 'chart-users',
            type: 'bar',
            events: {
                load: requestData
            }
        },
        title: {
            text: 'Questions per user'
        },
        credits: {
            enabled: false
        },
        series: [{
            name: "Questions",
            color: '#a6c96a',
            data: []
        }]
    });        
});
</script>
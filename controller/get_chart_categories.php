<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Genera una gráfica usando la libreria Higcharts.js para mostrar información
 *
 ******************************************************************************/
?>
<div id="chart-categories" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>

var chart_categories; // variable global para poder re-asignarle los datos mediante ajax

// Pedimos los datos al servidor, los asignamos al chart y establecemos un timeout
// para volver a llamar a la funcion
function requestData1() {
	$.ajax({
		url: 'controller/chart_categories_data.php',
		datatype: 'json',
		success: function(data) {

			data = eval('{' + data + '}');
			chart_categories.series[0].setData(data, true);
			setTimeout(requestData1, 3000);  
		},
		error: function (error) {
			console.log(error);
		},
		cache: false
	});
	
}

$(document).ready(function() {
	chart_categories = new Highcharts.Chart({
		chart: {
			renderTo: 'chart-categories',
			type: 'line',
			events: {
				load: requestData1
			}
		},
		title: {
			text: 'Questions per category'
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

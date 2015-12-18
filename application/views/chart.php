<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafica Columnas</title>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container1',
	                type: 'column',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Grafica Barra Pregunta',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {

	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Frecuencia'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name + ' respuesta \'<i>' +
	                        this.x +'\'</i>: '+ this.y + '</b>';
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            
	            series: []
	        }
	        
	        $.getJSON("<?php echo base_url('chart/data/' . $id); ?>", function(json) {
				options.xAxis.categories = json[1]['data'];
	        	options.series[0] = json[2];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
	</head>
	<body>
		<div id="container1" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
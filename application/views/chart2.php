<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Grafica Barra</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'bar',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            backgroundColor: {
         		linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
  		       stops: [
			            [0, 'rgb(255, 255, 255)'],
			            [1, 'rgb(240, 240, 255)']
			         ]
			      },
	            title: {
	                text: 'Grafica Barra Pregunta  1 = Buena ; 0 = Malas',
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
	                    text: 'Frecuencia 1 = Buena ; 0 = Malas'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {

	                formatter: function() {
	                        return '<b>En la Pregunta '+
	                        this.x +' : '+ this.y +' personas contestaron : ';;
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
	            plotOptions: {
            series: {
                stacking: 'normal'
            }
        		},


	            series: []
	        }
	        
	        $.getJSON("data", function(json) {
				options.xAxis.categories = json[3]['data'];
	        	options.series[0] = json[2];
	        	//options.series[1] = json[2];
	        	//options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
	    <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
	</head>
	<body>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
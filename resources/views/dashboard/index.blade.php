@extends('layouts.menu')
@section('title', '/ Dashboard')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Dashboard
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			
		</div>
	</div>
@endsection

@section('section')

	<div class="col-xs-12 col-sd-5 col-md-5">
		<div class="panel panel-info" >
			<div class="panel-heading">
				Título
				<div class="pull-right">
					<label for="groupResps">Tipo</label>
					<select id="groupResps">
						<option value="bar">Barras</option>
						<option value="pie">Torta</option>
					</select>
				</div>
			</div>
			<div class="panel-body">
				<canvas class="canvas-chart" id="chart1" style="height:250px"></canvas>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sd-5 col-md-5">
		<div class="panel panel-info" >
			<div class="panel-heading">
				Título
				<div class="pull-right">
					<label for="groupResps">Tipo</label>
					<select id="groupResps">
						<option value="bar">Barras</option>
						<option value="pie">Torta</option>
					</select>
				</div>
			</div>
			<div class="panel-body">
				<canvas class="canvas-chart" id="chart2" style="height:250px"></canvas>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	{!! Html::script('assets/scripts/chart.js/Chart.min.js') !!}
	{!! Html::script('assets/scripts/momentjs/moment-with-locales.min.js') !!}
	<script type="text/javascript">
		moment.locale('es');

		$(function () {
			newChart(
				'gestion-humana/getContratosEmpleador',
				'Contratos por Empleador',
				'EMPL_NOMBRECOMERCIAL',
				'count',
				'chart1'
			);
			newChart(
				'cnfg-tickets/getTicketsPorEstado',
				'Tickets por estado',
				'ESTI_DESCRIPCION',
				'count',
				'chart2'
			);
		});


		function newChart($route, $title, $nameX, $nameY, $idCanvas){
			$.ajax({
				//async: false, 
				url: $route,
				dataType: "json",
				type: "GET",
				headers: {
					"X-CSRF-TOKEN": $('input[name="_token"]').val()
				},
				success: function($result) {
				    var labels = [], data=[];
				    $result.forEach(function(packet) {
				      labels.push(packet[$nameX]);
				      data.push(parseInt(packet[$nameY]));
				    });
					buildChart($title, labels, data, $idCanvas);
				},
				error: function($e){
					console.log('Error ajax: '+$e);
				}
			});
		}

		function buildChart($title, $labels, $data, $idCanvas){

			//Se crea un arreglo con los colores asociados a cada pregunta.
			var colors = [];
			$labels.forEach(function ($label, $index) {
				colors.push(getColor($index));
			});

			var chartData = {
				labels: $labels,
				datasets: [{
					label: 'Registros',
					backgroundColor: colors,
					data: $data,
				}]
			};

			var opcs = {
				animation: {
					duration: 0,
					onComplete: function () {
						// render the value of the chart above the bar
						var ctx = this.chart.ctx;
						Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
						ctx.fillStyle = this.chart.config.options.defaultFontColor;
						ctx.textAlign = 'center';
						ctx.textBaseline = 'bottom';
						this.data.datasets.forEach(function (dataset) {
							drawLabelBar(ctx, dataset);
						});
					}
				},
				elements: {
					rectangle: {
						borderWidth: 2,
						//borderColor: 'rgb(0, 204, 0)',
						borderSkipped: 'bottom'
					}
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							min: 0,
							stepSize: 1,
							fontSize: 16
						}
					}],
					xAxes: [{
						ticks: {
							fontSize: 16
						}
					}]
				},
				maintainAspectRatio: false,
				responsive: true,
				title: {
					display: true,
					fontSize: 20,
					padding: 25,
					text: $title
				},
				legend: {
					display: false
				}
			};

			var canvas = document.getElementById($idCanvas).getContext('2d');
			window.chartLineResps = new Chart(canvas, {
				type: 'bar',
				data: chartData,
				options: opcs
			}); // Fin window.chartLineResps
			window.chartLineResps.update();
		}


		//Función para validar si un número es entero (Compatibilidad para IE11 e inferiores)
		var isNumber = function(x) {
			return ! isNaN (x-0) && x !== null && x !== "" && x !== false;
		}

		//Retorna un color predeterminado en un array como RGB.
		var getColor = function (name) {
			var colorsRGB = {
				'red':         'rgba(255,0,0,0.8)',
				'yellow':      'rgba(255,255,0,0.8)',
				'green':       'rgba(0,128,0,0.8)',
				'blue':        'rgba(0,0,255,0.8)',
				'magenta':     'rgba(255,0,255,0.8)',
				'cyan':        'rgba(0,255,255,0.8)',
				'orange':      'rgba(255,165,0,0.8)',
				'grey':        'rgba(128,128,128,0.8)',
				'deepskyblue': 'rgba(0,191,255,0.8)',
				'pink':        'rgba(255,192,203,0.8)',
				'saddlebrown': 'rgba(139,69,19,0.8)',
			};

			//Si name es un número, entonces se debe buscar el indice en el arreglo
			if(isNumber(name)){
				index = name;
				var keys = Object.keys(colorsRGB);
				if(index >= 0 && index < keys.length )
						return colorsRGB[keys[index]];
				else
						return randomColor();

			}//Sino, entonces se buscará por llave asociativa.
			else if (typeof colorsRGB[name.toLowerCase()] != 'undefined'){
				return colorsRGB[name.toLowerCase()];
			}

			//No se encontró...
			return false;
		}; // Fin function $scope.getColor

		//Adiciona porcentaje como texto en el gráfico de barras (bar)
		var drawLabelBar = function (ctx, dataset) {
			for (var i = 0; i < dataset.data.length; i++) {
				var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
				if(ctx.canvas.clientWidth > 600){
					//ctx.font = '14px Arial';
					ctx.fillText(dataset.data[i], model.x, model.y -12);
				} else {
					ctx.save();
					// Translate 0,0 to the point you want the text
					ctx.translate(model.x, model.y);
					// Rotate context by -90 degrees
					ctx.rotate(-90 * Math.PI / 180);
					// Draw text
					ctx.shadowColor = "white";
					ctx.shadowOffsetX = 1; 
					ctx.shadowOffsetY = 1;
					ctx.shadowBlur = 1;
					ctx.fillText(dataset.data[i], 10, -5);
					ctx.restore();
				}
			}
		} // Fin function drawLabelBar

		//Adiciona porcentaje como texto en el gráfico de torta (pie)
		var drawLabelPie = function (obj) {
			var self = obj,
			chartInstance = obj.chart,
			ctx = chartInstance.ctx;

			ctx.font = '18px Arial';
			ctx.textAlign = "center";
			ctx.fillStyle = "#ffffff";

			Chart.helpers.each(self.data.datasets.forEach(function (dataset, datasetIndex) {
				var meta = self.getDatasetMeta(datasetIndex),
					total = 0, //total values to compute fraction
					labelxy = [],
					offset = Math.PI / 2, //start sector from top
					radius,
					centerx,
					centery, 
					lastend = 0; //prev arc's end line: starting with 0

				for (var val in dataset.data) {
						total += dataset.data[val];
				}

				Chart.helpers.each(meta.data.forEach( function (element, index) {
					radius = 0.9 * element._model.outerRadius - element._model.innerRadius;
					centerx = element._model.x;
					centery = element._model.y;
					var thispart = dataset.data[index],
						arcsector = Math.PI * (2 * thispart / total);
					if (element.hasValue() && dataset.data[index] > 0) {
						labelxy.push(lastend + arcsector / 2 + Math.PI + offset);
					}
					else {
						labelxy.push(-1);
					}
					lastend += arcsector;
				}), self) //Chart.helpers.each

				var lradius = radius * 3 / 4;
				for (var idx in labelxy) {
					if (labelxy[idx] === -1) continue;
					var langle = labelxy[idx],
					dx = centerx + lradius * Math.cos(langle),
					dy = centery + lradius * Math.sin(langle),
					val = dataset.data[idx] / total * 100;

					ctx.save();
					ctx.shadowColor = "black";
					ctx.shadowOffsetX = 1; 
					ctx.shadowOffsetY = 1; 
					ctx.shadowBlur = 1;
					ctx.fillText(val.toFixed(2) + ' %', dx, dy);
					ctx.restore();
				}
			}), self); //Chart.helpers.each
		}// Fin function drawLabelPie

	</script>
@endpush
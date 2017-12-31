@extends('layouts.menu')
@section('title', '/ Reportes')

@push('head')
	{!! Html::style('assets/stylesheets/toastr.min.css') !!}
@endpush

@include('widgets.datatable.datatable-export')
@include('datepicker')
@include('chosen')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Reportes
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
		</div>
	</div>
@endsection

@section('section')

	@include('widgets.forms.input', ['type'=>'select', 'column'=>10, 'name'=>'REPO_ID', 'label'=>'Seleccionar reporte', 'data'=>$arrReportes])

	@foreach($arrReportes as $key => $reporte)

		<div class="col-xs-2 hide" style="margin-top: 25px;">
			<button type="button" id="btnViewForm{{$key}}" class="btn btn-link pull-right btnViewForm">
				<span class="fa fa-caret-down iconBtn"></span>
				<span class="textBtn">Filtros</span>
			</button>
		</div>

		{{ Form::open(['url' => 'reportes/'.$key, 'id'=>'form'.$key, 'class'=>'form-horizontal hide']) }}
			<div class="col-xs-12" >

				<div class="fields hide">
				@rinclude('formRep'.$key.'')
				</div>

				@rinclude('formRepBotones')
			</div>
		{{ Form::close() }}

	@endforeach

<div class="col-xs-12">
	<div id="tabsReport" class="hide">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tabTable" data-toggle="tab">Reporte</a></li>
			<li><a href="#tabGraf" data-toggle="tab">Gráfico</a></li>
			<div class="ctrlChart hide">
				<div class="col-xs-4 col-sm-5">
					{{ Form::select('columnChart', [''=>''], null, [
						'id'=>'columnChart',
						'class'=>'form-control selectpicker',
						'data-allow-clear'=>'true',
						'data-placeholder'=>'Seleccione una columna',
					])}}
				</div>
				<div class="col-xs-3 col-sm-2" >
					{{ Form::select('typeChart', ['bar'=>'Barras','pie'=>'Torta'], 'bar', [
						'id'=>'typeChart',
						'class'=>'form-control',
					])}}
				</div>
			</div>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="tabTable">
				<table id="tbQuery" class="table table-striped">
					<thead><tr><th></th></tr></thead>
					<tbody><tr><td></td></tr></tbody>
				</table>        	
			</div>
			<div class="tab-pane" id="tabGraf">
				<canvas class="canvas-chart" id="chart"></canvas>
			</div>
		</div>
	</div>

	<code id="err" class="hide"></code>
</div>

@endsection

@push('scripts')
	{!! Html::script('assets/scripts/chart.js/Chart.min.js') !!}
	{!! Html::script('assets/scripts/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('assets/scripts/chart.js/dashboard.js') !!}
	{!! Html::script('assets/scripts/toastr.min.js') !!}
	<script type="text/javascript">

	$(function () {

		var forms = $('form');
		var tabsReport = $('#tabsReport');
		var tbQuery = $('#tbQuery');
		var divErr = $('#err');
		window.chart['chart'] = null;
		var columnChart = $('#columnChart');
		var typeChart = $('#typeChart');
		var dataJson = null;

		//Selects para formularios
		columnChart.change(function() {
			if($(this).val() != null)
				buildChartFromJson();
		});
		typeChart.change(function() {
			if($(this).val() != null)
				buildChartFromJson();
		});

		//Select para formularios
		$('#REPO_ID').change(function() {
			//título de ventana, afecta nombre de archivo exportado
			$(document).attr("title", 'SGH / Rep '+$(this).find(':selected').text());
			//se ocultan todos los forms
			$('.btnViewForm').parent().addClass('hide'); //div botón show
			forms.addClass('hide'); //form
			//Se muestra el form seleccionado
			var id_selected = $(this).val();
			$('#btnViewForm'+id_selected).parent().removeClass('hide');
			$('#form'+id_selected).removeClass('hide');
			clearTable();
		});

		//Oculta/muestra el formulario para filtrar los resultados.
		$('.btnViewForm').click(function() {
			var btn = $(this);
			var form = btn.parent().next();

			btn.find('.iconBtn')
				.toggleClass('fa-caret-up')
				.toggleClass('fa-caret-down');

			form.find('.fields').toggleClass('hide');
		});


		//Reset de formulario
		$('form').on('reset', function() {
			clearTable();
		});

		//Realiza la solicitud del formulario via ajax y construye el datatable.
		$("form").submit(function(e) {
			e.preventDefault();
			clearTable();
			var thisForm = $(this);
			var url = thisForm.attr('action');

			$.ajax({
				type: 'POST',
				url: url,
				data: thisForm.serialize(),
				dataType: 'json',
			}).done(function( data, textStatus, jqXHR ) {
				if ( data.data.length > 0 ){
					dataJson = data;
					buildDataTable();
					$('a[href="#tabTable"]').tab('show');
				} else
					divErr.html('No se encontraron registros.').removeClass('hide');
			})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				if (jqXHR.statusText === 'Forbidden')
					msgErr = 'Error en la conexión con el servidor. Presione F5.';
				else if (jqXHR.statusText === 'Unauthorized')
					msgErr = 'Sesión ha caducado. Presione F5.';
				else
					msgErr = 'Error: '+jqXHR.responseText;
				divErr.html(msgErr).removeClass('hide');
			})
			.always(function( data, textStatus, jqXHR ) {
				thisForm.find("button[type=submit]").attr('disabled', false);
				$('body').css('cursor', 'auto');
				$('#msgModalLoading').modal('hide');
			});

		});


		//Construye la tabla con el Json recibido
		function buildDataTable(){
			clearTable();

			var columns = [];
			for(var i in dataJson.keys){
				columns.push({title: dataJson.keys[i]});
			}

			columnChart.find('option').remove();
			$.each(columns, function(i, col) {   
				columnChart
					.append($("<option/>", {
						value: i,
						text: col.title
					}));

				if(dataJson.columnChart == col.title)
					columnChart.val(i).trigger('change');
			});

			tabsReport.removeClass('hide');

			tbQuery = $('#tbQuery').DataTable({
				data: dataJson.data,
				columns: columns
			});
		}

		function buildChartFromJson() {
			$('.ctrlChart').removeClass('hide');
			if(window.chart['chart'] != null)
				window.chart['chart'].destroy();

			var arr = jQuery.map( dataJson.data, function( n, i ) {
			  return n[columnChart.val()];
			});

			var labelsChart = $.grep(arr,function(v,k){
								return $.inArray(v,arr) === k;
							});
			var dataChart = [];

			$(labelsChart).each(function (index, value) {
				var nbOcc = 0;
				for (var i = 0; i < arr.length; i++) {
				  if (arr[i] == value) {
					nbOcc++;
				  }
				}
				dataChart.push(nbOcc);
			});

			buildChart(
				'', //title
				labelsChart, //labels
				dataChart, //data
				[], //colores
				'chart', typeChart.val()
			);
		}

		//Destruye la tabla y limpia el log de errores.
		function clearTable(){
			//$('#hide').css( 'display', 'hide' );
			if ( $.fn.dataTable.isDataTable( '#tbQuery' ) ) {
				tbQuery = $('#tbQuery').DataTable().destroy();
			}
			$('#tbQuery').empty();

			tabsReport.addClass('hide');

			$('.ctrlChart').addClass('hide');
			if(window.chart['chart'] != null)
				window.chart['chart'].destroy();

			divErr.html('').addClass('hide');
		}

		//Reajusta el ancho de las columnas al activar #tabTable
		//(Al redimensionar la ventana, thead no se redimensiona).
		$('a[href="#tabTable"]').on( 'shown.bs.tab', function (e) {
			$('.ctrlChart').addClass('hide');
			tbQuery.columns.adjust().draw();
		});
		//Cambia el alto del canvas al activar #tabGraf
		//(al ocultar el tab, el canvas queda con height=0).
		$('a[href="#tabGraf"]').on( 'shown.bs.tab', function (e) {
			$('#chart').css('height', '300px')
			buildChartFromJson();
		});

	});
	</script>
@endpush

@push('head')
	<style type="text/css">
		.row{margin: 0px 0px;}
	</style>
@endpush

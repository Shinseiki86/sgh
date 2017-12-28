@extends('layouts.menu')
@section('title', '/ Reportes')

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

		{{ Form::open(['url' => 'reportes/'.$key, 'id'=>'form'.$key, 'class' => 'form-horizontal hide']) }}
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
	<script type="text/javascript">
	$(function () {
		var forms = $('form');
		var tabsReport = $('#tabsReport');
		var tbQuery = $('#tbQuery');
		var divErr = $('#err');

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
				if ( data.data.length > 0 )
					buildDataTable(data);
				else
					divErr.html('No se encontraron registros.').removeClass('hide');

			})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				//console.log('Err: '+JSON.stringify(jqXHR));
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
		function buildDataTable(dataJson){
			clearTable();

			var columns = [];
			for(var i in dataJson.keys){
				columns.push({title: dataJson.keys[i]});
			}
			
			tabsReport.removeClass('hide');

			tbQuery = $('#tbQuery').DataTable({
				data: dataJson.data,
				columns: columns
			});

			buildChart(
				'',//title
				[1,2,3,4,5], //labels
				[Math.random()*100,Math.random()*100,Math.random()*100,Math.random()*100,Math.random()*100],
				[]//colores
				, 'chart', 'bar');
		}

		//Destruye la tabla y limpia el log de errores.
		function clearTable(){
			//$('#hide').css( 'display', 'hide' );
			if ( $.fn.dataTable.isDataTable( '#tbQuery' ) ) {
				tbQuery = $('#tbQuery').DataTable().destroy();
			}
			$('#tbQuery').empty();
			tabsReport.addClass('hide');
			divErr.html('').addClass('hide');
		}

		//Reajusta el ancho de las columnas al activar #tabTable
		//(Al redimensionar la ventana, thead no se redimensiona).
		$('a[href="#tabTable"]').on( 'shown.bs.tab', function (e) {
			tbQuery.columns.adjust().draw();
		});
		//Cambia el alto del canvas al activar #tabGraf
		//(al ocultar el tab, el canvas queda con height=0).
		$('a[href="#tabGraf"]').on( 'shown.bs.tab', function (e) {
			$('#chart').css('height', '300px')
		});

	});
	</script>
@endpush

@push('head')
	<style type="text/css">
		.row{margin: 0px 0px;}
	</style>
@endpush

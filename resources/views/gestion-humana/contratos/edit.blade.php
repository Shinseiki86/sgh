@extends('layouts.menu')

@section('page_heading', 'Actualizar Contrato')

@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
	{!! Html::style('assets/stylesheets/bootstrap/bootstrap-datetimepicker.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	{!! Html::script('assets/scripts/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('assets/scripts/bootstrap/bootstrap-datetimepicker.min.js') !!}

	<script type="text/javascript">
		$(function () {
			$('.datetimepicker').datetimepicker({
				locale: 'es',
				format: 'YYYY-MM-DD',
				icons: {
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down",
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'glyphicon glyphicon-screenshot',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				},
				tooltips: {
					selectMonth: 'Seleccione Mes',
					prevMonth: 'Mes Anterior',
					nextMonth: 'Mes Siguiente',
					selectYear: 'Seleccione Año',
					prevYear: 'Año Anterior',
					nextYear: 'Año Siguiente',
					selectDecade: 'Seleccione Década',
					prevDecade: 'Década Anterior',
					nextDecade: 'Década Siguiente',
					prevCentury: 'Siglo Anterior',
					nextCentury: 'Siglo Siguiente'
				}
			});
		});
	</script>
@endpush

@section('section')

{{ Form::model($contrato, ['action' => ['GestionHumana\ContratoController@update', $contrato->CONT_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('gestion-humana.contratos.form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'gestion-humana/contratos'])

{{ Form::close() }}
@endsection

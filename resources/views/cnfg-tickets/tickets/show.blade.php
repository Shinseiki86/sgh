@extends('layouts.menu')

@section('head')
{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
<script type="text/javascript">

	var options = {
			/*
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			*/
			no_results_text: 'Ningún resultado coincide.'
		};

		//para volver los select mucho mas amigables en listas grandes de datos
		$(".chosen-select").chosen(options); 

	</script>
	@parent
	@endsection

	@section('section')


	<h1 class="page-header">Ticket No. {{ $ticket->TICK_ID }}:</h1>

	<div class="jumbotron text-center">
		<strong>Datos Generales</strong>
		<p>
			<ul class="list-group">

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Fecha Creación:</strong></div>
						<div class="col-lg-8">{{ $ticket->TICK_FECHASOLICITUD }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Implicado:</strong></div>
						<div class="col-lg-8">{{ nombre_empleado($ticket -> contrato -> PROS_ID) }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Estado:</strong></div>
						<div class="col-lg-8">{{ $ticket -> estadoticket -> ESTI_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Tipo de Incidente:</strong></div>
						<div class="col-lg-8">{{ $ticket -> tipoincidente -> TIIN_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Prioridad:</strong></div>
						<div class="col-lg-8">{{ $ticket -> prioridad -> PRIO_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Categoría:</strong></div>
						<div class="col-lg-8">{{ $ticket -> categoria -> CATE_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Estado Aprobación:</strong></div>
						<div class="col-lg-8">{{ $ticket -> estadoaprobacion -> ESAP_DESCRIPCION }}</div>
					</div>
				</li>

			</ul>
		</p>
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/tickets/') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				
			</div>
		</div>
	</div>

	<div class="jumbotron text-center">
		<strong>Descripción de los Hechos</strong>
		<p>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Descripción de los Hechos:</strong></div>
						<div class="col-lg-8">{{ $ticket -> TICK_DESCRIPCION }}</div>
					</div>
				</li>
			</ul>
		</p>
		
	</div>

	<div class="jumbotron text-center">
		<strong>Evidencia</strong>
		<p>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="row">
						
							{{ HTML::image('storages/' . $ticket -> TICK_ARCHIVO), array('width' => '90%', 'height' => '50%')}}
						
					</div>
				</li>
			</ul>
		</p>
		
	</div>

	


	@endsection

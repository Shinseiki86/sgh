@extends('layouts.menu')

@section('page_heading', 'Actualizar Ticket')

@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		$( document ).ready(function() {

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
	});
	</script>
	
@endpush

@section('section')
	{{ Form::model($ticket, ['action' => ['CnfgTickets\TicketController@update', $ticket->TICK_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('CATE_ID') ? ' has-error' : '' }}">
	<label for="CATE_ID" class="col-md-4 control-label">Categoría</label>
	<div class="col-md-6">
		{{ Form::select('CATE_ID', [null => 'Seleccione una categoría'] + $arrCategorias , old('CATE_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('CATE_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('CATE_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ESTI_ID') ? ' has-error' : '' }}">
	<label for="ESTI_ID" class="col-md-4 control-label">Estado</label>
	<div class="col-md-6">
		{{ Form::select('ESTI_ID', [null => 'Seleccione un estado'] + $arrEstados, old('ESTI_ID') , [
		'class' => 'form-control',
		'required',
		'id' => 'ESTI_ID'
		]) }}

		@if ($errors->has('ESTI_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('ESTI_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('PRIO_ID') ? ' has-error' : '' }}">
	<label for="PRIO_ID" class="col-md-4 control-label">Prioridad</label>
	<div class="col-md-6">
		{{ Form::select('PRIO_ID', [null => 'Seleccione una prioridad'] + $arrPrioridad , old('PRIO_ID'), [
		'class' => 'form-control'
		]) }}

		@if ($errors->has('PRIO_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('PRIO_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_ID') ? ' has-error' : '' }}">
	<label for="CONT_ID" class="col-md-4 control-label">Implicado</label>
	<div class="col-md-6">
		{{ Form::select('CONT_ID', [null => 'Seleccione un empleado'] + $arrContratos , old('CONT_ID'), [
		'class' => 'form-control chosen-select',
		'required'
		]) }}

		@if ($errors->has('CONT_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TIIN_ID') ? ' has-error' : '' }}">
	<label for="TIIN_ID" class="col-md-4 control-label">Tipo de Incidente</label>
	<div class="col-md-6">
		{{ Form::select('TIIN_ID', [null => 'Seleccione un tipo de incidente'] + $arrTiposIncidentes , old('TIIN_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('TIIN_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('TIIN_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TICK_FECHAEVENTO') ? ' has-error' : '' }}">
{{ Form::label('TICK_FECHAEVENTO', 'Fecha del Evento',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::date('TICK_FECHAEVENTO', old('TICK_FECHAEVENTO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('TICK_FECHAEVENTO'))
		<span class="help-block">
			<strong>{{ $errors->first('TICK_FECHAEVENTO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('GRUP_ID') ? ' has-error' : '' }}">
	<label for="GRUP_ID" class="col-md-4 control-label">Grupo de Empleado</label>
	<div class="col-md-6">
		{{ Form::select('GRUP_ID', [null => 'Seleccione un grupo'] + $arrGrupos , old('GRUP_ID'), [
		'class' => 'form-control',
		]) }}

		@if ($errors->has('GRUP_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('GRUP_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TURN_ID') ? ' has-error' : '' }}">
	<label for="TURN_ID" class="col-md-4 control-label">Turno</label>
	<div class="col-md-6">
		{{ Form::select('TURN_ID', [null => 'Seleccione un turno'] + $arrTurnos , old('TURN_ID'), [
		'class' => 'form-control',
		]) }}

		@if ($errors->has('TURN_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('TURN_ID') }}</strong>
		</span>
		@endif
	</div>
</div>


<div class="form-group{{ $errors->has('TICK_DESCRIPCION') ? ' has-error' : '' }}">
	{{ Form::label('TICK_DESCRIPCION', 'Descripción de los Hechos',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::textarea('TICK_DESCRIPCION', old('TICK_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '3000']) }}
		@if ($errors->has('TICK_DESCRIPCION'))
		<span class="help-block">
			<strong>{{ $errors->first('TICK_DESCRIPCION') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ESAP_ID') ? ' has-error' : '' }}">
	<label for="ESAP_ID" class="col-md-4 control-label">Estado de Aprobación</label>
	<div class="col-md-6">
		{{ Form::select('ESAP_ID', [null => 'Seleccione un estado'] + $arrEstadosAprobacion , old('ESAP_ID') , [
		'class' => 'form-control',
		'required',
		'id' => 'ESAP_ID'
		]) }}

		@if ($errors->has('ESAP_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('ESAP_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TICK_OBSERVACIONES') ? ' has-error' : '' }}">
	{{ Form::label('TICK_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::textarea('TICK_OBSERVACIONES', old('TICK_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '3000']) }}
		@if ($errors->has('TICK_OBSERVACIONES'))
		<span class="help-block">
			<strong>{{ $errors->first('TICK_OBSERVACIONES') }}</strong>
		</span>
		@endif
	</div>
</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/tickets/') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
					'class'=>'btn btn-primary',
					'type'=>'submit',
					'data-tooltip'=>'tooltip',
					'title'=>'Guardar',
				]) }}
			</div>
		</div>
	{{ Form::close() }}
@endsection
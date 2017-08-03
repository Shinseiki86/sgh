@extends('layouts.menu')

@section('page_heading', 'Gestión de Tickets')

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

		//variable temporal para almacenar el estado del ticket y posteriormente asignarla a un hidden
		var tempesti = $('#TEMP_ESTADO').val();
		//variable para almacenar el estado del ticket
		var esti_id = $('#ESTI_ID').val(tempesti);

		//variable temporal para almacenar el estado del ticket y posteriormente asignarla a un hidden
		var tempesap = $('#TEMP_ESTADOAPROB').val();
		//variable para almacenar el estado del ticket
		var esap_id = $('#ESAP_ID').val(tempesap);

		//alert(esti_id.val() + ' - ' + esap_id.val());

	});

</script>
@endpush

@section('section')

{{ Form::open(['route' => 'cnfg-tickets.tickets.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}


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

<input type="hidden" name="ESTI_ID" id="ESTI_ID">
<input type="hidden" name="ESAP_ID" id="ESAP_ID">

<div class="form-group{{ $errors->has('TEMP_ESTADO') ? ' has-error' : '' }}">
	<label for="TEMP_ESTADO" class="col-md-4 control-label">Estado</label>
	<div class="col-md-6">
		{{ Form::select('TEMP_ESTADO', [null => 'Seleccione un estado'] + $arrEstados , 1 , [
		'class' => 'form-control',
		'required',
		'disabled',
		'id' => 'TEMP_ESTADO'
		]) }}

		@if ($errors->has('TEMP_ESTADO'))
		<span class="help-block">
			<strong>{{ $errors->first('TEMP_ESTADO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('PRIO_ID') ? ' has-error' : '' }}">
	<label for="PRIO_ID" class="col-md-4 control-label">Prioridad</label>
	<div class="col-md-6">
		{{ Form::select('PRIO_ID', [null => 'Seleccione una prioridad'] + $arrPrioridad , old('PRIO_ID'), [
		'class' => 'form-control',
		'required'
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

<div class="form-group{{ $errors->has('TICK_ARCHIVO') ? ' has-error' : '' }}">
	{{ Form::label('TICK_ARCHIVO', 'Evidencia',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::file('TICK_ARCHIVO', old('TICK_ARCHIVO'), [ 'class' => 'form-control' ]) }}
		@if ($errors->has('TICK_ARCHIVO'))
		<span class="help-block">
			<strong>{{ $errors->first('TICK_ARCHIVO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TEMP_ESTADOAPROB') ? ' has-error' : '' }}">
	<label for="TEMP_ESTADOAPROB" class="col-md-4 control-label">Estado de Aprobación</label>
	<div class="col-md-6">
		{{ Form::select('TEMP_ESTADOAPROB', [null => 'Seleccione un estado'] + $arrEstadosAprobacion , 1 , [
		'class' => 'form-control',
		'required',
		'disabled',
		'id' => 'TEMP_ESTADOAPROB'
		]) }}

		@if ($errors->has('TEMP_ESTADOAPROB'))
		<span class="help-block">
			<strong>{{ $errors->first('TEMP_ESTADOAPROB') }}</strong>
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

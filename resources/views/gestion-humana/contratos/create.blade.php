@extends('layouts.menu')

@section('page_heading', 'Nuevo Contrato')

@section('head')
{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
<script type="text/javascript">

	$( document ).ready(function() {


		//opciones del choosen select
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
@parent
@endsection

@section('section')

{{ Form::open(['route' => 'gestion-humana.contratos.store', 'class' => 'form-horizontal']) }}

<div class="form-group{{ $errors->has('PROS_ID') ? ' has-error' : '' }}">
	<label for="PROS_ID" class="col-md-2 control-label">Prospecto</label>
	<div class="col-md-6">
		{{ Form::select('PROS_ID', [null => 'Seleccione un prospecto'] + $arrProspectos , old('PROS_ID'), [
		'class' => 'form-control chosen-select',
		'id' => 'PROS_ID',
		'required'
		]) }}

		@if ($errors->has('PROS_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('PROS_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
	<label for="EMPL_ID" class="col-md-2 control-label">Empleador</label>
	<div class="col-md-6">
		{{ Form::select('EMPL_ID', [null => 'Seleccione un empleador'] + $arrEmpleadores , old('EMPL_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('EMPL_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TIEM_ID') ? ' has-error' : '' }}">
	<label for="TIEM_ID" class="col-md-2 control-label">Tipo de empleador</label>
	<div class="col-md-6">
		{{ Form::select('TIEM_ID', [null => 'Seleccione un empleador'] + $arrTiposempleadores , old('TIEM_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('TIEM_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('TIEM_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CECO_ID') ? ' has-error' : '' }}">
	<label for="CECO_ID" class="col-md-2 control-label">Centro de costo</label>
	<div class="col-md-6">
		{{ Form::select('CECO_ID', [null => 'Seleccione un empleador'] + $arrCentroscostos , old('CECO_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('CECO_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('CECO_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ESCO_ID') ? ' has-error' : '' }}">
	<label for="ESCO_ID" class="col-md-2 control-label">Estado de contrato</label>
	<div class="col-md-6">
		{{ Form::select('ESCO_ID', [null => 'Seleccione un estado de contrato'] + $arrEstadoscontrato , old('ESCO_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('ESCO_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('ESCO_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TICO_ID') ? ' has-error' : '' }}">
	<label for="TICO_ID" class="col-md-2 control-label">Tipo de contrato</label>
	<div class="col-md-6">
		{{ Form::select('TICO_ID', [null => 'Seleccione un tipo de contrato'] + $arrTiposcontrato , old('TICO_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('TICO_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('TICO_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CLCO_ID') ? ' has-error' : '' }}">
	<label for="CLCO_ID" class="col-md-2 control-label">Clase de contrato</label>
	<div class="col-md-6">
		{{ Form::select('CLCO_ID', [null => 'Seleccione una clase de contrato'] + $arrClasescontrato , old('CLCO_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('CLCO_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('CLCO_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('RIES_ID') ? ' has-error' : '' }}">
	<label for="RIES_ID" class="col-md-2 control-label">Riesgo ARL</label>
	<div class="col-md-6">
		{{ Form::select('RIES_ID', [null => 'Seleccione un riesgo'] + $arrRiesgos , old('RIES_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('RIES_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('RIES_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CARG_ID') ? ' has-error' : '' }}">
	<label for="CARG_ID" class="col-md-2 control-label">Cargo</label>
	<div class="col-md-6">
		{{ Form::select('CARG_ID', [null => 'Seleccione un cargo'] + $arrCargos , old('CARG_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('CARG_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('CARG_ID') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_FECHAINGRESO') ? ' has-error' : '' }}">
	{{ Form::label('CONT_FECHAINGRESO', 'Fecha de Ingreso',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::date('CONT_FECHAINGRESO', old('CONT_FECHAINGRESO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('CONT_FECHAINGRESO'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_FECHAINGRESO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_SALARIO') ? ' has-error' : '' }}">
	{{ Form::label('CONT_SALARIO', 'Salario',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('CONT_SALARIO', old('CONT_SALARIO'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
		@if ($errors->has('CONT_SALARIO'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_SALARIO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_VARIABLE') ? ' has-error' : '' }}">
	{{ Form::label('CONT_VARIABLE', 'Variable',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('CONT_VARIABLE', old('CONT_VARIABLE'), [ 'class' => 'form-control', 'maxlength' => '15', 'number' ]) }}
		@if ($errors->has('CONT_VARIABLE'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_VARIABLE') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_RODAJE') ? ' has-error' : '' }}">
	{{ Form::label('CONT_RODAJE', 'Rodaje',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('CONT_RODAJE', old('CONT_RODAJE'), [ 'class' => 'form-control', 'maxlength' => '15', 'number' ]) }}
		@if ($errors->has('CONT_RODAJE'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_RODAJE') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('GRUP_ID') ? ' has-error' : '' }}">
	<label for="GRUP_ID" class="col-md-2 control-label">Grupo de Empleado</label>
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
	<label for="TURN_ID" class="col-md-2 control-label">Turno</label>
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

<div class="form-group{{ $errors->has('JEFE_ID') ? ' has-error' : '' }}">
	<label for="JEFE_ID" class="col-md-2 control-label">Jefe Inmediato</label>
	<div class="col-md-6">
		{{ Form::select('JEFE_ID', [null => 'Seleccione un empleado'] + $arrJefes , old('JEFE_ID'), [
		'class' => 'form-control',
		'required'
		]) }}

		@if ($errors->has('JEFE_ID'))
		<span class="help-block">
			<strong>{{ $errors->first('JEFE_ID') }}</strong>
		</span>
		@endif
	</div>
</div>


<div class="form-group{{ $errors->has('CONT_OBSERVACIONES') ? ' has-error' : '' }}">
	{{ Form::label('CONT_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::textarea('CONT_OBSERVACIONES', old('CONT_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
		@if ($errors->has('CONT_OBSERVACIONES'))
		<span class="help-block">
			<strong>{{ $errors->first('CONT_OBSERVACIONES') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CONT_CASOMEDICO') ? ' has-error' : '' }}">
	{{ Form::label('CONT_CASOMEDICO', '¿R.M?',  [ 'class' => 'col-md-2 control-label' ]) }}
	<div class="col-md-6">
		{{	Form::select('CONT_CASOMEDICO', ['NO' => 'NO', 'SI' => 'SI'], null, [ 'class' => 'form-control', ]) }}
	</div>
</div>

<!-- Botones -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-4 text-right">
		<a class="btn btn-warning" role="button" href="{{ URL::to('gestion-humana/contratos/') }}" data-tooltip="tooltip" title="Regresar">
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

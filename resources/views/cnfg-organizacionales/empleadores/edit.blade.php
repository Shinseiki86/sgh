@extends('layouts.menu')

@section('page_heading', 'Actualizar Empleador')

@section('head')
{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
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

	});

</script>
@parent
@endsection

@section('section')

	{{ Form::model($empleador, ['action' => ['CnfgOrganizacionales\EmpleadorController@update', $empleador->EMPL_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('EMPL_RAZONSOCIAL') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_RAZONSOCIAL', 'Razón Social',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_RAZONSOCIAL', old('EMPL_RAZONSOCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('EMPL_RAZONSOCIAL'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_RAZONSOCIAL') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_NIT') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_NIT', 'NIT',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_NIT', old('EMPL_NIT'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
		@if ($errors->has('EMPL_NIT'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_NIT') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_DIRECCION') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_DIRECCION', 'Dirección',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_DIRECCION', old('EMPL_DIRECCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('EMPL_DIRECCION'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_DIRECCION') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CIUD_DOMICILIO') ? ' has-error' : '' }}">
	<label for="CIUD_DOMICILIO" class="col-md-4 control-label">Ciudad</label>
	<div class="col-md-6">
		{{ Form::select('CIUD_DOMICILIO', [null => 'Seleccione una ciudad'] + $arrCiudades , old('CIUD_DOMICILIO'), [
		'class' => 'form-control chosen-select',
		'required'
		]) }}

		@if ($errors->has('CIUD_DOMICILIO'))
		<span class="help-block">
			<strong>{{ $errors->first('CIUD_DOMICILIO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Nombre Comercial',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_NOMBREREPRESENTANTE') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_NOMBREREPRESENTANTE', 'Nombre Representante Legal',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_NOMBREREPRESENTANTE', old('EMPL_NOMBREREPRESENTANTE'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('EMPL_NOMBREREPRESENTANTE'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_NOMBREREPRESENTANTE') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_CEDULAREPRESENTANTE') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_CEDULAREPRESENTANTE', 'Cedula de Representante',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_CEDULAREPRESENTANTE', old('EMPL_CEDULAREPRESENTANTE'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
		@if ($errors->has('EMPL_CEDULAREPRESENTANTE'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_CEDULAREPRESENTANTE') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('CIUD_CEDULA') ? ' has-error' : '' }}">
	<label for="CIUD_CEDULA" class="col-md-4 control-label">Ciudad de Expedición</label>
	<div class="col-md-6">
		{{ Form::select('CIUD_CEDULA', [null => 'Seleccione una ciudad'] + $arrCiudades , old('CIUD_CEDULA'), [
		'class' => 'form-control chosen-select',
		'required'
		]) }}

		@if ($errors->has('CIUD_CEDULA'))
		<span class="help-block">
			<strong>{{ $errors->first('CIUD_CEDULA') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_COREO') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_COREO', 'Email',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::text('EMPL_COREO', old('EMPL_COREO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
		@if ($errors->has('EMPL_COREO'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_COREO') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EMPL_OBSERVACIONES') ? ' has-error' : '' }}">
	{{ Form::label('EMPL_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		{{ Form::textarea('EMPL_OBSERVACIONES', old('EMPL_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
		@if ($errors->has('EMPL_OBSERVACIONES'))
		<span class="help-block">
			<strong>{{ $errors->first('EMPL_OBSERVACIONES') }}</strong>
		</span>
		@endif
	</div>
</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/empleadores/') }}" data-tooltip="tooltip" title="Regresar">
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
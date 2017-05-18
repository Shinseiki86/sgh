@extends('layouts.admin')

@section('page_heading', 'Actualizar Empleador '.$empleador->EMPL_ID)

@section('section')

	{{ Form::model($empleador, ['action' => ['EmpleadoresController@update', $empleador->EMPL_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

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
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/empleadores/') }}" data-tooltip="tooltip" title="Regresar">
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
@extends('layouts.menu')

@section('page_heading', 'Actualizar Empresa Temporal '.$temporal->TEMP_ID)

@section('section')

	{{ Form::model($temporal, ['action' => ['TemporalController@update', $temporal->TEMP_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('TEMP_RAZONSOCIAL') ? ' has-error' : '' }}">
			{{ Form::label('TEMP_RAZONSOCIAL', 'Razón Social',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TEMP_RAZONSOCIAL', old('TEMP_RAZONSOCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TEMP_RAZONSOCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('TEMP_RAZONSOCIAL') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TEMP_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
			{{ Form::label('TEMP_NOMBRECOMERCIAL', 'Nombre Comercial',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TEMP_NOMBRECOMERCIAL', old('TEMP_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TEMP_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('TEMP_NOMBRECOMERCIAL') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TEMP_DIRECCION') ? ' has-error' : '' }}">
			{{ Form::label('TEMP_DIRECCION', 'Dirección',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TEMP_DIRECCION', old('TEMP_DIRECCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TEMP_DIRECCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TEMP_DIRECCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TEMP_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TEMP_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TEMP_OBSERVACIONES', old('TEMP_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TEMP_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TEMP_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/temporales/') }}" data-tooltip="tooltip" title="Regresar">
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
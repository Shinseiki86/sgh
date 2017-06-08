@extends('layouts.admin')

@section('page_heading', 'Nuevo Prospecto')

@section('section')

{{ Form::model($prospecto, ['action' => ['ProspectoController@update', $prospecto->PROS_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

<div class="col-sm-17">
	<div class="row" well>
		<div class="col-lg-6">

			<div class="form-group{{ $errors->has('PROS_CEDULA') ? ' has-error' : '' }}">
				{{ Form::label('PROS_CEDULA', 'Cedula',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_CEDULA', old('PROS_CEDULA'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
					@if ($errors->has('PROS_CEDULA'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_CEDULA') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_FECHAEXPEDICION') ? ' has-error' : '' }}">
				{{ Form::label('PROS_FECHAEXPEDICION', 'Fecha Expedición',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::date('PROS_FECHAEXPEDICION', old('PROS_FECHAEXPEDICION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_FECHAEXPEDICION'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_FECHAEXPEDICION') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_PRIMERNOMBRE') ? ' has-error' : '' }}">
				{{ Form::label('PROS_PRIMERNOMBRE', 'Primer Nombre',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_PRIMERNOMBRE', old('PROS_PRIMERNOMBRE'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_PRIMERNOMBRE'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_PRIMERNOMBRE') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_SEGUNDONOMBRE') ? ' has-error' : '' }}">
				{{ Form::label('PROS_SEGUNDONOMBRE', 'Segundo Nombre',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_SEGUNDONOMBRE', old('PROS_SEGUNDONOMBRE'), [ 'class' => 'form-control', 'maxlength' => '100']) }}
					@if ($errors->has('PROS_SEGUNDONOMBRE'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_SEGUNDONOMBRE') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_PRIMERAPELLIDO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_PRIMERAPELLIDO', 'Primer Apellido',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_PRIMERAPELLIDO', old('PROS_PRIMERAPELLIDO'), [ 'class' => 'form-control', 'maxlength' => '100']) }}
					@if ($errors->has('PROS_PRIMERAPELLIDO'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_PRIMERAPELLIDO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_SEGUNDOAPELLIDO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_SEGUNDOAPELLIDO', 'Segundo Apellido',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_SEGUNDOAPELLIDO', old('PROS_SEGUNDOAPELLIDO'), [ 'class' => 'form-control', 'maxlength' => '100']) }}
					@if ($errors->has('PROS_SEGUNDOAPELLIDO'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_SEGUNDOAPELLIDO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_SEXO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_SEXO', 'Sexo',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{	Form::select('PROS_SEXO', ['M' => 'Masculino', 'F' => 'Femenino'], null, [ 'class' => 'form-control chosen-select' ]) }}
				</div>
			</div>


			<div class="form-group{{ $errors->has('PROS_DIRECCION') ? ' has-error' : '' }}">
				{{ Form::label('PROS_DIRECCION', 'Direccion',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_DIRECCION', old('PROS_DIRECCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_DIRECCION'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_DIRECCION') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_TELEFONO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_TELEFONO', 'Telefono',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_TELEFONO', old('PROS_TELEFONO'), [ 'class' => 'form-control', 'maxlength' => '100' ]) }}
					@if ($errors->has('PROS_TELEFONO'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_TELEFONO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_CELULAR') ? ' has-error' : '' }}">
				{{ Form::label('PROS_CELULAR', 'Celular',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_CELULAR', old('PROS_CELULAR'), [ 'class' => 'form-control', 'maxlength' => '100' ]) }}
					@if ($errors->has('PROS_CELULAR'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_CELULAR') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_COREO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_COREO', 'Correo',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::email('PROS_COREO', old('PROS_COREO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_COREO'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_COREO') }}</strong>
					</span>
					@endif
				</div>
			</div>

		</div>

		<div class="col-lg-6">
		</div>

	</div>

</div>

<!-- Botones -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-4 text-right">
		<a class="btn btn-warning" role="button" href="{{ URL::to('admin/prospectos/') }}" data-tooltip="tooltip" title="Regresar">
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

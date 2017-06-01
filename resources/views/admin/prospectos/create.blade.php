@extends('layouts.admin')

@section('page_heading', 'Nuevo Prospecto')

@section('section')

{{ Form::open(['route' => 'admin.empleadores.store', 'class' => 'form-horizontal']) }}

<div class="col-sm-17">
	<div class="row" well>
		<div class="col-lg-6">

			<div class="form-group{{ $errors->has('PROS_CEDULA') ? ' has-error' : '' }}">
				{{ Form::label('PROS_CEDULA', 'Cedula',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_CEDULA', old('PROS_CEDULA'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_CEDULA'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_CEDULA') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Primer Nombre',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Primer Apellido',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('PROS_SEXO') ? ' has-error' : '' }}">
				{{ Form::label('PROS_SEXO', 'Sexo',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					<select name="PROS_SEXO" id="PROS_SEXO" class="form-control chosen-select">
						<option value="">Seleccione..</option>
						<option value="M">Masculino</option>
						<option value="F">Femenino</option>
					</select>
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Telefono',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Correo',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>



		</div>

		<div class="col-lg-6">

			<div class="form-group{{ $errors->has('PROS_CEDULA') ? ' has-error' : '' }}">
				{{ Form::label('PROS_CEDULA', 'Fecha Exp.',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('PROS_CEDULA', old('PROS_CEDULA'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('PROS_CEDULA'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_CEDULA') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Segun. Nombre',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Segundo Apellido',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Direccion',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('EMPL_NOMBRECOMERCIAL') ? ' has-error' : '' }}">
				{{ Form::label('EMPL_NOMBRECOMERCIAL', 'Celular',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-9">
					{{ Form::text('EMPL_NOMBRECOMERCIAL', old('EMPL_NOMBRECOMERCIAL'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('EMPL_NOMBRECOMERCIAL'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_NOMBRECOMERCIAL') }}</strong>
					</span>
					@endif
				</div>
			</div>


		</div>

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

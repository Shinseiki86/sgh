@extends('layouts.menu')

@section('page_heading', 'Nuevo usuario')

@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		var options = {
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			no_results_text: 'Ningún resultado coincide.'
		};
		$('.chosen-select').chosen(options); 
	</script>
@endpush

@section('section')
	{{ Form::open(['url' => 'register', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name" class="col-md-4 control-label">Nombre</label>

			<div class="col-md-6">
				<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<label for="username" class="col-md-4 control-label">Usuario</label>

			<div class="col-md-6">
				<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

				@if ($errors->has('username'))
					<span class="help-block">
						<strong>{{ $errors->first('username') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
			<label for="cedula" class="col-md-4 control-label">Cédula</label>

			<div class="col-md-6">
				{{ Form::text('cedula', old('cedula'), [ 'class' => 'form-control', 'pattern'=>'\d*', 'maxlength'=>'15', 'title'=>'Número de identificación (0-9), máximo 15 dígitos.', 'required' ]) }}

				@if ($errors->has('cedula'))
					<span class="help-block">
						<strong>{{ $errors->first('cedula') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="col-md-4 control-label">E-Mail</label>

			<div class="col-md-6">
				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('roles_ids') ? ' has-error' : '' }}">
			{{ Form::label('roles_ids', 'Roles', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::select('roles_ids', $arrRoles , old('roles_ids'), [
					'id'=>'roles_ids',
					'name'=>'roles_ids[]',
					'data-placeholder'=>'Seleccione los roles...',
					'class' => 'form-control chosen-select',
					'multiple',
				]) }}
				@if ($errors->has('roles_ids'))
					<span class="help-block">
						<strong>{{ $errors->first('roles_ids') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password" class="col-md-4 control-label">Contraseña</label>

			<div class="col-md-6">
				<input id="password" type="password" class="form-control" name="password" required>

				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

			<div class="col-md-6">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

				@if ($errors->has('password_confirmation'))
					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('auth/usuarios') }}" data-tooltip="tooltip" title="Regresar">
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

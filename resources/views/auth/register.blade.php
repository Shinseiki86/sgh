@extends('layouts.menu')
@section('page_heading', 'Nuevo usuario')
@include('chosen')

@section('section')
{{ Form::open(['url' => 'register', 'class' => 'form-horizontal']) }}

	<div class='col-md-8 col-md-offset-2'>

		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'username', 'label'=>'Usuario', 'options'=>['maxlength' => '30'] ])

		@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'name', 'label'=>'Nombre', 'options'=>['maxlength' => '100'] ])

		@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'cedula', 'label'=>'Cédula', 'options'=>['size' => '999999999999999'] ])

		@include('widgets.forms.input', ['type'=>'email', 'column'=>8, 'name'=>'email', 'label'=>'Correo electrónico'])

		@include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true,])

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

	</div>

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'auth/usuarios'])

{{ Form::close() }}
@endsection

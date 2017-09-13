@extends('layouts.menu')
@section('page_heading', 'Actualizar usuario')
@include('chosen')

@section('section')			
{{ Form::model($usuario, ['action' => ['Auth\AuthController@update', $usuario->USER_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<div class='col-md-8 col-md-offset-2'>

		@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'username', 'label'=>'Usuario', 'options'=>['maxlength' => '30', 'disabled'] ])

		@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'name', 'label'=>'Nombre', 'options'=>['maxlength' => '100'] ])

		@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'cedula', 'label'=>'Cédula', 'options'=>['size' => '999999999999999'] ])

		@include('widgets.forms.input', ['type'=>'email', 'column'=>8, 'name'=>'email', 'label'=>'Correo electrónico'])

		@include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true,])

	</div>

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'auth/usuarios'])

{{ Form::close() }}
@endsection

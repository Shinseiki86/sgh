@extends('layouts.menu')
@section('page_heading', 'Nuevo usuario')
@include('chosen')

@section('section')
<div class='col-md-8 col-md-offset-2'>
{{ Form::open(['url' => 'register', 'class' => 'form-horizontal']) }}


	@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'username', 'label'=>'Usuario', 'options'=>['maxlength' => '30'] ])

	@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'name', 'label'=>'Nombre', 'options'=>['maxlength' => '100'] ])

	@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'cedula', 'label'=>'Cédula', 'options'=>['size' => '999999999999999'] ])

	@include('widgets.forms.input', ['type'=>'email', 'column'=>8, 'name'=>'email', 'label'=>'Correo electrónico'])

	@include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true,])

	@include('widgets.forms.input', ['type'=>'password', 'name'=>'password', 'label'=>'Contraseña' ])
	@include('widgets.forms.input', ['type'=>'password', 'name'=>'password_confirmation', 'label'=>'Confirmar Contraseña' ])


	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'auth/usuarios'])

{{ Form::close() }}
</div>
@endsection

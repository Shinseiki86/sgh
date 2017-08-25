@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($tipoEntidad, ['route' => ['tipoEntidads.update', $tipoEntidad ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('tipoEntidads.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'tipoEntidads'])

	{{ Form::close() }}
@endsection
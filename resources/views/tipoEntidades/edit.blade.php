@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($tipoEntidad, ['route' => ['tipoentidades.update', $tipoEntidad ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('tipoentidades.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'tipoentidades'])

	{{ Form::close() }}
@endsection
@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($entidad, ['route' => ['entidades.update', $entidad ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('entidades.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'entidades'])

	{{ Form::close() }}
@endsection
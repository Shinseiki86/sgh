@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($entidad, ['route' => ['entidads.update', $entidad ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('entidads.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'entidads'])

	{{ Form::close() }}
@endsection
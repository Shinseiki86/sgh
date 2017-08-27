@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($diagnostico, ['route' => ['diagnosticos.update', $diagnostico ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('diagnosticos.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'diagnosticos'])

	{{ Form::close() }}
@endsection
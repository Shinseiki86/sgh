@extends('layouts.menu')

@section('page_heading', 'Actualizar Ausentismo')

@section('section')
	{{ Form::model($ausentismo, ['route' => ['ausentismos.update', $ausentismo ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('ausentismos.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'ausentismos'])

	{{ Form::close() }}
@endsection
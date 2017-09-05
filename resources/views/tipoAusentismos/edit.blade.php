@extends('layouts.menu')

@section('page_heading', 'Actualizar Tipo de Ausentismo')

@section('section')
	{{ Form::model($tipoAusentismo, ['route' => ['tipoausentismos.update', $tipoAusentismo ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('tipoausentismos.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'tipoausentismos'])

	{{ Form::close() }}
@endsection
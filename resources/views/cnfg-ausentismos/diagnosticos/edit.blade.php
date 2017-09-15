@extends('layouts.menu')

@section('page_heading', 'Actualizar ')

@section('section')
	{{ Form::model($diagnostico, ['route' => ['diagnosticos.update', $diagnostico ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/diagnosticos'])

	{{ Form::close() }}
@endsection
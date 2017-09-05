@extends('layouts.menu')

@section('page_heading', 'Actualizar Concepto Ausencia')

@section('section')
	{{ Form::model($conceptoausencia, ['route' => ['conceptoausencias.update', $conceptoausencia ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('conceptoausencias.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'conceptoausencias'])

	{{ Form::close() }}
@endsection
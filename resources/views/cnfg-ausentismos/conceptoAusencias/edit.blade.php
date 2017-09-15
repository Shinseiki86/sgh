@extends('layouts.menu')

@section('page_heading', 'Actualizar Concepto Ausencia')

@section('section')
	{{ Form::model($conceptoausencia, ['route' => ['conceptoausencias.update', $conceptoausencia ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/conceptoausencias'])

	{{ Form::close() }}
@endsection
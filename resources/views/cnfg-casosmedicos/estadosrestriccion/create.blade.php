@extends('layouts.menu')
@section('page_heading', 'Nuevo Estado de Restricción')

@section('section')
{{ Form::open(['route' => 'cnfg-casosmedicos.estadosrestriccion.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/estadosrestriccion'])

{{ Form::close() }}
@endsection

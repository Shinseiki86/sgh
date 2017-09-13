@extends('layouts.menu')
@section('page_heading', 'Nuevo Empleador')

@section('section')
{{ Form::open(['route' => 'empleadores.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/empleadores'])

{{ Form::close() }}
@endsection

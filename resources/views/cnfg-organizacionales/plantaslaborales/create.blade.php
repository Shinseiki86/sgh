@extends('layouts.menu')
@section('page_heading', 'Nueva Planta de Personal')

@section('section')
{{ Form::open(['route' => 'plantaslaborales.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/plantaslaborales'])

{{ Form::close() }}
@endsection
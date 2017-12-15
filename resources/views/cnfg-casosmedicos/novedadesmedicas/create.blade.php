@extends('layouts.menu')
@section('page_heading', 'Nueva Novedad de Seguimiento')

@section('section')
{{ Form::open(['route' => 'cnfg-casosmedicos.novedadesmedicas.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/novedadesmedicas'])

{{ Form::close() }}
@endsection

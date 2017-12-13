@extends('layouts.menu')
@section('page_heading', 'Nuevo Movimiento de Planta')

@section('section')
{{ Form::open(['route' => 'cnfg-organizacionales.movimientosplantas.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/movimientosplantas'])

{{ Form::close() }}
@endsection
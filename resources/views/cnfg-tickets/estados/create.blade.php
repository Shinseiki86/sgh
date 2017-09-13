@extends('layouts.menu')
@section('page_heading', 'Nuevo Estado de Ticket')

@section('section')
{{ Form::open(['route' => 'estadostickets.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-tickets/estadostickets'])

{{ Form::close() }}
@endsection

@extends('layouts.menu')
@section('page_heading', 'Nuevo Caso Médico')

@section('section')
{{ Form::open(['route' => 'cnfg-casosmedicos.casosmedicos.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/casosmedicos'])

{{ Form::close() }}
@endsection

@extends('layouts.menu')
@section('page_heading', 'Nuevo Diágnostico General')

@section('section')
{{ Form::open(['route' => 'cnfg-casosmedicos.diagnosticosgenerales.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/diagnosticosgenerales'])

{{ Form::close() }}
@endsection

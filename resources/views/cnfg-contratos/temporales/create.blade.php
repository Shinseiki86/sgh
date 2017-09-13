@extends('layouts.menu')
@section('page_heading', 'Nueva Empresa Temporal')

@section('section')
{{ Form::open(['route' => 'temporales.store', 'class' => 'form-horizontal']) }}
	
	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-contratos/temporales'])

{{ Form::close() }}
@endsection

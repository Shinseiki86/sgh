@extends('layouts.menu')
@section('page_heading', 'Nuevo Proceso')

@section('section')
{{ Form::open(['route' => 'cnfg-organizacionales.procesos.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/plantaslaborales'])

{{ Form::close() }}
@endsection

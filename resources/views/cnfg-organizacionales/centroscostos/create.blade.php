@extends('layouts.menu')
@section('page_heading', 'Nuevo Centro de costos')

@section('section')
{{ Form::open(['route' => 'centroscostos.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/centroscostos'])

{{ Form::close() }}
@endsection

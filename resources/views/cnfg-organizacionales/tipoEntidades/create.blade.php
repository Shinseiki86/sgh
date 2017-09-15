@extends('layouts.menu')

@section('page_heading', 'Agregar Tipo Entidad')

@section('section')
{{ Form::open(['route' => 'tipoentidades.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('fields')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/tipoentidades'])

{{ Form::close() }}
@endsection


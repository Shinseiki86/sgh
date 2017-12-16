@extends('layouts.menu')
@section('page_heading', 'Nuevo Atributo Para Empleado')

@section('section')
{{ Form::open(['route' => 'cnfg-contratos.empleadoatributo.store', 'class' => 'form-horizontal']) }}
	
	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-contratos/atributos'])

{{ Form::close() }}
@endsection

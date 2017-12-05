@extends('layouts.menu')
@section('page_heading', 'Nuevo Negocio')

@section('section')
{{ Form::open(['route' => 'cnfg-contratos.negocios.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

{{ Form::close() }}
@endsection

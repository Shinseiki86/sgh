@extends('layouts.menu')
@section('page_heading', 'Nuevo Cargo')

@section('section')
{{ Form::open(['route' => 'cnfg-contratos.cargos.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-contratos/cargos'])

{{ Form::close() }}
@endsection

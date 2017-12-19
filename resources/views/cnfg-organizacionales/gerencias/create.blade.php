@extends('layouts.menu')
@section('page_heading', 'Nueva Gerencia')

@section('section')
{{ Form::open(['route' => 'cnfg-organizacionales.gerencias.store', 'class' => 'form-horizontal']) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

{{ Form::close() }}
@endsection

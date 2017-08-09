@extends('layouts.menu')

@section('page_heading', 'Nuevo Departamento')

@section('section')
	{{ Form::open(['route' => 'cnfg-geograficos.departamentos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('cnfg-geograficos.departamentos.form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/departamentos'])

	{{ Form::close() }}
@endsection

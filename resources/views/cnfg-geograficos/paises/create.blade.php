@extends('layouts.menu')

@section('page_heading', 'Nuevo País')

@section('section')
	{{ Form::open(['route' => 'cnfg-geograficos.paises.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('cnfg-geograficos.paises.form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/paises'])

	{{ Form::close() }}
@endsection

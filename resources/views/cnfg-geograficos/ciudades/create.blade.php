@extends('layouts.menu')

@section('page_heading', 'Nueva Ciudad')

@section('section')
	{{ Form::open(['route' => 'cnfg-geograficos.ciudades.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('cnfg-geograficos.ciudades.form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/ciudades'])

	{{ Form::close() }}
@endsection

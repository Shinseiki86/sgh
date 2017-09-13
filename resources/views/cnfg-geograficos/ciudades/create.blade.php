@extends('layouts.menu')

@section('page_heading', 'Nueva Ciudad')

@section('section')
	{{ Form::open(['route' => 'ciudades.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@rinclude('form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/ciudades'])

	{{ Form::close() }}
@endsection

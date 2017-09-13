@extends('layouts.menu')

@section('page_heading', 'Nuevo País')

@section('section')
	{{ Form::open(['route' => 'paises.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@rinclude('form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/paises'])

	{{ Form::close() }}
@endsection

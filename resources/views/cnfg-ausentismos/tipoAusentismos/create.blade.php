@extends('layouts.menu')

@section('page_heading', 'Nuevo Tipo de Ausentismo ')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'tipoausentismos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/tipoausentismos'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


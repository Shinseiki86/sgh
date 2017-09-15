@extends('layouts.menu')

@section('page_heading', 'Nuevo Ausentismo ')

@section('section')
	{{ Form::open(['route' => 'ausentismos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/ausentismos'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


@extends('layouts.menu')

@section('page_heading', 'Nueva ')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'diagnosticos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/diagnosticos'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


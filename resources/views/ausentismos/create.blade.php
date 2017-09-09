@extends('layouts.menu')

@section('page_heading', 'Nuevo Ausentismo ')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'ausentismos.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('ausentismos.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'ausentismos'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


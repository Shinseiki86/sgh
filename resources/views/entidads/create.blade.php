@extends('layouts.menu')

@section('page_heading', 'Nueva ')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'entidads.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('entidads.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'entidads'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


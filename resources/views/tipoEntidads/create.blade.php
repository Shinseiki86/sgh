@extends('layouts.menu')

@section('page_heading', 'Nueva ')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'tipoEntidads.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('tipoEntidads.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'tipoEntidads'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


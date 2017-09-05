@extends('layouts.menu')

@section('page_heading', 'Nuevo Concepto Ausencia')

@section('section')
{{-- <div class="col-md-6 col-md-offset-4"> --}}
	{{ Form::open(['route' => 'conceptoausencias.store', 'class' => 'form-horizontal']) }}

		<!-- Elementos del formulario -->
		@include('conceptoausencias.fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'conceptoausencias'])

	{{ Form::close() }}
{{-- </div> --}}
@endsection


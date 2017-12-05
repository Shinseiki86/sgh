@extends('layouts.menu')
@section('page_heading', 'Actualizar Negocio')

@section('section')
{{ Form::model($negocio, ['action' => ['CnfgContratos\NegocioController@update', $negocio->NEGO_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@rinclude('form-inputs')

{{ Form::close() }}
@endsection
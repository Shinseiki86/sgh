@extends('layouts.menu')
@section('page_heading', 'Actualizar Gerencia')

@section('section')
{{ Form::model($gerencia, ['action' => ['CnfgOrganizacionales\GerenciaController@update', $gerencia->GERE_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

{{ Form::close() }}
@endsection
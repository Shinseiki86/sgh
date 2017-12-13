@extends('layouts.menu')
@section('page_heading', 'Actualizar Diágnostico General')

@section('section')
{{ Form::model($diagnosticogeneral, ['action' => ['CnfgCasosMedicos\DiagnosticoGeneralController@update', $diagnosticogeneral->DIGE_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/diagnosticosgenerales'])

{{ Form::close() }}
@endsection
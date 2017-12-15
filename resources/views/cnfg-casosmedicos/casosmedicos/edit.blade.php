@extends('layouts.menu')
@section('page_heading', 'Actualizar Caso Médico')

@section('section')
{{ Form::model($casomedico, ['action' => ['CnfgCasosMedicos\CasoMedicoController@update', $casomedico->CAME_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/casosmedicos'])

{{ Form::close() }}
@endsection
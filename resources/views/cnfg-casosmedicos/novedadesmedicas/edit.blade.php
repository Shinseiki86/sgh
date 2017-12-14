@extends('layouts.menu')
@section('page_heading', 'Actualizar Novedad de Seguimiento')

@section('section')
{{ Form::model($novedadmedica, ['action' => ['CnfgCasosMedicos\NovedadMedicaController@update', $novedadmedica->NOME_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/novedadesmedicas'])

{{ Form::close() }}
@endsection
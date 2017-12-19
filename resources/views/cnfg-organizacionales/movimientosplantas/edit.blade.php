@extends('layouts.menu')
@section('page_heading', 'Actualizar Movimiento de Planta')

@section('section')
{{ Form::model($movimientoplanta, ['action' => ['CnfgOrganizacionales\MovimientoPlantaController@update', $movimientoplanta->PALA_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/movimientosplantas'])

{{ Form::close() }}
@endsection
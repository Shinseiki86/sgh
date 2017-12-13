@extends('layouts.menu')
@section('page_heading', 'Actualizar Estado de Restricción')

@section('section')
{{ Form::model($estadorestriccion, ['action' => ['CnfgCasosMedicos\EstadoRestriccionController@update', $estadorestriccion->ESRE_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-casosmedicos/estadosrestriccion'])

{{ Form::close() }}
@endsection
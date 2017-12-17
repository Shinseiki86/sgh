@extends('layouts.menu')
@section('page_heading', 'Actualizar Atributo Para Empleado')

@section('section')
{{ Form::model($empleadoatributo, ['action' => ['CnfgContratos\EmpleadoAtributoController@update', $empleadoatributo->EMAT_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}
	
	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-contratos/empleadoatributo'])

{{ Form::close() }}
@endsection
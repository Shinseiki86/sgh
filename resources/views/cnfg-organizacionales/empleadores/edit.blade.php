@extends('layouts.menu')
@section('page_heading', 'Actualizar Empleador')

@section('section')
{{ Form::model($empleador, ['action' => ['CnfgOrganizacionales\EmpleadorController@update', $empleador->EMPL_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}
{{dump($empleador)}}
	<!-- Elementos del formulario -->
	@rinclude('form-inputs')

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/empleadores'])

{{ Form::close() }}
@endsection
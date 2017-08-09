@extends('layouts.menu')

@section('page_heading', 'Actualizar Ciudad')

@section('section')
	{{ Form::model($ciudad, ['action' => ['CnfgGeograficos\CiudadController@update', $ciudad->CIUD_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('cnfg-geograficos.ciudades.form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/ciudades'])

	{{ Form::close() }}
@endsection
@extends('layouts.menu')

@section('page_heading', 'Actualizar País')

@section('section')
	{{ Form::model($pais, ['action' => ['CnfgGeograficos\PaisController@update', $pais->PAIS_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@rinclude('form-inputs')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-geograficos/paises'])

	{{ Form::close() }}
@endsection
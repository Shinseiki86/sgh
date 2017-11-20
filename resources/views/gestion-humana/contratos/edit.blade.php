@extends('layouts.menu')
@section('page_heading', 'Actualizar Contrato')

@section('section')
{{ Form::model($contrato, ['action' => ['GestionHumana\ContratoController@update', $contrato->CONT_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}



			@rinclude('form-inputs')

		<!-- Elementos del formulario -->
		

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'gestion-humana/contratos'])

{{ Form::close() }}
@endsection

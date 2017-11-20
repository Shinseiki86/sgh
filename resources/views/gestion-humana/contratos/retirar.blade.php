@extends('layouts.menu')
@section('page_heading', 'Retiro de Contrato')

@section('section')
{{ Form::model($contrato, ['action' => ['GestionHumana\ContratoController@cambiarEstado'], 'class' => 'form-horizontal' ]) }}


		
			@rinclude('form-inputs-retiro')


		<!-- Elementos del formulario -->
		

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'gestion-humana/contratos'])

{{ Form::close() }}
@endsection

@extends('layouts.menu')

@section('page_heading', 'Actualizar Ausentismo')

@section('section')
	{{ Form::model($ausentismo, ['route' => ['cnfg-ausentismos.ausentismos.update', $ausentismo ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}
		<!-- Elementos del formulario -->
		@include('cnfg-ausentismos.ausentismos.fields')
		@include('widgets.rellena',['columns'=>['DX_DESCRIPCION'=>$diagnostico[0]->DIAG_DESCRIPCION,'CIE10'=>$diagnostico[0]->DIAG_CODIGO]])
		@include('widgets.rellena',['columns'=>['AUSE_ESTADO'=>$ausentismo->AUSE_ESTADO]])

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/ausentismos'])

	{{ Form::close() }}
@endsection
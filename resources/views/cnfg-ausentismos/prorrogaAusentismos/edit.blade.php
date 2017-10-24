@extends('layouts.menu')

@section('page_heading', 'Actualizar Prorroga')

@section('section')
	<div class='col-md-8 col-md-offset-2'>
	{{ Form::model($prorrogaausentismos, ['route' => ['cnfg-ausentismos.prorrogaausentismos.update', $prorrogaausentismos ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@include('cnfg-ausentismos.prorrogaausentismos.fields')
		@include('utilidades.rellena',['columns'=>['DX_DESCRIPCIONP'=>$diagnostico[0]->DIAG_DESCRIPCION,'CIE10'=>$diagnostico[0]->DIAG_CODIGO]])

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/prorrogaausentismos'])

	{{ Form::close() }}
</div>
@endsection
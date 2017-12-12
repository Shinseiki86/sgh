@extends('layouts.menu')
@section('page_heading', 'Variaciones de Planta')

@section('section')
{{ Form::model($plantalaboral, ['action' => ['cnfg-organizacionales\PlantaLaboralController@variacionPlanta'], 'class' => 'form-horizontal' ]) }}


		
			@rinclude('form-inputs-variaciones')


		<!-- Elementos del formulario -->
		

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-organizacionales/plantaslaborales'])

{{ Form::close() }}
@endsection

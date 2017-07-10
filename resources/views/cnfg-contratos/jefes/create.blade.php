@extends('layouts.menu')

@section('page_heading', 'Gestión de Jefes')

@section('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">

		var options = {
			/*
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			*/
			no_results_text: 'Ningún resultado coincide.'
		};

		//para volver los select mucho mas amigables en listas grandes de datos
		$(".chosen-select").chosen(options); 

	</script>
@parent
@endsection

@section('section')
	
	{{ Form::open(['route' => 'cnfg-contratos.jefes.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}

		<div class="form-group{{ $errors->has('PROS_ID') ? ' has-error' : '' }}">
			<label for="PROS_ID" class="col-md-2 control-label">Empleado</label>
			<div class="col-md-6">
				{{ Form::select('PROS_ID', [null => 'Seleccione un empleado'] + $arrJefes , old('PROS_ID'), [
				'class' => 'form-control chosen-select',
				'required'
				]) }}

				@if ($errors->has('PROS_ID'))
				<span class="help-block">
					<strong>{{ $errors->first('PROS_ID') }}</strong>
				</span>
				@endif
			</div>
		</div>
		

		<div class="form-group{{ $errors->has('JEFE_OBSERVACIONES') ? ' has-error' : '' }}">
		{{ Form::label('JEFE_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-2 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('JEFE_OBSERVACIONES', old('JEFE_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('JEFE_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('JEFE_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-contratos/jefes/') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
					'class'=>'btn btn-primary',
					'type'=>'submit',
					'data-tooltip'=>'tooltip',
					'title'=>'Guardar',
				]) }}
			</div>
		</div>
	{{ Form::close() }}
@endsection

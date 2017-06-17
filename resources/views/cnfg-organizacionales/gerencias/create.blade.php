@extends('layouts.menu')

@section('page_heading', 'Nueva Gerencia')

@section('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		var options = {
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			no_results_text: 'Ningún resultado coincide.'
		};
		$(".chosen-select").chosen(options); 
	</script>
@parent
@endsection

@section('section')
	
	{{ Form::open(['route' => 'cnfg-organizacionales.gerencias.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('GERE_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('GERE_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('GERE_DESCRIPCION', old('GERE_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('GERE_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
			<label for="EMPL_ID" class="col-md-4 control-label">Empresa</label>
			<div class="col-md-6">
				{{ Form::select('EMPL_ID', [null => 'Seleccione una empresa'] + $arrEmpleadores , old('EMPL_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('EMPL_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PROC_ids') ? ' has-error' : '' }}">
			{{ Form::label('PROC_ids', 'Procesos', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::select('PROC_ids', $arrProcesos , old('PROC_ids'), [
					'id'=>'PROC_ids',
					'name'=>'PROC_ids[]',
					'data-placeholder'=>'Seleccione los procesos...',
					'class' => 'form-control chosen-select',
					'multiple'
				]) }}
				@if ($errors->has('PROC_ids'))
					<span class="help-block">
						<strong>{{ $errors->first('PROC_ids') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('GERE_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('GERE_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('GERE_OBSERVACIONES', old('GERE_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('GERE_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/cargos/') }}" data-tooltip="tooltip" title="Regresar">
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

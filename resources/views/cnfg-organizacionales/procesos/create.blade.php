@extends('layouts.menu')

@section('page_heading', 'Nuevo Proceso')

@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
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
@endpush

@section('section')
	
	{{ Form::open(['route' => 'cnfg-organizacionales.procesos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('PROC_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('PROC_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('PROC_DESCRIPCION', old('PROC_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('PROC_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('PROC_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('GERE_ids') ? ' has-error' : '' }}">
			{{ Form::label('GERE_ids', 'Gerencias', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::select('GERE_ids', $arrGerencias , old('GERE_ids'), [
					'id'=>'GERE_ids',
					'name'=>'GERE_ids[]',
					'data-placeholder'=>'Seleccione las gerencias...',
					'class' => 'form-control chosen-select',
					'multiple'
				]) }}
				@if ($errors->has('GERE_ids'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_ids') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PROC_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('PROC_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('PROC_OBSERVACIONES', old('PROC_OBSERVACIONES'), [ 'class' => 'form-control', 'size' => '20x3', 'maxlength' => '300']) }}
				@if ($errors->has('PROC_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('PROC_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/procesos/') }}" data-tooltip="tooltip" title="Regresar">
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

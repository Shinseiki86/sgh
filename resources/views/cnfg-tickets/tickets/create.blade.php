@extends('layouts.menu')

@section('page_heading', 'Gestión de Tickets')

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
	
	{{ Form::open(['route' => 'cnfg-tickets.tickets.store', 'class' => 'form-horizontal']) }}


		<div class="form-group{{ $errors->has('CATE_ID') ? ' has-error' : '' }}">
			<label for="CATE_ID" class="col-md-4 control-label">Categoría</label>
			<div class="col-md-6">
				{{ Form::select('CATE_ID', [null => 'Seleccione una categoría'] + $arrCategorias , old('CATE_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('CATE_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CATE_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_ID') ? ' has-error' : '' }}">
			<label for="ESTI_ID" class="col-md-4 control-label">Estado</label>
			<div class="col-md-6">
				{{ Form::select('ESTI_ID', [null => 'Seleccione un estado'] + $arrEstados , old('ESTI_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('ESTI_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PRIO_ID') ? ' has-error' : '' }}">
			<label for="PRIO_ID" class="col-md-4 control-label">Prioridad</label>
			<div class="col-md-6">
				{{ Form::select('PRIO_ID', [null => 'Seleccione una prioridad'] + $arrPrioridad , old('PRIO_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('PRIO_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('PRIO_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CONT_ID') ? ' has-error' : '' }}">
			<label for="CONT_ID" class="col-md-4 control-label">Implicado</label>
			<div class="col-md-6">
				{{ Form::select('CONT_ID', [null => 'Seleccione un empleado'] + $arrContratos , old('CONT_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('CONT_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TICK_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TICK_DESCRIPCION', 'Descripción de los Hechos',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TICK_DESCRIPCION', old('TICK_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '3000']) }}
				@if ($errors->has('TICK_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TICK_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_OBSERVACIONES', 'Descripción de los Hechos',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('ESTI_OBSERVACIONES', old('ESTI_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '3000']) }}
				@if ($errors->has('ESTI_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_OBSERVACIONES', 'Archivo',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::file('archivotnl', old('TICK_IMAGEN'), [ 'class' => 'form-control' ]) }}
				@if ($errors->has('ESTI_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_OBSERVACIONES', 'Foto',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::file('archivotnl', old('TICK_IMAGEN'), [ 'class' => 'form-control' ]) }}
				@if ($errors->has('ESTI_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/categorias/') }}" data-tooltip="tooltip" title="Regresar">
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

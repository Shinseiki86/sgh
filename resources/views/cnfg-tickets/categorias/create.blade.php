@extends('layouts.menu')

@section('page_heading', 'Nueva Categoría')

@section('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
@parent
@endsection

@section('section')
	
	{{ Form::open(['route' => 'cnfg-tickets.categorias.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('CATE_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CATE_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CATE_DESCRIPCION', old('CATE_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CATE_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CATE_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CATE_COLOR') ? ' has-error' : '' }}">
			{{ Form::label('CATE_COLOR', 'Color',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CATE_COLOR', old('CATE_COLOR'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CATE_COLOR'))
					<span class="help-block">
						<strong>{{ $errors->first('CATE_COLOR') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PROC_ID') ? ' has-error' : '' }}">
			<label for="PROC_ID" class="col-md-4 control-label">Proceso</label>
			<div class="col-md-6">
				{{ Form::select('PROC_ID', [null => 'Seleccione un proceso'] + $arrProcesos , old('PROC_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('PROC_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('PROC_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CATE_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('CATE_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CATE_OBSERVACIONES', old('CATE_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CATE_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CATE_OBSERVACIONES') }}</strong>
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

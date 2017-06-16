@extends('layouts.menu')

@section('page_heading', 'Actualizar Centro de costo '.$centrocosto->CECO_ID)

@section('section')

	{{ Form::model($centrocosto, ['action' => ['CentroCostoController@update', $centrocosto->CECO_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('CECO_CODIGO') ? ' has-error' : '' }}">
			{{ Form::label('CECO_CODIGO', 'Codigo',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CECO_CODIGO', old('CECO_CODIGO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CECO_CODIGO'))
					<span class="help-block">
						<strong>{{ $errors->first('CECO_CODIGO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CECO_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CECO_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CECO_DESCRIPCION', old('CECO_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CECO_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CECO_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('GERE_ID') ? ' has-error' : '' }}">
			<label for="GERE_ID" class="col-md-4 control-label">Gerencia</label>
			<div class="col-md-6">
				{{ Form::select('GERE_ID', [null => 'Seleccione una centrocosto'] + $arrGerencias , old('GERE_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('GERE_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CECO_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('CECO_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CECO_OBSERVACIONES', old('CECO_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CECO_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CECO_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/centrocostos/') }}" data-tooltip="tooltip" title="Regresar">
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
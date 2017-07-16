@extends('layouts.menu')

@section('page_heading', 'Actualizar Estado de Aprobación')

@section('section')

	{{ Form::model($estadoaprobacion, ['action' => ['CnfgTickets\EstadoAprobacionController@update', $estadoaprobacion->ESAP_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('ESAP_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('ESAP_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('ESAP_DESCRIPCION', old('ESAP_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('ESAP_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('ESAP_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESAP_COLOR') ? ' has-error' : '' }}">
			{{ Form::label('ESAP_COLOR', 'Color',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('ESAP_COLOR', old('ESAP_COLOR'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('ESAP_COLOR'))
					<span class="help-block">
						<strong>{{ $errors->first('ESAP_COLOR') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESAP_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESAP_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('ESAP_OBSERVACIONES', old('ESAP_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('ESAP_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('ESAP_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/estadoaprobaciones/') }}" data-tooltip="tooltip" title="Regresar">
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
@extends('layouts.menu')

@section('page_heading', 'Actualizar Riesgo')

@section('section')

	{{ Form::model($riesgo, ['action' => ['CnfgOrganizacionales\RiesgoController@update', $riesgo->RIES_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('RIES_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('RIES_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('RIES_DESCRIPCION', old('RIES_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('RIES_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('RIES_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('RIES_FACTOR') ? ' has-error' : '' }}">
			{{ Form::label('RIES_FACTOR', 'Factor',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('RIES_FACTOR', old('RIES_FACTOR'), [ 'class' => 'form-control', 'maxlength' => '5', 'required', 'numeric' ]) }}
				@if ($errors->has('RIES_FACTOR'))
					<span class="help-block">
						<strong>{{ $errors->first('RIES_FACTOR') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('RIES_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('RIES_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('RIES_OBSERVACIONES', old('RIES_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('RIES_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('RIES_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/riesgos/') }}" data-tooltip="tooltip" title="Regresar">
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
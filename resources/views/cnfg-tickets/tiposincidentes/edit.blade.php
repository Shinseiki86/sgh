@extends('layouts.menu')

@section('page_heading', 'Actualizar Tipo de Incidente')

@section('section')

	{{ Form::model($tipoincidente, ['action' => ['CnfgTickets\TipoIncidenteController@update', $tipoincidente->TIIN_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('TIIN_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TIIN_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TIIN_DESCRIPCION', old('TIIN_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TIIN_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TIIN_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TIIN_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TIIN_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TIIN_OBSERVACIONES', old('TIIN_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TIIN_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TIIN_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/tipoincidentees/') }}" data-tooltip="tooltip" title="Regresar">
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
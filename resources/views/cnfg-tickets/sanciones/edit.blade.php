@extends('layouts.menu')

@section('page_heading', 'Actualizar Decisión Administrativa '.$sancion->SANC_ID)

@section('section')

	{{ Form::model($sancion, ['action' => ['CnfgTickets\SancionController@update', $sancion->SANC_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('SANC_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('SANC_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('SANC_DESCRIPCION', old('SANC_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('SANC_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('SANC_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('SANC_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('SANC_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('SANC_OBSERVACIONES', old('SANC_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('SANC_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('SANC_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/sanciones/') }}" data-tooltip="tooltip" title="Regresar">
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
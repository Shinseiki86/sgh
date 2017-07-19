@extends('layouts.menu')

@section('page_heading', 'Nuevo Turno')

@section('section')
	
	{{ Form::open(['route' => 'cnfg-organizacionales.turnos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('TURN_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TURN_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TURN_DESCRIPCION', old('TURN_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TURN_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TURN_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TURN_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TURN_OBSERVACIONES', old('TURN_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TURN_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/turnos/') }}" data-tooltip="tooltip" title="Regresar">
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

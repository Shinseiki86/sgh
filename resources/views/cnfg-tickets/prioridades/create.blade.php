@extends('layouts.menu')

@section('page_heading', 'Nueva Prioridad')

@section('section')
	
	{{ Form::open(['route' => 'cnfg-tickets.prioridades.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('PRIO_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('PRIO_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('PRIO_DESCRIPCION', old('PRIO_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('PRIO_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('PRIO_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PRIO_COLOR') ? ' has-error' : '' }}">
			{{ Form::label('PRIO_COLOR', 'Color',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('PRIO_COLOR', old('PRIO_COLOR'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('PRIO_COLOR'))
					<span class="help-block">
						<strong>{{ $errors->first('PRIO_COLOR') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PRIO_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('PRIO_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('PRIO_OBSERVACIONES', old('PRIO_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('PRIO_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('PRIO_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/prioridades/') }}" data-tooltip="tooltip" title="Regresar">
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

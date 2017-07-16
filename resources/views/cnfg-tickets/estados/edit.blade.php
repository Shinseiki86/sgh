@extends('layouts.menu')

@section('page_heading', 'Actualizar Estado de Ticket')

@section('section')

	{{ Form::model($estadoticket, ['action' => ['CnfgTickets\EstadoTicketController@update', $estadoticket->ESTI_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('ESTI_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('ESTI_DESCRIPCION', old('ESTI_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('ESTI_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_COLOR') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_COLOR', 'Color',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('ESTI_COLOR', old('ESTI_COLOR'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('ESTI_COLOR'))
					<span class="help-block">
						<strong>{{ $errors->first('ESTI_COLOR') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESTI_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESTI_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('ESTI_OBSERVACIONES', old('ESTI_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
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
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/estadoticketes/') }}" data-tooltip="tooltip" title="Regresar">
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
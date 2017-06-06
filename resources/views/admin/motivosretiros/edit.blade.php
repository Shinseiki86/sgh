@extends('layouts.admin')

@section('page_heading', 'Actualizar Motivo de Retiro '.$motivoretiro->MORE_ID)

@section('section')

	{{ Form::model($motivoretiro, ['action' => ['MotivosretirosController@update', $motivoretiro->MORE_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('MORE_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('MORE_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('MORE_DESCRIPCION', old('MORE_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('MORE_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('MORE_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('MORE_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('MORE_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('MORE_OBSERVACIONES', old('MORE_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('MORE_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('MORE_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/estadoscontratos/') }}" data-tooltip="tooltip" title="Regresar">
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
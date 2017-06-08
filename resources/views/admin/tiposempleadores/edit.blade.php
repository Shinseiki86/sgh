@extends('layouts.admin')

@section('page_heading', 'Actualizar Tipo de empleador '.$tipoempleador->CNOS_ID)

@section('section')

	{{ Form::model($tipoempleador, ['action' => ['TipoEmpleadorController@update', $tipoempleador->TIEM_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('TIEM_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TIEM_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TIEM_DESCRIPCION', old('TIEM_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TIEM_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TIEM_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TIEM_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TIEM_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TIEM_OBSERVACIONES', old('TIEM_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TIEM_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TIEM_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/tipoempleadors/') }}" data-tooltip="tooltip" title="Regresar">
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
@extends('layouts.admin')

@section('page_heading', 'Actualizar Gerencia '.$gerencia->GERE_ID)

@section('section')

	{{ Form::model($gerencia, ['action' => ['GerenciaController@update', $gerencia->GERE_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('GERE_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('GERE_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('GERE_DESCRIPCION', old('GERE_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('GERE_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
			<label for="EMPL_ID" class="col-md-4 control-label">Empresa</label>
			<div class="col-md-6">
				{{ Form::select('EMPL_ID', [null => 'Seleccione una empresa'] + $arrEmpleadores , old('EMPL_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('EMPL_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('EMPL_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('GERE_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('GERE_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('GERE_OBSERVACIONES', old('GERE_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('GERE_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('GERE_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/gerencias/') }}" data-tooltip="tooltip" title="Regresar">
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
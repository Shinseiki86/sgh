@extends('layouts.menu')

@section('page_heading', 'Nuevo Grupo')

@section('section')
	
	{{ Form::open(['route' => 'cnfg-organizacionales.grupos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('GRUP_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('GRUP_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('GRUP_DESCRIPCION', old('GRUP_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('GRUP_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('GRUP_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
			<label for="EMPL_ID" class="col-md-4 control-label">Empleador</label>
			<div class="col-md-6">
				{{ Form::select('EMPL_ID', [null => 'Seleccione un empleador'] + $arrEmpleadores , old('EMPL_ID'), [
				'class' => 'form-control',
				'required'
				]) }}

				@if ($errors->has('EMPL_ID'))
				<span class="help-block">
					<strong>{{ $errors->first('EMPL_ID') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('GRUP_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('GRUP_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('GRUP_OBSERVACIONES', old('GRUP_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('GRUP_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('GRUP_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/grupos/') }}" data-tooltip="tooltip" title="Regresar">
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

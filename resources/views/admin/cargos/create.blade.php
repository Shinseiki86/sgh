@extends('layouts.admin')

@section('page_heading', 'Nuevo Cargo')

@section('section')
	
	{{ Form::open(['route' => 'admin.cargos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('CARG_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CARG_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CARG_DESCRIPCION', old('CARG_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CARG_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CARG_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CNOS_ID') ? ' has-error' : '' }}">
			<label for="CNOS_ID" class="col-md-4 control-label">C.N.O</label>
			<div class="col-md-6">
				{{ Form::select('CNOS_ID', [null => 'Seleccione un C.N.O'] + $arrCnos , old('CNOS_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('CNOS_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CNOS_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CARG_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('CARG_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CARG_OBSERVACIONES', old('CARG_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CARG_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CARG_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/cargos/') }}" data-tooltip="tooltip" title="Regresar">
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

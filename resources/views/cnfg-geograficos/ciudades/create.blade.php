@extends('layouts.menu')

@section('page_heading', 'Nuevo Ciudad')

@section('section')
	
	{{ Form::open(['route' => 'cnfg-geograficos.ciudades.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('CIUD_CODIGO') ? ' has-error' : '' }}">
			{{ Form::label('CIUD_CODIGO', 'Código',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CIUD_CODIGO', old('CIUD_CODIGO'), [ 'class' => 'form-control', 'maxlength' => '25', 'required' ]) }}
				@if ($errors->has('CIUD_CODIGO'))
					<span class="help-block">
						<strong>{{ $errors->first('CIUD_CODIGO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CIUD_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CIUD_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CIUD_DESCRIPCION', old('CIUD_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '300', 'required' ]) }}
				@if ($errors->has('CIUD_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CIUD_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('DEPA_ID') ? ' has-error' : '' }}">
			<label for="DEPA_ID" class="col-md-4 control-label">Departamento</label>
			<div class="col-md-6">
				{{ Form::select('DEPA_ID', [null => 'Seleccione un departamento'] + $arrDepartamentos , old('DEPA_ID'), [
					'class' => 'form-control chosen-select',
					'required'
				]) }}

				@if ($errors->has('DEPA_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('DEPA_ID') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-geograficos/ciudades/') }}" data-tooltip="tooltip" title="Regresar">
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

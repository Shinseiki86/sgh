@extends('layouts.menu')

@section('page_heading', 'Actualizar Planta Laboral')

@section('section')

	{{ Form::model($plantalaboral, ['action' => ['CnfgOrganizacionales\PlantaLaboralController@update', $plantalaboral->PALA_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

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

		<div class="form-group{{ $errors->has('CARG_ID') ? ' has-error' : '' }}">
			<label for="EMPL_ID" class="col-md-4 control-label">Cargo</label>
			<div class="col-md-6">
				{{ Form::select('CARG_ID', [null => 'Seleccione un cargo'] + $arrCargos , old('CARG_ID'), [
				'class' => 'form-control',
				'required'
				]) }}

				@if ($errors->has('CARG_ID'))
				<span class="help-block">
					<strong>{{ $errors->first('CARG_ID') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('PALA_CANTIDAD') ? ' has-error' : '' }}">
			{{ Form::label('PALA_CANTIDAD', 'Cantidad Autorizada',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('PALA_CANTIDAD', old('PALA_CANTIDAD'), [ 'class' => 'form-control', 'maxlength' => '10', 'numeric']) }}
				@if ($errors->has('PALA_CANTIDAD'))
					<span class="help-block">
						<strong>{{ $errors->first('PALA_CANTIDAD') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/plantaslaborales/') }}" data-tooltip="tooltip" title="Regresar">
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
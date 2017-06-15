@extends('layouts.menu')

@section('page_heading', 'Actualizar Contrato')

@section('section')

{{ Form::model($contrato, ['action' => ['ContratoController@update', $contrato->CONT_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
				<label for="EMPL_ID" class="col-md-2 control-label">Empleador</label>
				<div class="col-md-6">
					{{ Form::select('EMPL_ID', [null => 'Seleccione un empleador'] + $arrEmpleadores , old('EMPL_ID'), [
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

			<div class="form-group{{ $errors->has('TIEM_ID') ? ' has-error' : '' }}">
				<label for="TIEM_ID" class="col-md-2 control-label">Tipo de empleador</label>
				<div class="col-md-6">
					{{ Form::select('TIEM_ID', [null => 'Seleccione un empleador'] + $arrTiposempleadores , old('TIEM_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('TIEM_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('TIEM_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CECO_ID') ? ' has-error' : '' }}">
				<label for="CECO_ID" class="col-md-2 control-label">Centro de costo</label>
				<div class="col-md-6">
					{{ Form::select('CECO_ID', [null => 'Seleccione un empleador'] + $arrCentroscostos , old('CECO_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('CECO_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CECO_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>
			
			<div class="form-group{{ $errors->has('ESCO_ID') ? ' has-error' : '' }}">
				<label for="ESCO_ID" class="col-md-2 control-label">Estado de contrato</label>
				<div class="col-md-6">
					{{ Form::select('ESCO_ID', [null => 'Seleccione un estado de contrato'] + $arrEstadoscontrato , old('ESCO_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('ESCO_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('ESCO_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('TICO_ID') ? ' has-error' : '' }}">
				<label for="TICO_ID" class="col-md-2 control-label">Tipo de contrato</label>
				<div class="col-md-6">
					{{ Form::select('TICO_ID', [null => 'Seleccione un tipo de contrato'] + $arrTiposcontrato , old('TICO_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('TICO_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('TICO_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CLCO_ID') ? ' has-error' : '' }}">
				<label for="CLCO_ID" class="col-md-2 control-label">Clase de contrato</label>
				<div class="col-md-6">
					{{ Form::select('CLCO_ID', [null => 'Seleccione una clase de contrato'] + $arrClasescontrato , old('CLCO_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('CLCO_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CLCO_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>


			<div class="form-group{{ $errors->has('PROS_ID') ? ' has-error' : '' }}">
				<label for="PROS_ID" class="col-md-2 control-label">Prospecto</label>
				<div class="col-md-6">
					{{ Form::select('PROS_ID', [null => 'Seleccione un prospecto'] + $arrProspectos , old('PROS_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('PROS_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('PROS_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CARG_ID') ? ' has-error' : '' }}">
				<label for="CARG_ID" class="col-md-2 control-label">Cargo</label>
				<div class="col-md-6">
					{{ Form::select('CARG_ID', [null => 'Seleccione un cargo'] + $arrCargos , old('CARG_ID'), [
					'class' => 'form-control chosen-select',
					'required'
					]) }}

					@if ($errors->has('CARG_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('CARG_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_FECHAINGRESO') ? ' has-error' : '' }}">
				{{ Form::label('CONT_FECHAINGRESO', 'Fecha de Ingreso',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::date('CONT_FECHAINGRESO', old('CONT_FECHAINGRESO'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
					@if ($errors->has('CONT_FECHAINGRESO'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_FECHAINGRESO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_FECHARETIRO') ? ' has-error' : '' }}">
				{{ Form::label('CONT_FECHARETIRO', 'Fecha de Retiro',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::date('CONT_FECHARETIRO', old('CONT_FECHARETIRO'), [ 'class' => 'form-control', 'maxlength' => '100' ]) }}
					@if ($errors->has('CONT_FECHARETIRO'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_FECHARETIRO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('MORE_ID') ? ' has-error' : null }}">
				<label for="MORE_ID" class="col-md-2 control-label">Motivo de Retiro</label>
				<div class="col-md-6">
					{{ Form::select('MORE_ID', [null => 'Seleccione un motivo de retiro'] + $arrMotivosretiro , old('MORE_ID'), [
					'class' => 'form-control chosen-select'
					]) }}

					@if ($errors->has('MORE_ID'))
					<span class="help-block">
						<strong>{{ $errors->first('MORE_ID') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_SALARIO') ? ' has-error' : '' }}">
				{{ Form::label('CONT_SALARIO', 'Salario',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::text('CONT_SALARIO', old('CONT_SALARIO'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
					@if ($errors->has('CONT_SALARIO'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_SALARIO') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_VARIABLE') ? ' has-error' : '' }}">
				{{ Form::label('CONT_VARIABLE', 'Variable',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::text('CONT_VARIABLE', old('CONT_VARIABLE'), [ 'class' => 'form-control', 'maxlength' => '15', 'number' ]) }}
					@if ($errors->has('CONT_VARIABLE'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_VARIABLE') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_RODAJE') ? ' has-error' : '' }}">
				{{ Form::label('CONT_RODAJE', 'Rodaje',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::text('CONT_RODAJE', old('CONT_RODAJE'), [ 'class' => 'form-control', 'maxlength' => '15', 'number' ]) }}
					@if ($errors->has('CONT_RODAJE'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_RODAJE') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_CASOMEDICO') ? ' has-error' : '' }}">
				{{ Form::label('CONT_CASOMEDICO', '¿R.M?',  [ 'class' => 'col-md-2 control-label' ]) }}
				<div class="col-md-6">
					{{	Form::select('CONT_CASOMEDICO', ['NO' => 'NO', 'SI' => 'SI'], null, [ 'class' => 'form-control chosen-select' ]) }}
				</div>
			</div>

			<div class="form-group{{ $errors->has('CONT_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('CONT_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-2 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CONT_OBSERVACIONES', old('CONT_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CONT_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CONT_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
			</div>

</div>

<!-- Botones -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-4 text-right">
		<a class="btn btn-warning" role="button" href="{{ URL::to('admin/contratos/') }}" data-tooltip="tooltip" title="Regresar">
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

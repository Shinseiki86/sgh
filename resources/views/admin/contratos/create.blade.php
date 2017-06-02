@extends('layouts.admin')

@section('page_heading', 'Nuevo Contrato')

@section('section')

{{ Form::open(['route' => 'admin.contratos.store', 'class' => 'form-horizontal']) }}


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
					{{ Form::text('CONT_VARIABLE', old('CONT_VARIABLE'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
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
					{{ Form::text('CONT_RODAJE', old('CONT_RODAJE'), [ 'class' => 'form-control', 'maxlength' => '15', 'required', 'number' ]) }}
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

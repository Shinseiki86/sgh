@extends('layouts.menu')

@section('page_heading', 'Actualizar Tipo de contrato')

@section('section')

	{{ Form::model($tiposcontrato, ['action' => ['CnfgContratos\TipoContratoController@update', $tiposcontrato->TICO_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('TICO_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TICO_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TICO_DESCRIPCION', old('TICO_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TICO_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TICO_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TICO_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TICO_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TICO_OBSERVACIONES', old('TICO_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TICO_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TICO_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-contratos/tiposcontratos/') }}" data-tooltip="tooltip" title="Regresar">
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
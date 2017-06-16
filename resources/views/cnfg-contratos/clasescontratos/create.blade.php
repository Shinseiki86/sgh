@extends('layouts.menu')

@section('page_heading', 'Nueva Clase de contrato')

@section('section')
	
	{{ Form::open(['route' => 'cnfg-contratos.clasescontratos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('CLCO_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CLCO_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CLCO_DESCRIPCION', old('CLCO_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CLCO_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CLCO_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CLCO_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('CLCO_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CLCO_OBSERVACIONES', old('CLCO_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CLCO_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CLCO_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-contratos/clasescontratos/') }}" data-tooltip="tooltip" title="Regresar">
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

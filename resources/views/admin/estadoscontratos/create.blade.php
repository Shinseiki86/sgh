@extends('layouts.menu')

@section('page_heading', 'Nueva Clase de contrato')

@section('section')
	
	{{ Form::open(['route' => 'admin.estadoscontratos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('ESCO_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('ESCO_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('ESCO_DESCRIPCION', old('ESCO_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('ESCO_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('ESCO_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('ESCO_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('ESCO_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('ESCO_OBSERVACIONES', old('ESCO_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('ESCO_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('ESCO_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>
		
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('admin/estadoscontratos/') }}" data-tooltip="tooltip" title="Regresar">
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

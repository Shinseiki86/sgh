@extends('layouts.menu')

@section('page_heading', 'Nuevo Permiso')

@push('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		var options = {
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			no_results_text: 'Ningún resultado coincide.'
		};
		$('.chosen-select').chosen(options); 
	</script>
@endpush

@section('section')
	
	{{ Form::open(['route' => 'auth.permisos.store', 'class' => 'form-horizontal']) }}

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			{{ Form::label('name', 'Nombre interno',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('name', old('name'), [ 'class' => 'form-control', 'maxlength' => '15', 'required' ]) }}
				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
			{{ Form::label('display_name', 'Nombre para mostrar',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('display_name', old('display_name'), [ 'class' => 'form-control', 'maxlength' => '50', 'required' ]) }}
				@if ($errors->has('display_name'))
					<span class="help-block">
						<strong>{{ $errors->first('display_name') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('roles_ids') ? ' has-error' : '' }}">
			{{ Form::label('roles_ids', 'Roles', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::select('roles_ids', $arrRoles , old('roles_ids'), [
					'id'=>'roles_ids',
					'name'=>'roles_ids[]',
					'data-placeholder'=>'Seleccione los roles...',
					'class' => 'form-control chosen-select',
					'multiple'
				]) }}
				@if ($errors->has('roles_ids'))
					<span class="help-block">
						<strong>{{ $errors->first('roles_ids') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			{{ Form::label('description', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('description', old('description'), [
					'class' => 'form-control',
					'maxlength' => '100',
					'size' => '20x3',
					'style' => 'resize: vertical',
				]) }}
				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('auth/permisos') }}" data-tooltip="tooltip" title="Regresar">
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

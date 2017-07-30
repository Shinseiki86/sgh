@extends('layouts.menu')

@section('page_heading', 'Actualizar usuario')

@section('head')
	{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
	{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		var options = {
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			no_results_text: 'Ningún resultado coincide.'
		};
		$('.chosen-select').val({{$roles_ids}}).chosen(options); 
	</script>
@parent
@endsection

@section('section')
					
	{{ Form::model($usuario, ['action' => ['Auth\AuthController@update', $usuario->USER_id ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				{{ Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label' ]) }}
				<div class="col-md-6">
					{{ Form::text('name', old('name'), [ 'class' => 'form-control', 'maxlength' => '50', 'required' ]) }}

					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>

		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			{{ Form::label('username', 'Usuario', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('username', old('username'), [ 'class' => 'form-control', 'maxlength'=>'15', 'disabled' ]) }}

				@if ($errors->has('username'))
					<span class="help-block">
						<strong>{{ $errors->first('username') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
			{{ Form::label('cedula', 'Cédula', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('cedula', old('cedula'), [ 'class' => 'form-control', 'pattern'=>'\d*', 'maxlength'=>'15', 'title'=>'Número de identificación (0-9), máximo 15 dígitos.', 'required' ]) }}

				@if ($errors->has('cedula'))
					<span class="help-block">
						<strong>{{ $errors->first('cedula') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			{{ Form::label('email', 'E-mail', [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::email('email', old('email'), [ 'class' => 'form-control', 'maxlength' => '255', 'required' ]) }}

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
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

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('auth/usuarios') }}" data-tooltip="tooltip" title="Regresar">
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

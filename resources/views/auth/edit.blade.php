@extends('layout')
@section('title', '/ Editar usuario' )

@section('head')
	{!! Html::style('assets/js/chosen_v1.6.2/chosen.css') !!}
@endsection

@section('scripts')
	{!! Html::script('assets/js/chosen_v1.6.2/chosen.jquery.min.js') !!}
	<script type="text/javascript">
		$(".chosen-select").chosen({
			no_results_text: "Ningún resultado coincide."
		}); 
	</script>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Modificar usuario</div>
				<div class="panel-body">

					@include('partials/errors')
					
					{{ Form::model($usuario, [ 'action' => [ 'Auth\AuthController@update', $usuario->USER_id ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							{{ Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label' ]) }}
							<div class="col-md-6">
								{{ Form::text('name', old('name'), [ 'class' => 'form-control', 'maxlength' => '255', 'required' ]) }}

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
								{{ Form::text('username', old('username'), [ 'class' => 'form-control', 'disabled' ]) }}

								@if ($errors->has('username'))
									<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
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


						<div class="form-group{{ $errors->has('ROLE_id') ? ' has-error' : '' }}">
							{{ Form::label('ROLE_id', 'Rol', [ 'class' => 'col-md-4 control-label' ]) }}
							<div class="col-md-6">

								<select class="form-control" id="ROLE_id" name="ROLE_id" class="form-control" required>
									<option value="" disabled>Seleccione un rol...</option>
									@foreach($roles as $rol)
									<option value="{{ $rol->ROLE_id }}" {{ $usuario->rol->ROLE_id == $rol->ROLE_id ? ' selected' : '' }}>
										{{ $rol->ROLE_descripcion }}
									</option>
									@endforeach
								</select>

								@if ($errors->has('ROLE_id'))
									<span class="help-block">
										<strong>{{ $errors->first('ROLE_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('idsDocentes') ? ' has-error' : '' }}">
							{{ Form::label('idsDocentes', 'Docentes', [ 'class' => 'col-md-4 control-label' ]) }}
							<div class="col-md-6">
								<select
									id="idsDocentes"
									name="idsDocentes[]"
									data-placeholder="Seleccione los docentes..."
									class="form-control chosen-select"
									multiple >
									@foreach($allDocentes as $docente)
									<option
										value="{{ $docente->USER_id }}"
										{{ in_array($docente->USER_id, $idsDocentes) ? 'selected' : '' }}>
										{{ $docente->name }}
									</option>
									@endforeach
								</select>

								@if ($errors->has('idsDocentes'))
									<span class="help-block">
										<strong>{{ $errors->first('idsDocentes') }}</strong>
									</span>
								@endif
							</div>
						</div>


						<!-- Botones -->
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4 text-right">

									{{ Form::button('<i class="fa fa-exclamation" aria-hidden="true"></i> Reset', array('class'=>'btn btn-warning', 'type'=>'reset')) }}

										<a class="btn btn-warning" role="button" href="{{ URL::to('usuarios/') }}">
												<i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
										</a>

								{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Actualizar', array('class'=>'btn btn-primary', 'type'=>'submit')) }}

							</div>
						</div>


					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

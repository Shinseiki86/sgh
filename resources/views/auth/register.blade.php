@extends('layout')
@section('title', '/ Nuevo usuario' )

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
				<div class="panel-heading">Crear nuevo usuario</div>
				<div class="panel-body">
				
					@include('partials/errors')

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Nombre</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label for="username" class="col-md-4 control-label">Usuario</label>

							<div class="col-md-6">
								<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

								@if ($errors->has('username'))
									<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('ROLE_id') ? ' has-error' : '' }}">
							<label for="ROLE_id" class="col-md-4 control-label">Rol</label>
							<div class="col-md-6">
								{{ Form::select('ROLE_id', $arrRoles , old('ROLE_id'), [
									'id'=>'ROLE_id',
									'name'=>'ROLE_id',
									'class' => 'form-control',
									'required'
								]) }}

								@if ($errors->has('ROLE_id'))
									<span class="help-block">
										<strong>{{ $errors->first('ROLE_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Contraseña</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password">

								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

								@if ($errors->has('password_confirmation'))
									<span class="help-block">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('idsDocentes') ? ' has-error' : '' }}">
							{{ Form::label('idsDocentes', 'Docentes', [ 'class' => 'col-md-4 control-label' ]) }}
							<div class="col-md-6">

								{{ Form::select('idsDocentes', $allDocentes , old('ROLE_id'), [
									'id'=>'idsDocentes',
									'name'=>'idsDocentes[]',
									'data-placeholder'=>'Seleccione los docentes...',
									'class' => 'form-control chosen-select',
									'multiple'
								]) }}
								
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

								{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar', array('class'=>'btn btn-primary', 'type'=>'submit')) }}

							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

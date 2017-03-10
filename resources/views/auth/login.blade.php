@extends ('layouts.plane')
@section ('body')
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<br /><br /><br />
				@section ('login_panel_title','Iniciar sesión')
				@section ('login_panel_body')
					{{ Form::open( [ 'url'=>'login' , 'role'=>'form', 'class'=>'form-vertical' ] ) }}
						<fieldset>
							<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="username" placeholder="Usuario" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
								</div>
								@if ($errors->has('username'))
									<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input id="password" placeholder="Contraseña" name="password" type="password" class="form-control" autocomplete="off" maxlength="30">
								</div>
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<div class="col-md-offset-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Recordarme
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-sign-in"></i> Iniciar sesión
								</button>

								<a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidó su contraseña?</a>
							</div>
						</fieldset>
					{{ Form::close() }}
				@endsection
				@include('widgets.panel', array('as'=>'login', 'header'=>true))
			</div>
		</div>
	</div>
@stop
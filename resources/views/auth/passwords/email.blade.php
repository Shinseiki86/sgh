@extends('layouts.menu')
@section('page_heading', 'Cambiar Contraseña')

@section('section')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{{ Form::open(['url'=>'password/email', 'class' => 'form-horizontal']) }}

						@include('widgets.forms.input', ['type'=>'email', 'name'=>'email', 'label'=>'Correo Electrónico (E-Mail)'])

						<div class="form-group">
							<div class="col-xs-8 col-xs-offset-4 text-right">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-envelope" aria-hidden="true"></i> Enviar enlace al correo
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

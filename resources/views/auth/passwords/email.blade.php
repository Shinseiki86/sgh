@extends ('layouts.plane')

@push('head')
<style type="text/css">
	html, body {height: 100%;}
	body { 
		background-image: url('{{asset('assets/images/logo.jpg')}}');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;
	}
	.container {
	    height: 100%;
	    width: 100%;
	    display: table;
	}
	.row {
	    display: table-cell;
	    height: 100%;
	    vertical-align: middle;
	}
</style>
@endpush

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@section ('login_panel_title','¿Olvidó su contraseña?')
			@section ('login_panel_body')
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{{ Form::open(['url'=>'password/email', 'class' => 'form-horizontal']) }}
						@include('widgets.forms.input', ['type'=>'email', 'name'=>'email', 'label'=>'Correo Electrónico (E-Mail)'])
						@include('widgets.forms.buttons', ['icon'=>'envelope', 'text'=>'Enviar enlace al correo'])
					{{ Form::close() }}
			@endsection
			@include('widgets.panel', array('as'=>'login', 'header'=>true))
		</div>
	</div>
</div>
@endsection

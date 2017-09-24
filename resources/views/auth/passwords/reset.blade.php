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
			<div class="panel panel-default">
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{{ Form::open(['url'=>'password/reset', 'class' => 'form-horizontal']) }}

						<input type="hidden" name="token" value="{{ $token }}">

						@include('widgets.forms.input', ['type'=>'email', 'name'=>'email', 'value'=>$email, 'label'=>'E-Mail', 'options'=>['readonly'] ])

						@include('widgets.forms.input', ['type'=>'password', 'name'=>'password', 'label'=>'Nueva Contraseña' ])
						@include('widgets.forms.input', ['type'=>'password', 'name'=>'password_confirmation', 'label'=>'Confirmar Contraseña' ])

						<div class="form-group">
							<div class="col-xs-8 col-xs-offset-4 text-right">
								<a class="btn btn-warning" role="button" href="{{ URL::previous() }}" data-tooltip="tooltip" title="Regresar">
									<i class="fa fa-arrow-left" aria-hidden="true"></i>
								</a>
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-refresh"></i> Cambiar Contraseña
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

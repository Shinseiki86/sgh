@extends('layout')
@section('title', '/ Usuarios Locales')


@section('scripts')
	<script type="text/javascript">
	//Carga de datos a mensajes modales para eliminar y clonar registros
	$(document).ready(function () {
		$('.modal').on('show.bs.modal', function (event) {

			var button = $(event.relatedTarget); // Button that triggered the modal
			var modal = $(this);

			var USER_id = button.data('user_id'); // Extract info from data-* attributes
			modal.find('.USER_id').text(USER_id);

			var username = button.data('username'); // Extract info from data-* attributes
			modal.find('.username').text(username);

			var urlForm = button.data('action'); // Extract info from data-* attributes
			$('.frmModal').attr('action', urlForm);
		});
	});
	</script>
@parent
@endsection

@section('content')

	<h1 class="page-header">Usuarios Locales</h1>
	<div class="row well well-sm">

		<div id="btn-create" class="pull-right">
			<!-- botón de importar usuarios -->
			@include('auth/index-modal-import')

			<a class='btn btn-primary' role='button' href="{{ URL::to('roles') }}">
				<i class="fa fa-male" aria-hidden="true"></i> <i class="fa fa-female" aria-hidden="true"></i>
				Roles<span class="hidden-xs"></span>
			</a>
			<a class='btn btn-primary' role='button' href="{{ URL::to('register') }}">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				Nuevo<span class="hidden-xs"> Usuario</span>
			</a>
		</div>
	</div>
	
	@include('partials/errors')
	
	<table class="table table-striped">
		<thead>
			<tr class="active">
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">ID</th>
				<th class="col-xs-4 col-sm-4 col-md-4 col-lg-2">Nombre</th>
				<th class="col-xs-2 col-sm-1 col-md-1 col-lg-1">Usuario</th>
				<th class="col-xs-2 col-sm-1 col-md-1 col-lg-1">Rol</th>
				<th class="hidden-xs col-sm-1 col-md-1 col-lg-1">Creador</th>
				<th class="col-xs-1 col-sm-4 col-md-4 col-lg-4">Acciones</th>
			</tr>
		</thead>
		<tbody>


			@foreach($usuarios as $usuario)
			<tr>
				<td>{{ $usuario -> USER_id }}</td>
				<td>{{ $usuario -> name }}</td>
				<td>{{ $usuario -> username }}</td>
				<td>{{ $usuario -> rol -> ROLE_descripcion }}</td>
				<td class="hidden-xs">{{ $usuario -> USER_creadopor }}</td>
				<td>

					{{-- <!-- Botón Ver (show) -->
					<a class="btn btn-success btn-xs" href="{{ URL::to('usuarios/'.$usuario->USER_id) }}">
						<span class="glyphicon glyphicon-eye-open"></span> <span class="hidden-xs">Ver</span>
					</a><!-- Fin Botón Ver (show) --> --}}

					{{-- <!-- Botón Contraseña (sendResetLinkEmail) -->
					<a class="btn btn-warning btn-xs" href="{{ URL::to('password/email/'.$usuario->USER_id) }}">
						<i class="fa fa-envelope" aria-hidden="true"></i> <span class="hidden-xs">Contraseña</span>
					</a><!-- Fin Botón Contraseña (sendResetLinkEmail) --> --}}

					<!-- Botón Contraseña (showResetForm) -->
					<a class="btn btn-warning btn-xs" href="{{ URL::to('password/reset?USER_id='.$usuario->USER_id) }}">
						<i class="fa fa-key" aria-hidden="true"></i> <span class="-hidden-xs">Contraseña</span>
					</a><!-- Fin Botón Contraseña (showResetForm) -->

					<!-- Botón Editar (edit) -->
					<a class="btn btn-info btn-xs" href="{{ URL::to('usuarios/'.$usuario->USER_id.'/edit') }}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="-hidden-xs">Editar</span>
					</a><!-- Fin Botón Editar (edit) -->

					<!-- Botón Borrar (destroy) -->
					{{ Form::button('<i class="fa fa-user-times" aria-hidden="true"></i> <span class="-hidden-xs">Borrar</span>',[
							'class'=>'btn btn-xs btn-danger',
							'data-toggle'=>'modal',
							'data-user_id'=>$usuario->USER_id,
							'data-username'=>$usuario->username,
							'data-action'=>'usuarios/'.$usuario->USER_id,
							'data-target'=>'#pregModalDelete',
						])
					}}


				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@include('partials/datatable') <!-- Script para tablas -->	
	@include('auth/index-modalDelete')
	
@endsection

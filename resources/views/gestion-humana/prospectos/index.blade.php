@extends('layouts.menu')
@section('title', '/ Prospectos')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Prospectos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('gestion-humana.prospectos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">Cedula</th>
				<th class="col-md-5">Fecha de Expedición CC.</th>
				<th class="col-md-5">Primer Nombre</th>
				<th class="col-md-5">Segundo Nombre</th>
				<th class="col-md-5">Primer Apellido</th>
				<th class="col-md-5">Segundo Apellido</th>
				<th class="col-md-5">Sexo</th>
				<th class="col-md-5">Dirección</th>
				<th class="col-md-5">Telefono</th>
				<th class="col-md-5">Celular</th>
				<th class="col-md-5">Correo</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($prospectos as $prospecto)
			<tr>
				<td>{{ $prospecto -> PROS_CEDULA }}</td>
				<td>{{ $prospecto -> PROS_FECHAEXPEDICION }}</td>
				<td>{{ $prospecto -> PROS_PRIMERNOMBRE }}</td>
				<td>{{ $prospecto -> PROS_SEGUNDONOMBRE }}</td>
				<td>{{ $prospecto -> PROS_PRIMERAPELLIDO }}</td>
				<td>{{ $prospecto -> PROS_SEGUNDOAPELLIDO }}</td>
				<td>{{ $prospecto -> PROS_SEXO }}</td>
				<td>{{ $prospecto -> PROS_DIRECCION }}</td>
				<td>{{ $prospecto -> PROS_TELEFONO }}</td>
				<td>{{ $prospecto -> PROS_CELULAR }}</td>
				<td>{{ $prospecto -> PROS_CORREO }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('gestion-humana.prospectos.edit', [ 'PROS_ID' => $prospecto->PROS_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $prospecto->PROS_ID,
						'data-modelo'=> str_upperspace(class_basename($prospecto)),
						'data-descripcion'=> $prospecto->PROS_PRIMERNOMBRE,
						'data-action'=>'prospectos/'. $prospecto->PROS_ID,
						'data-target'=>'#pregModalDelete',
						'data-tooltip'=>'tooltip',
						'title'=>'Borrar',
					])}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@include('widgets/modal-delete')
@endsection
@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Prospectos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.prospectos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $prospectos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$prospectos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('PROS_CEDULA', 'Cedula')</th>
				<th class="col-md-5">@sortablelink('PROS_FECHAEXPEDICION', 'Fecha de Expedición CC.')</th>
				<th class="col-md-5">@sortablelink('PROS_PRIMERNOMBRE', 'Primer Nombre')</th>
				<th class="col-md-5">@sortablelink('PROS_SEGUNDONOMBRE', 'Segundo Nombre')</th>
				<th class="col-md-5">@sortablelink('PROS_PRIMERAPELLIDO', 'Primer Apellido')</th>
				<th class="col-md-5">@sortablelink('PROS_SEGUNDOAPELLIDO', 'Segundo Apellido')</th>
				<th class="col-md-5">@sortablelink('PROS_SEXO', 'Sexo')</th>
				<th class="col-md-5">@sortablelink('PROS_DIRECCION', 'Dirección')</th>
				<th class="col-md-5">@sortablelink('PROS_TELEFONO', 'Telefono')</th>
				<th class="col-md-5">@sortablelink('PROS_CELULAR', 'Celular')</th>
				<th class="col-md-5">@sortablelink('PROS_COREO', 'Correo')</th>
				<th class="col-md-1"></th>
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
				<td>{{ $prospecto -> PROS_COREO }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.prospectos.edit', [ 'PROS_ID' => $prospecto->PROS_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
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
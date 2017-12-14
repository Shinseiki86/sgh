@extends('layouts.menu')
@section('title', '/ Negocios')
@include('widgets.datatable.datatable-export')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Negocios
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-contratos.negocios.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-1">Código</th>
				<th class="col-md-4">Descripción</th>
				<th class="col-md-4">Empresa</th>
				<th class="col-md-4">Responsable</th>
				<th class="col-md-6">Observaciones</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($negocios as $negocio)
			<tr>
				<td>{{ $negocio -> NEGO_ID }}</td>
				<td>{{ $negocio -> NEGO_DESCRIPCION }}</td>
				<td>{{ $negocio -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ nombre_empleado($negocio -> prospecto -> PROS_ID)}}</td>
				<td>{{ $negocio -> NEGO_OBSERVACIONES }}</td>
				<td>{{ $negocio -> NEGO_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-contratos.negocios.edit', [ 'NEGO_ID' => $negocio->NEGO_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $negocio->NEGO_ID,
						'data-modelo'=> str_upperspace(class_basename($negocio)),
						'data-descripcion'=> $negocio->NEGO_DESCRIPCION,
						'data-action'=>'negocios/'. $negocio->NEGO_ID,
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
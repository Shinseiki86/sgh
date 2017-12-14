@extends('layouts.menu')
@section('title', '/ Centro costos')
@include('widgets.datatable.datatable-export')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Centros de costos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-organizacionales.centroscostos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
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
				<th class="col-md-3">Descripción</th>
				<th class="hidden-xs col-md-1">Creado por</th>
				<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($centroscostos as $centrocosto)
			<tr>
				<td>{{ $centrocosto -> CECO_CODIGO }}</td>
				<td>{{ $centrocosto -> CECO_DESCRIPCION }}</td>
				<td>{{ $centrocosto -> CECO_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-organizacionales.centroscostos.edit', [ 'CECO_ID' => $centrocosto->CECO_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $centrocosto->CECO_ID,
						'data-modelo'=> str_upperspace(class_basename($centrocosto)),
						'data-descripcion'=> $centrocosto->CECO_DESCRIPCION,
						'data-action'=>'centroscostos/'. $centrocosto->CECO_ID,
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
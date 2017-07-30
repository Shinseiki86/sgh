@extends('layouts.menu')
@section('title', '/ Tipos empleadores')
@include('datatable')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Tipos de empleadores
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-organizacionales.tiposempleadores.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-4">Descripción</th>
				<th class="col-md-6">Observaciones</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($tiposempleadores as $tipoempleador)
			<tr>
				<td>{{ $tipoempleador -> TIEM_DESCRIPCION }}</td>
				<td>{{ $tipoempleador -> TIEM_OBSERVACIONES }}</td>
				<td>{{ $tipoempleador -> TIEM_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-organizacionales.tiposempleadores.edit', [ 'TIEM_ID' => $tipoempleador->TIEM_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $tipoempleador->TIEM_ID,
						'data-modelo'=> str_upperspace(class_basename($tipoempleador)),
						'data-descripcion'=> $tipoempleador->TIEM_DESCRIPCION,
						'data-action'=>'tiposempleadores/'. $tipoempleador->TIEM_ID,
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
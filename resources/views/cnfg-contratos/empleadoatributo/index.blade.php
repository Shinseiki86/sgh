@extends('layouts.menu')
@section('title', '/ Atributos por Empleado')
@include('widgets.datatable.datatable-export')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Atributos por Empleado
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-contratos.empleadoatributo.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">Empleado</th>
				<th class="col-md-5">Atributo</th>
				<th class="col-md-2">Fecha</th>
				<th class="col-md-5">Observaciones</th>
				<th class="hidden-xs col-md-2">Creado por</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($empleadoatributos as $empleadoatributo)
			<tr>
				<td>{{ $empleadoatributo -> contrato -> prospecto -> nombre_completo }}</td>
				<td>{{ $empleadoatributo -> atributo -> ATRI_DESCRIPCION }}</td>
				<td>{{ $empleadoatributo -> EMAT_FECHA }}</td>
				<td>{{ $empleadoatributo -> EMAT_OBSERVACIONES }}</td>
				<td>{{ $empleadoatributo -> EMAT_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-contratos.empleadoatributo.edit', [ 'EMAT_ID' => $empleadoatributo->EMAT_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $empleadoatributo->EMAT_ID,
						'data-modelo'=> str_upperspace(class_basename($empleadoatributo)),
						'data-descripcion'=> $empleadoatributo-> contrato -> prospecto -> nombre_completo,
						'data-action'=>'empleadoatributos/'. $empleadoatributo->EMAT_ID,
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
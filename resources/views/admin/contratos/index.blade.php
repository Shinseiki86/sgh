@extends('layouts.admin')
@section('title', '/ Contratos')
@include('datatable')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Contratos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.contratos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">Empleador</th>
				<th class="col-md-5">Tipo Contrato</th>
				<th class="col-md-5">Clase de Contrato</th>
				<th class="col-md-5">Cedula</th>
				<th class="col-md-5">Nombre</th>
				<th class="col-md-5">Salario</th>
				<th class="col-md-5">Cargo</th>
				<th class="col-md-5">Estado</th>
				<th class="col-md-5">Fecha Ingreso</th>
				<th class="col-md-5">Fecha Retiro</th>
				<th class="col-md-5">Motivo Retiro</th>
				<th class="col-md-5">Variable</th>
				<th class="col-md-5">Rodaje</th>
				<th class="col-md-5">Tipo Empleador</th>
				<th class="col-md-5">Centro Costo</th>
				<th class="col-md-5">Caso Médico</th>
				<th class="col-md-5">Observaciones</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($contratos as $contrato)
			<tr>
				<td>{{ $contrato -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $contrato -> tipocontrato -> TICO_DESCRIPCION }}</td>
				<td>{{ $contrato -> clasecontrato -> CLCO_DESCRIPCION }}</td>
				<td>{{ $contrato -> prospecto -> PROS_CEDULA }}</td>
				<td>{{ nombre_empleado($contrato->PROS_ID) }}</td>
				<td>{{ number_format($contrato->CONT_SALARIO, 0) }}</td>
				<td>{{ $contrato -> cargo -> CARG_DESCRIPCION }}</td>
				<td>{{ $contrato -> estadocontrato -> ESCO_DESCRIPCION  }}</td>
				<td>{{ $contrato -> CONT_FECHAINGRESO }}</td>
				<td>{{ $contrato -> CONT_FECHARETIRO }}</td>
				<td>{{ $contrato-> motivoretiro -> MORE_DESCRIPCION or null }}</td>
				<td>{{ $contrato -> CONT_VARIABLE }}</td>
				<td>{{ $contrato -> CONT_RODAJE }}</td>
				<td>{{ $contrato -> tipoempleador -> TIEM_DESCRIPCION  }}</td>
				<td>{{ $contrato -> centrocosto -> CECO_DESCRIPCION  }}</td>
				<td>{{ $contrato -> CONT_CASOMEDICO }}</td>
				<td>{{ $contrato -> CONT_OBSERVACIONES }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.contratos.edit', [ 'CONT_ID' => $contrato->CONT_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $contrato->PROS_ID,
						'data-modelo'=> str_upperspace(class_basename($contrato)),
						'data-descripcion'=> $contrato->CONT_ID . " - " . nombre_empleado($contrato->PROS_ID) ,
						'data-action'=>'contratos/'. $contrato->PROS_ID,
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
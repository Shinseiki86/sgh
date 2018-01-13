@extends('layouts.menu')
@section('title', '/ Casos Médicos')
@include('widgets.datatable.datatable-export')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Casos Médicos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-casosmedicos.casosmedicos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-2">Empresa</th>
				<th class="col-md-1">Temporal</th>
				<th class="col-md-1">Cedula</th>
				<th class="col-md-3">Empleado</th>
				<th class="col-md-3">Estado de Contrato</th>
				<th class="col-md-2">Cargo</th>
				<th class="col-md-2">Salario</th>
				<th class="col-md-2">Turno</th>
				<th class="col-md-1">Fecha de Restricción</th>
				<th class="col-md-1">Estado Restricción</th>
				<th class="col-md-3">DX General</th>
				<th class="col-md-3">DX Especifico</th>
				<th class="col-md-3">PCL</th>
				<th class="col-md-1">Contingencia</th>
				<th class="col-md-1">Lugar de Reubicación</th>
				<th class="col-md-1">Labor</th>
				<th class="col-md-1">Fecha de Nacimiento</th>
				<th class="col-md-1">Sexo</th>
				<th class="col-md-1">Observaciones</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($casosmedicos as $casomedico)
			<tr>
				<td>{{ $casomedico -> contrato -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $casomedico -> contrato -> temporal -> TEMP_NOMBRECOMERCIAL or null }}</td>
				<td>{{ $casomedico -> contrato -> prospecto -> PROS_CEDULA }}</td>
				<td>{{ $casomedico -> contrato -> prospecto -> nombre_completo }}</td>
				<td>{{ $casomedico -> contrato -> estadocontrato -> ESCO_DESCRIPCION }}</td>
				<td>{{ $casomedico -> contrato -> cargo -> CARG_DESCRIPCION }}</td>
				<td>{{ number_format($casomedico -> contrato -> CONT_SALARIO, 0) }}</td>
				<td>{{ $casomedico -> contrato -> turno -> TURN_DESCRIPCION or null}}</td>
				<td>{{ $casomedico -> CAME_FECHARESTRICCION }}</td>
				<td>{{ $casomedico -> estadorestriccion -> ESRE_DESCRIPCION }}</td>
				<td>{{ $casomedico -> diagnosticogeneral -> DIGE_DESCRIPCION }}</td>
				<td>{{ $casomedico -> CAME_DIAGESPECIFICO }}</td>
				<td>{{ $casomedico -> CAME_PCL . '%' }}</td>
				<td>{{ $casomedico -> CAME_CONTINGENCIA }}</td>
				<td>{{ $casomedico -> CAME_LUGARREUBICACION }}</td>
				<td>{{ $casomedico -> CAME_LABOR }}</td>
				<td>{{ $casomedico -> contrato -> prospecto -> PROS_FECHANACIMIENTO }}</td>
				<td>{{ $casomedico -> contrato -> prospecto -> PROS_SEXO }}</td>
				<td>{{ $casomedico -> CAME_OBSERVACIONES }}</td>
				<td>{{ $casomedico -> CAME_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-casosmedicos.casosmedicos.edit', [ 'CAME_ID' => $casomedico->CAME_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $casomedico->CAME_ID,
						'data-modelo'=> str_upperspace(class_basename($casomedico)),
						'data-descripcion'=> $casomedico -> contrato -> prospecto -> nombre_completo,
						'data-action'=>'casosmedicos/'. $casomedico->CAME_ID,
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
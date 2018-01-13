@extends('layouts.menu')
@section('title', '/ Novedades de Seguimiento')
@include('widgets.datatable.datatable-export')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Novedades de Seguimiento
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-casosmedicos.novedadesmedicas.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
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
				<th class="col-md-1">Fecha de Novedad</th>
				<th class="col-md-2">Novedad</th>
				<th class="col-md-2">Observaciones</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($novedadesmedicas as $novedadmedica)
			<tr>
				<td>{{ $novedadmedica -> casomedico -> contrato -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $novedadmedica -> casomedico -> contrato -> temporal -> TEMP_NOMBRECOMERCIAL or null }}</td>
				<td>{{ $novedadmedica -> casomedico -> contrato -> prospecto -> PROS_CEDULA }}</td>
				<td>{{ $novedadmedica -> casomedico -> contrato -> prospecto -> nombre_completo }}</td>
				<td>{{ $novedadmedica -> NOME_FECHANOVEDAD }}</td>
				<td>{{ $novedadmedica -> NOME_DESCRIPCION }}</td>
				<td>{{ $novedadmedica -> NOME_OBSERVACIONES }}</td>
				<td>{{ $novedadmedica -> NOME_CREADOPOR}}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-casosmedicos.novedadesmedicas.edit', [ 'NOME_ID' => $novedadmedica->NOME_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $novedadmedica->NOME_ID,
						'data-modelo'=> str_upperspace(class_basename($novedadmedica)),
						'data-descripcion'=> $novedadmedica -> casomedico -> contrato -> prospecto -> nombre_completo,
						'data-action'=>'novedadesmedicas/'. $novedadmedica->NOME_ID,
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
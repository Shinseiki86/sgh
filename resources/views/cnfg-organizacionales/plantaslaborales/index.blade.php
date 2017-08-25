@extends('layouts.menu')
@section('title', '/ Plantas Laborales')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Plantas Laborales
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-organizacionales.plantaslaborales.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-4">Empleador</th>
				<th class="col-md-4">Cargo</th>
				<th class="col-md-4">Cantidad</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($plantaslaborales as $plantalaboral)
			<tr>
				<td>{{ $plantalaboral -> empleador -> EMPL_RAZONSOCIAL }}</td>
				<td>{{ $plantalaboral -> cargo -> CARG_DESCRIPCION }}</td>
				<td>{{ $plantalaboral -> PALA_CANTIDAD }}</td>
				<td>{{ $plantalaboral -> PALA_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-organizacionales.plantaslaborales.edit', [ 'PALA_ID' => $plantalaboral->PALA_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $plantalaboral->PALA_ID,
						'data-modelo'=> str_upperspace(class_basename($plantalaboral)),
						'data-descripcion'=> $plantalaboral->GRUP_DESCRIPCION,
						'data-action'=>'plantaslaborales/'. $plantalaboral->PALA_ID,
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
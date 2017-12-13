@extends('layouts.menu')
@section('title', '/ Movimientos de Plantas')
@include('datatable-export')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Movimientos de Plantas
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-organizacionales.movimientosplantas.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-4">Fecha de Movimiento</th>
				<th class="col-md-4">Motivo de Movimiento</th>
				<th class="col-md-4">Cantidad</th>
				<th class="col-md-4">Observaciones</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($movimientosplantas as $movimientoplanta)
			<tr>
				<td>{{ $movimientoplanta -> MOPL_FECHAMOVIMIENTO }}</td>	
				<td>{{ $movimientoplanta -> MOPL_MOTIVO }}</td>
				<td>{{ $movimientoplanta -> MOPL_CANTIDAD }}</td>
				<td>{{ $movimientoplanta -> MOPL_OBSERVACIONES }}</td>
				<td>{{ $movimientoplanta -> MOPL_CREADOPOR }}</td>
				<td>

					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-organizacionales.movimientosplantas.edit', [ 'MOPL_ID' => $movimientoplanta->MOPL_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $movimientoplanta->MOPL_ID,
						'data-modelo'=> str_upperspace(class_basename($movimientoplanta)),
						'data-descripcion'=> $movimientoplanta->plantalaboral->empleador->EMPL_NOMBRECOMERCIAL . ' - ' .  $movimientoplanta->plantalaboral->cargo->CARG_DESCRIPCION . ' - ' .  $movimientoplanta->MOPL_CANTIDAD,
						'data-action'=>'movimientosplantas/'. $movimientoplanta->MOPL_ID,
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
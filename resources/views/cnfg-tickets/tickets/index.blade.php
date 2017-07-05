@extends('layouts.menu')
@section('title', '/ Tickets')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Tickets
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-tickets.tickets.create') }}" data-tooltip="tooltip" title="Crear Categoría">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5"> Nombre </th>
				<th class="col-md-5"> Estado </th>
				<th class="col-md-5"> Prioridad </th>
				<th class="col-md-5"> Categoria </th>
				<th class="col-md-5"> Fecha Solicitud </th>
				<th class="col-md-5"> Fecha Cumplimiento </th>
				<th class="hidden-xs col-md-2">Creado por</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($tickets as $ticket)
			<tr>
				<td>{{ $ticket -> contrato -> prospecto -> PROS_PRIMERNOMBRE }}</td>
				<td>{{ $ticket -> estadoticket -> ESTI_DESCRIPCION }}</td>
				<td>{{ $ticket -> prioridad -> PRIO_DESCRIPCION }}</td>
				<td>{{ $ticket -> categoria -> CATE_DESCRIPCION }}</td>
				<td>{{ $ticket -> TICK_FECHASOLICITUD }}</td>
				<td>{{ $ticket -> TICK_FECHACUMPLIMIENTO }}</td>
				<td>{{ $ticket -> TICK_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-tickets.tickets.edit', [ 'TICK_ID' => $ticket->TICK_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $ticket->TICK_ID,
						'data-modelo'=> str_upperspace(class_basename($ticket)),
						'data-descripcion'=> $ticket->TICK_DESCRIPCION,
						'data-action'=> 'tickets/'.$ticket->TICK_ID,
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
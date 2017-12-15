@extends('layouts.menu')
@section('title', '/ Tickets')

@include('widgets.datatable.datatable-export')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Tickets
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-tickets.tickets.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5 all">Empleador</th>
				<th class="col-md-5 all">Empleado</th>
				<th class="col-md-5 all">Estado</th>
				<th class="col-md-5">Tipo de Incidente</th>
				<th class="col-md-5">Prioridad</th>
				<th class="col-md-5">Categoria</th>
				<th class="col-md-1 all">Fecha Evento</th>
				<th class="col-md-1">Fecha Solicitud</th>
				<th class="col-md-1">Fecha Aprobación o Rechazo</th>
				<th class="col-md-1">Fecha Cierre</th>
				<th class="col-md-1">Estado Aprobación</th>
				<th class="col-md-1">Grupo</th>
				<th class="col-md-1">Turno</th>
        		<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
			<tr>
			 <td>{{ $ticket -> contrato-> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ nombre_empleado($ticket -> contrato -> prospecto -> PROS_ID)  }}</td>
				<td>{{ $ticket -> estadoticket -> ESTI_DESCRIPCION }}</td>
				<td>{{ $ticket -> tipoincidente -> TIIN_DESCRIPCION }}</td>
				<td>{{ $ticket -> prioridad -> PRIO_DESCRIPCION }}</td>
				<td>{{ $ticket -> categoria -> CATE_DESCRIPCION }}</td>
				<td>{{ $ticket -> TICK_FECHAEVENTO }}</td>
				<td>{{ $ticket -> TICK_FECHASOLICITUD }}</td>
				<td>{{ $ticket -> TICK_FECHAAPROBACION }}</td>
				<td>{{ $ticket -> TICK_FECHACIERRE }}</td>
				<td>{{ $ticket -> estadoaprobacion -> ESAP_DESCRIPCION }}</td>
				<td>{{ $ticket -> grupo -> GRUP_DESCRIPCION or null }}</td>
				<td>{{ $ticket -> turno -> TURN_DESCRIPCION or null}}</td>

				<td>
					<!-- Botón Ver (show) -->
 					<a class="btn btn-small btn-basic btn-xs" href="{{ route('cnfg-tickets.tickets.show', [ 'TICK_ID' => $ticket->TICK_ID ] ) }}" data-tooltip="tooltip" title="Ver">
 						<i class="fa fa-eye" aria-hidden="true"></i>
 					</a>

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
						'data-descripcion'=> $ticket->TICK_ID,
						'data-action'=>'tickets/'. $ticket->TICK_ID,
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
	{{--
	@include('widgets.datatable.datatable-ajax', ['urlAjax'=>'getTickets', 'columns'=>[
		'EMPL_NOMBRECOMERCIAL',
		'PROS_NOMBRESAPELLIDOS',
		'ESTI_DESCRIPCION',
		'TIIN_DESCRIPCION',
		'PRIO_DESCRIPCION',
		'CATE_DESCRIPCION',
		'TICK_FECHAEVENTO',
		'TICK_FECHASOLICITUD',
		'TICK_FECHAAPROBACION',
		'TICK_FECHACIERRE',
		'ESAP_DESCRIPCION',
		'GRUP_DESCRIPCION',
		'TURN_DESCRIPCION',
		'TICK_CREADOPOR',
	]])
	--}}
@endsection
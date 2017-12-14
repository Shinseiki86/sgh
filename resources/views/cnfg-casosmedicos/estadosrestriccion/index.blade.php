@extends('layouts.menu')
@section('title', '/ Estados de Restricción')
@include('widgets.datatable.datatable-export')


@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Estados de Restricción
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-casosmedicos.estadosrestriccion.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
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
				<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($estadosrestricciones as $estadorestriccion)
			<tr>
				<td>{{ $estadorestriccion -> ESRE_DESCRIPCION }}</td>
				<td>{{ $estadorestriccion -> ESRE_OBSERVACIONES }}</td>
				<td>{{ $estadorestriccion -> ESRE_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-casosmedicos.estadosrestriccion.edit', [ 'ESRE_ID' => $estadorestriccion->ESRE_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $estadorestriccion->ESRE_ID,
						'data-modelo'=> str_upperspace(class_basename($estadorestriccion)),
						'data-descripcion'=> $estadorestriccion->ESRE_DESCRIPCION,
						'data-action'=>'estadosrestriccion/'. $estadorestriccion->ESRE_ID,
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
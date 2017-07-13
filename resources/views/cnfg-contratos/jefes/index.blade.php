@extends('layouts.menu')
@section('title', '/ Jefes')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Jefes
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-contratos.jefes.create') }}" data-tooltip="tooltip" title="Crear Categoría">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5"> Jefe </th>
				<th class="col-md-5"> Observaciones </th>
				<th class="hidden-xs col-md-2">Creado por</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($jefes as $jefe)
			<tr>
				<td>{{ nombre_empleado ($jefe -> PROS_ID )}}</td>
				<td>{{ $jefe -> JEFE_OBSERVACIONES }}</td>
				<td>{{ $jefe -> JEFE_CREADOPOR }}</td>
				<td>

					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-contratos.jefes.edit', [ 'JEFE_ID' => $jefe->JEFE_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $jefe->JEFE_ID,
						'data-modelo'=> str_upperspace(class_basename($jefe)),
						'data-descripcion'=> nombre_empleado($jefe->PROS_ID),
						'data-action'=> 'jefes/'.$jefe->JEFE_ID,
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
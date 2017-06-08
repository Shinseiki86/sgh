@extends('layouts.admin')
@section('title', '/ Gerencias')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Gerencias
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.gerencias.create') }}" data-tooltip="tooltip" title="Crear Cargo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">Empresa</th>
				<th class="col-md-5">Descripción</th>
				<th class="col-md-5">Observaciones</th>
				<th class="hidden-xs col-md-2">Creado por</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($gerencias as $gerencia)
			<tr>
				<td>{{ $gerencia -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $gerencia -> GERE_DESCRIPCION }}</td>
				<td>{{ $gerencia -> GERE_OBSERVACIONES }}</td>
				<td>{{ $gerencia -> GERE_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.gerencias.edit', [ 'GERE_ID' => $gerencia->GERE_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $gerencia->GERE_ID,
						'data-modelo'=> str_upperspace(class_basename($gerencia)),
						'data-descripcion'=> $gerencia->GERE_DESCRIPCION,
						'data-action'=>'gerencias/'. $gerencia->GERE_ID,
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
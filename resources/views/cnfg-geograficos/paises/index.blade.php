@extends('layouts.menu')
@section('title', '/ Países')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Países
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-geograficos.paises.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="hidden-xs col-md-1">ID</th>
				<th class="col-md-1">Código</th>
				<th class="col-md-5">Nombre</th>
				<th class="col-md-1">Departamentos</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($paises as $pais)
			<tr>
				<td>{{ $pais -> PAIS_ID }}</td>
				<td>{{ $pais -> PAIS_CODIGO }}</td>
				<td>{{ $pais -> PAIS_NOMBRE }}</td>
				<td>{{ $pais -> departamentos -> count() }}</td>
				<td>{{ $pais -> PAIS_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('cnfg-geograficos.paises.edit', [ 'PAIS_ID' => $pais->PAIS_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $pais->PAIS_ID,
						'data-modelo'=> str_upperspace(class_basename($pais)),
						'data-descripcion'=> $pais->PAIS_NOMBRE,
						'data-action'=>'paises/'. $pais->PAIS_ID,
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
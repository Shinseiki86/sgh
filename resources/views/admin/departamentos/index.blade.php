@extends('layouts.admin')
@section('title', '/ Departamentos')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Departamentos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.departamentos.create') }}" data-tooltip="tooltip" title="Crear Tipo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $departamentos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$departamentos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="hidden-xs col-md-1">@sortablelink('DEPA_ID', 'ID')</th>
				<th class="col-md-1">@sortablelink('DEPA_CODIGO', 'Código')</th>
				<th class="col-md-5">@sortablelink('DEPA_DESCRIPCION', 'Descripción')</th>
				<th class="col-md-1">@sortablelink('countCiudades', 'Ciudades')</th>
				<th class="hidden-xs col-md-2">@sortablelink('DEPA_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($departamentos as $departamento)
			<tr>
				<td>{{ $departamento -> DEPA_ID }}</td>
				<td>{{ $departamento -> DEPA_CODIGO }}</td>
				<td>{{ $departamento -> DEPA_DESCRIPCION }}</td>
				<td>{{ $departamento -> ciudades -> count() }}</td>
				<td>{{ $departamento -> DEPA_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.departamentos.edit', [ 'DEPA_ID' => $departamento->DEPA_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $departamento->DEPA_ID,
						'data-modelo'=> str_upperspace(class_basename($departamento)),
						'data-descripcion'=> $departamento->DEPA_DESCRIPCION,
						'data-action'=>'departamentos/'. $departamento->DEPA_ID,
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
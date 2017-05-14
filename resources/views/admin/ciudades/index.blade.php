@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Ciudades
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.ciudades.create') }}" data-tooltip="tooltip" title="Crear Tipo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $ciudades->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$ciudades->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="hidden-xs col-md-1">@sortablelink('CIUD_ID', 'ID')</th>
				<th class="col-md-1">@sortablelink('CIUD_CODIGO', 'Código')</th>
				<th class="col-md-4">@sortablelink('CIUD_DESCRIPCION', 'Descripción')</th>
				<th class="col-md-4">@sortablelink('departamento.DEPA_DESCRIPCION', 'Departamento')</th>
				<th class="hidden-xs col-md-2">@sortablelink('CIUD_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($ciudades as $ciudad)
			<tr>
				<td>{{ $ciudad -> CIUD_ID }}</td>
				<td>{{ $ciudad -> CIUD_CODIGO }}</td>
				<td>{{ $ciudad -> CIUD_DESCRIPCION }}</td>
				<td>{{ $ciudad -> departamento -> DEPA_DESCRIPCION }}</td>
				<td>{{ $ciudad -> CIUD_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.ciudades.edit', [ 'CIUD_ID' => $ciudad->CIUD_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $ciudad->CIUD_ID,
						'data-modelo'=> str_upperspace(class_basename($ciudad)),
						'data-descripcion'=> $ciudad->CIUD_DESCRIPCION,
						'data-action'=>'ciudades/'. $ciudad->CIUD_ID,
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
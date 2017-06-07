@extends('layouts.admin')
@section('title', '/ Temporales')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Empresas Temporales
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.temporales.create') }}" data-tooltip="tooltip" title="Crear C.N.O">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $temporales->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$temporales->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('TEMP_RAZONSOCIAL', 'Razón Social')</th>
				<th class="col-md-5">@sortablelink('TEMP_NOMBRECOMERCIAL', 'Nombre Comercial')</th>
				<th class="col-md-5">@sortablelink('TEMP_DIRECCION', 'Dirección')</th>
				<th class="hidden-xs col-md-2">@sortablelink('TEMP_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($temporales as $temporal)
			<tr>
				<td>{{ $temporal -> TEMP_RAZONSOCIAL }}</td>
				<td>{{ $temporal -> TEMP_NOMBRECOMERCIAL }}</td>
				<td>{{ $temporal -> TEMP_DIRECCION }}</td>
				<td>{{ $temporal -> TEMP_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.temporales.edit', [ 'TEMP_ID' => $temporal->TEMP_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $temporal->TEMP_ID,
						'data-modelo'=> str_upperspace(class_basename($temporal)),
						'data-descripcion'=> $temporal->TEMP_RAZONSOCIAL,
						'data-action'=>'temporales/'. $temporal->TEMP_ID,
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
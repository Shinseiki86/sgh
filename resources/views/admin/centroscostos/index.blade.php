@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Centros de costos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.centroscostos.create') }}" data-tooltip="tooltip" title="Crear Cargo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $centroscostos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$centroscostos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('EMPL_ID', 'Empresa')</th>
				<th class="col-md-5">@sortablelink('GERE_ID', 'Gerencia')</th>
				<th class="col-md-5">@sortablelink('CECO_CODIGO', 'Codigo')</th>
				<th class="col-md-5">@sortablelink('CECO_DESCRIPCION', 'Descripción')</th>
				<th class="hidden-xs col-md-2">@sortablelink('CECO_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($centroscostos as $centrocosto)
			<tr>
				<td>{{ $centrocosto -> gerencia -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $centrocosto -> gerencia -> GERE_DESCRIPCION }}</td>
				<td>{{ $centrocosto -> CECO_CODIGO }}</td>
				<td>{{ $centrocosto -> CECO_DESCRIPCION }}</td>
				<td>{{ $centrocosto -> CECO_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.centroscostos.edit', [ 'CECO_ID' => $centrocosto->CECO_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $centrocosto->CECO_ID,
						'data-modelo'=> str_upperspace(class_basename($centrocosto)),
						'data-descripcion'=> $centrocosto->CECO_DESCRIPCION,
						'data-action'=>'centroscostos/'. $centrocosto->CECO_ID,
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
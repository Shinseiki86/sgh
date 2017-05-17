@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Clasif. de Ocupaciones
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.cnos.create') }}" data-tooltip="tooltip" title="Crear C.N.O">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $cnos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$cnos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="hidden-xs col-md-1">@sortablelink('CNOS_ID', 'ID')</th>
				<th class="col-md-1">@sortablelink('CNOS_CODIGO', 'Código')</th>
				<th class="col-md-5">@sortablelink('CNOS_DESCRIPCION', 'Descripción')</th>
				<th class="col-md-5">@sortablelink('CNOS_OBSERVACIONES', 'Observaciones')</th>
				<th class="hidden-xs col-md-2">@sortablelink('CNOS_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($cnos as $cno)
			<tr>
				<td>{{ $cno -> CNOS_ID }}</td>
				<td>{{ $cno -> CNOS_CODIGO }}</td>
				<td>{{ $cno -> CNOS_DESCRIPCION }}</td>
				<td>{{ $cno -> CNOS_OBSERVACIONES }}</td>
				<td>{{ $cno -> CNOS_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.cnos.edit', [ 'CNOS_ID' => $cno->CNOS_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $cno->CNOS_ID,
						'data-modelo'=> str_upperspace(class_basename($cno)),
						'data-descripcion'=> $cno->CNOS_DESCRIPCION,
						'data-action'=>'cnos/'. $cno->CNOS_ID,
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
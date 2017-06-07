@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Contratos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.contratos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $contratos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$contratos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('EMPL_ID', 'Empleador')</th>
				<th class="col-md-5">@sortablelink('TIEM_ID', 'Tipo Empleador')</th>
				<th class="col-md-5">@sortablelink('PROS_ID', 'Cedula')</th>
				<th class="col-md-5">@sortablelink('PROS_PRIMERNOMBRE', 'Nombre')</th>
				<th class="col-md-5">@sortablelink('CONT_SALARIO', 'Salario')</th>
				<th class="col-md-5">@sortablelink('CONT_CARGO', 'Cargo')</th>
				<th class="col-md-5">@sortablelink('ESCO_ID', 'Estado')</th>
				<th class="col-md-5">@sortablelink('CONT_FECHAINGRESO', 'Fecha Ingreso')</th>
				<th class="col-md-5">@sortablelink('CONT_FECHARETIRO', 'Fecha Retiro')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($contratos as $contrato)
			<tr>
				<td>{{ $contrato -> empleador -> EMPL_NOMBRECOMERCIAL }}</td>
				<td>{{ $contrato -> tipoempleador -> TIEM_DESCRIPCION }}</td>
				<td>{{ $contrato -> prospecto -> PROS_CEDULA }}</td>
				<td>{{ nombre_empleado($contrato->PROS_ID) }}</td>
				<td>{{ number_format($contrato->CONT_SALARIO, 0) }}</td>
				<td>{{ $contrato -> cargo -> CARG_DESCRIPCION }}</td>
				<td>{{ $contrato -> estadocontrato -> ESCO_DESCRIPCION  }}</td>
				<td>{{ $contrato -> CONT_FECHAINGRESO }}</td>
				<td>{{ $contrato -> CONT_FECHARETIRO }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.contratos.edit', [ 'CONT_ID' => $contrato->CONT_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $contrato->PROS_ID,
						'data-modelo'=> str_upperspace(class_basename($contrato)),
						'data-descripcion'=> $contrato->CONT_ID . " - " . nombre_empleado($contrato->PROS_ID) ,
						'data-action'=>'contratos/'. $contrato->PROS_ID,
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
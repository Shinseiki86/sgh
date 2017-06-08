@extends('layouts.admin')
@section('title', '/ TNL - Incapacidades')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			TNL - Incapacidades
		</div>

		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.uploads.create') }}" data-tooltip="tooltip" title="Nueva Validación">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>


	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $incaps->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$incaps->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="hidden-xs col-md-1">EMPRESA</th>
				<th class="col-md-1">IDENTIFICACION</th>
				<th class="col-md-5">NOMBRE</th>
				<th class="col-md-5">FECHA INI</th>
				<th class="col-md-5">DÍAS</th>
				<th class="col-md-5">FECHA FIN</th>
				<th class="col-md-5">CONTING.</th>
				<th class="col-md-5">PRIMER DÍA AT</th>
				<th class="col-md-1">DOCUMENTO</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($incaps as $incap)
			<tr>
				<td>{{ $incap -> INCA_EMPRESA }}</td>
				<td>{{ $incap -> INCA_IDENTIFICACION }}</td>
				<td>{{ $incap -> INCA_NOMBREEMPLEADO }}</td>
				<td>{{ $incap -> INCA_FECHAINICIO }}</td>
				<td>{{ $incap -> INCA_TOTALDIAS }}</td>
				<td>{{ $incap -> INCA_FECHAFINAL }}</td>
				<td>{{ $incap -> INCA_CONTINGENCIA }}</td>
				<td>{{ $incap -> INCA_PRIMERDIAAT }}</td>
				<td>{{ $incap -> INCA_DOCUMENTO }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.uploads.edit', [ 'DEPA_ID' => $incap->DEPA_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'class'=>'btn btn-xs btn-danger btn-delete',
						'data-toggle'=>'modal',
						'data-id'=> $incap->DEPA_ID,
						'data-modelo'=> str_upperspace(class_basename($incap)),
						'data-descripcion'=> $incap->DEPA_DESCRIPCION,
						'data-action'=>'incaps/'. $incap->DEPA_ID,
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
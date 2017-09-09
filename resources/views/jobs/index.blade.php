@extends('layouts.menu')
@section('title', '/ Países')

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
				<th class="col-md-1">Código</th>
				<th class="col-md-5">Nombre</th>
				<th class="col-md-1">Departamentos</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all"></th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	@include('widgets/modal-delete')
	@include('datatable-ajax', ['urlAjax'=>'getPaises', 'columns'=>[
		'PAIS_CODIGO',
		'PAIS_NOMBRE',
		'DEPARTAMENTOS_COUNT',
		'PAIS_CREADOPOR',
	]])	
@endsection
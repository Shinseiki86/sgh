@extends('layouts.menu')
@section('title', '/ Contratos')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Contratos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('gestion-humana.contratos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table" id="tabla">
		<thead>
			<tr>
				{{-- <th class="col-md-5">ID</th> --}}
				<th class="col-md-5">Empleador</th>
				<th class="col-md-5">E.S.T</th>
				<th class="col-md-5">Tipo Contrato</th>
				<th class="col-md-5">Clase Contrato</th>
				<th class="col-md-5">Cedula</th>
				<th class="col-md-5">Nombre</th>
				<th class="col-md-5">Salario</th>
				<th class="col-md-5">Cargo</th>
				{{-- <th class="col-md-5">Estado ID</th> --}}
				<th class="col-md-5">Estado</th>
				<th class="col-md-5">Fecha Ingreso</th>
				<th class="col-md-5">Fecha Retiro</th>
				<th class="col-md-5">Fecha Graba Retiro</th>
				<th class="col-md-5">Motivo Retiro</th>
				<th class="col-md-5">Variable</th>
				<th class="col-md-5">Rodaje</th>
				<th class="col-md-5">Tipo Empleador</th>
				<th class="col-md-5">Riesgo</th>
				<th class="col-md-5">Gerencia</th>
				<th class="col-md-5">Negocio</th>
				<th class="col-md-5">Centro Costo</th>
				<th class="col-md-5">Grupo de Empleado</th>
				<th class="col-md-5">Turno</th>
				<th class="col-md-5">Caso Médico</th>
				<th class="col-md-5">Jefe</th>
				<th class="col-md-5">Remplaza a</th>
				<th class="col-md-5">Ciudad Contrato</th>
				<th class="col-md-5">Ciudad Servicio</th>
				<th class="col-md-5">Observaciones</th>
				<th class="col-md-5">Observaciones Retiro</th>
				<th class="col-md-5">Creado</th>
				<th class="col-md-1 all notFilter"></th>
			</tr>
		</thead>

{{--
		<tr class="{{ ($contrato->ESCO_ID == 1) ? '' : 'danger' }}">
		</tr>
--}}
	</table>

	@include('widgets/modal-delete')
	@include('widgets.datatable.datatable-ajax', ['urlAjax'=>'getContratos', 'columns'=>[
		//'CONT_ID',
		'EMPL_NOMBRECOMERCIAL',
		'TEMP_NOMBRECOMERCIAL',
		'TICO_DESCRIPCION',
		'CLCO_DESCRIPCION',
		'PROS_CEDULA',
		'PROS_NOMBRESAPELLIDOS',
		'CONT_SALARIO',
		'CARG_DESCRIPCION',
		//'CONTRATOS.ESCO_ID',
		'ESCO_DESCRIPCION',
		'CONT_FECHAINGRESO',
		'CONT_FECHATERMINACION',
		'CONT_FECHAGRABARETIRO',
		'MORE_DESCRIPCION',
		'CONT_VARIABLE',
		'CONT_RODAJE',
		'TIEM_DESCRIPCION',
		'RIES_DESCRIPCION',
		'GERE_DESCRIPCION',
		'NEGO_DESCRIPCION',
		'CECO_DESCRIPCION',
		'GRUP_DESCRIPCION',
		'TURN_DESCRIPCION',
		'CONT_CASOMEDICO',
		'JEFE_NOMBRESAPELLIDOS',
		'REMP_NOMBRESAPELLIDOS',
		'CIUD_CONTRATO',
		'CIUD_SERVICIO',
		'CONT_OBSERVACIONES',
		'CONT_MOREOBSERVACIONES',
		'CONT_CREADOPOR',
	]])
@endsection
@extends('layouts.menu')

@section('title', '/ Ciudades')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Ciudades
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-geograficos.ciudades.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="lista">
		<thead>
			<tr>
				<th class="col-md-1">Código</th>
				<th class="col-md-4">Nombre</th>
				<th class="col-md-4">Departamento</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all">Acciones</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	@include('widgets/modal-delete')
@endsection

@section('cssdatatable')
	{!! Html::style('assets/stylesheets/datatable/buttons.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/buttons.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/dataTables.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.bootstrap.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/rowReorder.dataTables.min.css') !!}
@endsection

@section('datatable')
	{!! Html::script('assets/scripts/datatable/jquery.dataTables.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/responsive.bootstrap.min.js') !!}
	{!! Html::script('assets/scripts/datatable/jszip.min.js') !!}
	{!! Html::script('assets/scripts/datatable/pdfmake.min.js') !!}
	{!! Html::script('assets/scripts/datatable/vfs_fonts.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.html5.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.colVis.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.flash.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.print.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.rowReorder.min.js') !!}
	<script>
		$(document).ready(function(){
			$('#lista').DataTable({
				processing: true,
				serverSide: true,
				ajax: 'getCiudades',
				sScrollY: '350px',
				bScrollCollapse: true,
				rowReorder: false,
				columns: [
					{data:'CIUD_CODIGO'},
					{data:'CIUD_NOMBRE'},
					{data:'departamento.DEPA_NOMBRE'},
					//{data:'CIUD_CREADOPOR'},
					{data:'CIUD_CREADOPOR'},
					{data:'action'}
				],
				lengthMenu: [[5, 10, 15, 25,50,100], [5, 10, 15, 25,50,100]],
				//sScrollY: '350px',
				//pagingType: 'full_numbers',
				pagingType: 'simple_numbers',
				responsive: true,
				language: { 
					sProcessing:     'Procesando...', 
					sLengthMenu:     'Mostrar _MENU_ registros', 
					sZeroRecords:    'No se encontraron resultados', 
					sEmptyTable:     'Ningún dato disponible en esta tabla', 
					sInfo:           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros', 
					sInfoEmpty:      'Mostrando registros del 0 al 0 de un total de 0 registros', 
					sInfoFiltered:   '(filtrado de un total de _MAX_ registros)', 
					//sInfoPostFix:    '', 
					sSearch:         'Buscar:', 
					//sUrl:            '', 
					sInfoThousands:  ',', 
					sLoadingRecords: 'Cargando...', 
					oPaginate: { 
						sFirst:    'Primero', 
						sLast:     'Último', 
						sNext:     'Siguiente', 
						sPrevious: 'Anterior'
					} 
				}
			});
		});
	</script>
@endsection

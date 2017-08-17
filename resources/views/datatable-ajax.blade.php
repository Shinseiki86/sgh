@push('head')
	{!! Html::style('assets/stylesheets/datatable/buttons.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.dataTables.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/buttons.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/dataTables.bootstrap4.min.css') !!}
	{!! Html::style('assets/stylesheets/datatable/responsive.bootstrap.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/datatable/jquery.dataTables.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/scripts/datatable/buttons.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/dataTables.bootstrap4.min.js') !!}
	{!! Html::script('assets/scripts/datatable/responsive.bootstrap.min.js') !!}

	<script>
		$(document).ready(function(){
			$('#tabla').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{$urlAjax}}',
				sScrollY: '350px',
				bScrollCollapse: true,
				rowReorder: false,
				columns: [
				@foreach($columns as $col)
					{data:'{{$col}}'},
				@endforeach
				],
				lengthMenu: [[5, 10, 15, 25,50,100], [5, 10, 15, 25,50,100]],
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
				},
				drawCallback : function(settings) {
					//Carga de datos a mensajes modales para eliminar registros	
					$('.btn-delete').on('click', function(event){
						var modal = $('#pregModalDelete');
						var button = $(event.currentTarget); // Button that triggered the modal
						var id = button.data('id'); // Se obtiene valor en data-id
						modal.find('.id').text(id); //Se asigna en la etiqueta con clase id

						var modelo = button.data('modelo');
						modal.find('.modelo').html(modelo);

						var descripcion = button.data('descripcion');
						modal.find('.descripcion').html(descripcion);

						var urlForm = button.data('action'); // Se cambia acción del formulario.
						modal.find('.frmModal').attr('action', urlForm);
					});
					//Muestra Tooltips de boostrap
					tooltips = $('[data-tooltip="tooltip"]');
					if(tooltips.length > 0)
						tooltips.tooltip();
			  	}
			});
		});
	</script>
@endpush

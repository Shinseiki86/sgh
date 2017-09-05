@extends('layouts.menu')
@section('title', '/ Detalle Ticket')

@push('head')
{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@endpush

@push('scripts')
{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
<script type="text/javascript">

		//===================================================================
		var options = {
			/*
			disable_search_threshold: 5,
			width: '100%',
			placeholder_text_single: 'Seleccione una opción',
			placeholder_text_multiple: 'Seleccione algunas opciones',
			*/
			no_results_text: 'Ningún resultado coincide.'
		};

		//para volver los select mucho mas amigables en listas grandes de datos
		$(".chosen-select").chosen(options);
		//===================================================================


		//===================================================================
		//se encarga de mostrar la imagen y/o archivo
		$("#imagenModal").on("click", function() {

			var tickarchivo =  "{{ $ticket -> TICK_ARCHIVO }}";
			var src = "{{asset('storages/' . $ticket -> TICK_ARCHIVO )}}";

			if(tickarchivo == "" || tickarchivo == null){
				src = "{{asset('storages/' . 'default.jpg' )}}";

				$('#imagepreview').attr('src', src );
				$('#imagemodal').modal('show');

				$('#btndescargar').hide();
				$('#psinarchivos').show();

			}else{

				var img = new Image();
				img.src = src;

				if(!img.complete){
					src = "{{asset('storages/' . 'filedefault.png' )}}";
					$('#imagepreview').attr('src', src);
					$('#imagemodal').modal('show'); 

				}else{
					src = "{{asset('storages/' . $ticket -> TICK_ARCHIVO )}}";
					$('#imagepreview').attr('src', src); 
					$('#imagemodal').modal('show'); 
				}


				$('#pconarchivos').show();
			}



		});
		//===================================================================


		//===================================================================
		//modal para autorizar el ticket
		$("#autorizarModal").on("click", function() {

			$('#autorizarmodal').modal('show');

		});
		//===================================================================

		//===================================================================
		//modal para rechazar el ticket
		$("#rechazarModal").on("click", function() {

			$('#rechazarmodal').modal('show');

		});
		//===================================================================


		//===================================================================
		//si el estado de aprobación es diferente del inicial cuando se creae el ticket
		//se esconden los botones
		var ESAP_ID = "{{ $ticket -> ESAP_ID }}";
		
		if(ESAP_ID != 1){


			$('#daccionauto').hide();
			$('#daccionrecha').hide();

		}else if(ESAP_ID == 1){

			$('#daccioncerrar').hide();

		}
		//===================================================================

		//===================================================================
		//modal para rechazar el ticket
		$("#cerrarModal").on("click", function() {

			$('#cerrarmodal').modal('show');

		});
		//===================================================================		


	</script>
@endpush


	@section('section')

	<h1 class="page-header">Ticket No. {{ $ticket->TICK_ID }}:</h1>

	<div class="jumbotron text-center">
		<strong>Datos Generales</strong>
		<p>
			<ul class="list-group">

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Empleador:</strong></div>
						<div class="col-lg-8">{{ $ticket-> contrato -> empleador -> EMPL_RAZONSOCIAL }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Fecha Creación:</strong></div>
						<div class="col-lg-8">{{ $ticket->TICK_FECHASOLICITUD }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Empleado:</strong></div>
						<div class="col-lg-8">{{ nombre_empleado($ticket -> contrato -> PROS_ID) }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Estado:</strong></div>
						<div class="col-lg-8">{{ $ticket -> estadoticket -> ESTI_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Tipo de Incidente:</strong></div>
						<div class="col-lg-8">{{ $ticket -> tipoincidente -> TIIN_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Prioridad:</strong></div>
						<div class="col-lg-8">{{ $ticket -> prioridad -> PRIO_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Categoría:</strong></div>
						<div class="col-lg-8">{{ $ticket -> categoria -> CATE_DESCRIPCION }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Fecha del Evento:</strong></div>
						<div class="col-lg-8">{{ $ticket -> TICK_FECHAEVENTO }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Observaciones:</strong></div>
						<div class="col-lg-8">{{ $ticket -> TICK_OBSERVACIONES }}</div>
					</div>
				</li>

				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Estado Aprobación:</strong></div>
						<div class="col-lg-8">{{ $ticket -> estadoaprobacion -> ESAP_DESCRIPCION }}</div>
					</div>
				</li>


			</ul>
		</p>

	</div>

	<div class="jumbotron text-center">
		<strong>Descripción de los Hechos</strong>
		<p>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Descripción de los Hechos:</strong></div>
						<div class="col-lg-8">{{ $ticket -> TICK_DESCRIPCION }}</div>
					</div>
				</li>
			</ul>
		</p>

	</div>

	<div class="jumbotron text-center">
		<strong>Evidencia</strong>
		<p>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="row">
						<div class="col-lg-4"><strong>Archivos:</strong></div>
						<div class="col-lg-8">

							<!-- Botón Ver (show) -->
							<a class="btn btn-small btn-basic btn-xs" href="#" data-tooltip="tooltip" title="Ver" id="imagenModal">
						<!--
						
					-->
					<p hidden>
						@if ($ticket -> TICK_ARCHIVO != NULL and $ticket -> TICK_ARCHIVO != "")
						<img id="imageresource" src="{{asset('storages/' . $ticket -> TICK_ARCHIVO)}}" style="width: 500px; height: 264px;">
						@else
						<img id="imageresource" src="{{asset('storages/' . 'filedefault.png' )}}" style="width: 500px; height: 264px;">
						@endif
						
					</p>
					<i class="fa fa-eye" aria-hidden="true"></i> Ver Archivo


					
				</a>

			</div>
		</div>
	</li>
</ul>
</p>

</div>

<div class="jumbotron text-center">
	<strong>Acciones</strong>
	<p>
		<ul class="list-group">
			<li class="list-group-item">
				<div class="row" id="daccionauto">
					<a href="#" class="btn btn-success" role="button" id="autorizarModal">
						<span class="fa fa-check" aria-hidden="true"></span> Autorizar
					</a>
					

				</div>
				<br>

				<div class="row" id="daccionrecha">
					<a href="#" class="btn btn-danger" role="button" id="rechazarModal">
						<span class="fa fa-close" aria-hidden="true"></span> Rechazar
					</a>
				</div>

				<div class="row" id="daccioncerrar">
					<a href="#" class="btn btn-success" role="button" id="cerrarModal">
						<span class="fa fa-check" aria-hidden="true"></span> Cerrar Ticket
					</a>
				</div>

			</li>
		</ul>
	</p>

</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Evidencia</h4>
			</div>
			<div class="modal-body">
				<img src="" id="imagepreview" style="width: 400px; height: 264px;" >
			</div>
			<div>
				<p hidden id="psinarchivos" class="text-center">
					<b>No hay archivos disponibles</b>
				</p>

				<p hidden id="pconarchivos" class="text-center">
					<b>Hay archivos disponibles, para ver haga click en descargar</b>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir
				</button>

				<a href="{{asset('storages/' . $ticket -> TICK_ARCHIVO)}}" class="btn btn-info" role="button" id="btndescargar" download>
					<span class="glyphicon glyphicon-save" aria-hidden="true"></span>Descargar
				</a>
				
			</div>
		</div>
	</div>
</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="autorizarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmación</h4>
			</div>
			
			<div>
				<p class="text-center">
					<b>¿Autorizar el Ticket?</b>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir
				</button>

				<a href="{{ URL::to('cnfg-tickets/tickets/autorizar/' . $ticket -> TICK_ID ) }}" class="btn btn-success" role="button" id="btnautorizar">
					<span class="fa fa-check" aria-hidden="true"></span> SI
				</a>
				
			</div>
		</div>
	</div>
</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="rechazarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmación</h4>
			</div>
			
			<div>
			{{ Form::open( ['url' => 'cnfg-tickets/tickets/rechazar/' . $ticket -> TICK_ID , 'id'=>'frmRechazarTicket', 'class' => 'form-vertical'] ) }}

				{{ Form::label('TICK_MOTIVORECHAZO', 'Motivo de Rechazo:') }}

						{{ Form::textarea('TICK_MOTIVORECHAZO', old('TICK_MOTIVORECHAZO'), [
							'class' => 'form-control',
							'size' => '20x3',
							'placeholder' => 'Escriba aquí...',
							'style' => 'resize: vertical',
							'required'
						]) }}

			</div>



			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir
				</button>

				{{ Form::button('<i class="fa fa-times-circle" aria-hidden="true"></i> Rechazar',[
						'name'=>'btn-confirmClose',
						'class'=>'btn btn-success',
						'id'=>'submit',
						'type'=>'submit',
					]) }}

				{{ Form::close() }}
				
			</div>
		</div>
	</div>
</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="cerrarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmación</h4>
			</div>
			
			<div>
				<p class="text-center">
					<b>Detalles del Cierre</b>
				</p>

				<p class="text-center">
					{{ Form::open( ['url' => 'cnfg-tickets/tickets/cerrar/' . $ticket -> TICK_ID , 'id'=>'frmCerrarTicket', 'class' => 'form-vertical'] ) }}

						

						<div class="form-group{{ $errors->has('SANC_ID') ? ' has-error' : '' }}">
						<label for="SANC_ID" class="col-md-4 control-label">Decisión Administrativa</label>
						<div class="col-md-6">
							{{ Form::select('SANC_ID', [null => 'Seleccione una opción'] + $arrSanciones , old('SANC_ID'), [
							'class' => 'form-control',
							'required'
							]) }}

							@if ($errors->has('SANC_ID'))
							<span class="help-block">
								<strong>{{ $errors->first('SANC_ID') }}</strong>
							</span>
							@endif
						</div>
					</div>

						{{ Form::label('TICK_CONCLUSION', 'Observaciones:') }}
						{{ Form::textarea('TICK_CONCLUSION', old('TICK_CONCLUSION'), [
							'class' => 'form-control',
							'size' => '20x3',
							'placeholder' => 'Escriba aquí...',
							'style' => 'resize: vertical',
							'required'
						]) }}

					
						
					

				</p>

			</div>



			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir
				</button>

				{{ Form::button('<i class="fa fa-check" aria-hidden="true"></i> Cerrar',[
						'name'=>'btn-confirmClose',
						'class'=>'btn btn-success',
						'id'=>'submit',
						'type'=>'submit',
					]) }}

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>

<!-- Botones -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-4 text-right">
		<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/tickets/') }}" data-tooltip="tooltip" title="Regresar">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>
		</a>

	</div>
</div>

@endsection

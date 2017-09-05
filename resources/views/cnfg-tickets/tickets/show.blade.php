@extends('layouts.menu')
@section('title', '/ Detalle Ticket')

@push('scripts')
	<script type="text/javascript">
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

			} else {

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
		//si el estado de aprobación es diferente del inicial cuando se crea el ticket
		//se esconden los botones
		var ESAP_ID = "{{ $ticket -> ESAP_ID }}";
		
		if(ESAP_ID != 1){
			$('#daccionauto').hide();
			$('#daccionrecha').hide();
		} else if(ESAP_ID == 1){
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
	<h1 class="page-header">Ticket No. {{ str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT) }}:</h1>

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

	@rinclude('show-modales')

	<!-- Botones -->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4 text-right">
			<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/tickets/') }}" data-tooltip="tooltip" title="Regresar">
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
			</a>

		</div>
	</div>

@endsection

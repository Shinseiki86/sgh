@extends('layouts.menu')

@section('head')
{!! Html::style('assets/stylesheets/chosen/chosen.min.css') !!}
@parent
@endsection

@section('scripts')
{!! Html::script('assets/scripts/chosen/chosen.jquery.min.js') !!}
{!! Html::script('assets/scripts/bootstrap/bootstrap.min.js') !!}
<script type="text/javascript">

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

	</script>
	@parent
	@endsection

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
						<div class="col-lg-4"><strong>Implicado:</strong></div>
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

<!-- Botones -->
<div class="form-group">
	<div class="col-md-6 col-md-offset-4 text-right">
		<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-tickets/tickets/') }}" data-tooltip="tooltip" title="Regresar">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>
		</a>

	</div>
</div>




@endsection

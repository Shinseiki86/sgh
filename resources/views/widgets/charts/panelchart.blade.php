
<div class="col-xs-12 col-sd-5 col-md-5">
	@section ('evidencias_panel_title','Evidencia')
	@section ('evidencias_panel_body')
		<div class="row">
			<div class="col-lg-4"><strong>Archivos:</strong></div>
			<div class="col-lg-8">
				<!-- Botón Ver (show) -->
				<a class="btn btn-small btn-basic btn-xs" href="#" data-tooltip="tooltip" title="Ver" id="imagenModal">
					<p hidden>
						@if ($ticket->TICK_ARCHIVO != NULL and $ticket->TICK_ARCHIVO != "")
						<img id="imageresource" src="{{asset('storages/' . $ticket->TICK_ARCHIVO)}}" style="width: 500px; height: 264px;">
						@else
						<img id="imageresource" src="{{asset('storages/' . 'filedefault.png' )}}" style="width: 500px; height: 264px;">
						@endif
					</p>
					<i class="fa fa-eye" aria-hidden="true"></i> Ver Archivo
				</a>
			</div>
		</div>
	@endsection
	@include('widgets.panel', ['as'=>'evidencias', 'header'=>true])

</div>


	<div class="panel panel-info panel-chart">
		<div class="panel-heading">
			{{$title}}
			<div class="pull-right">
				<label>Tipo</label>
				<select class="typeChart disabled">
					<option value="bar">Barras</option>
					<option value="pie">Torta</option>
				</select>
			</div>
		</div>
		<div class="panel-body">
			<canvas class="canvas-chart" id="{{$idCanvas}}" style="height:250px"></canvas>
		</div>
	</div>

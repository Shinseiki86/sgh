{{ Form::open(['url' => 'reportes/ticketsPorFecha', 'id'=>'form_1', 'class' => 'form-horizontal hide']) }}
	<div class="col-sm-8 col-offset-2" >

		<div class="row">
			@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fchaIniSolicitud', 'label'=>'Fecha inicial solicitud' ])
			@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fchaFinSolicitud', 'label'=>'Fecha final solicitud' ])
		</div>

		<!-- Botones -->
		{{ Form::button('<i class="fa fa-cog" aria-hidden="true"></i> Procesar', [
			'class'=>'btn btn-primary',
			'type'=>'submit',
		]) }}
	</div>
{{ Form::close() }}
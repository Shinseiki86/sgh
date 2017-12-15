{{ Form::open(['url' => 'reportes/contratoActPorFecha', 'id'=>'form_0', 'class' => 'form-horizontal hide']) }}
	<div class="col-sm-8 col-offset-2" >

		<div class="row">
			@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fchaIniContrato', 'label'=>'Fecha inicial contrato' ])
			@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fchaFinContrato', 'label'=>'Fecha final contrato' ])
		</div>

		<!-- Botones -->
		{{ Form::button('<i class="fa fa-cog" aria-hidden="true"></i> Procesar', [
			'class'=>'btn btn-primary',
			'type'=>'submit',
		]) }}
	</div>
{{ Form::close() }}
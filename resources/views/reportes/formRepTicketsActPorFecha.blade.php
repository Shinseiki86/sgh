<div class="row">
	<div class="col-xs-12 col-sm-12">
		@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaSolicitudDesde', 'label'=>'Fecha Solicitud desde' ])
		@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaSolicitudHasta', 'label'=>'Fecha Solicitud hasta' ])
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaAprobDesde', 'label'=>'Fecha Aprobación desde' ])
		@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaAprobHasta', 'label'=>'Fecha Aprobación hasta' ])
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		@include('widgets.forms.input', ['type'=>'select', 'column'=>12, 'name'=>'estado', 'label'=>'Estado', 'ajax'=>['model'=>'EstadoTicket','column'=>'ESTI_DESCRIPCION'], 'options'=>['required'] ])
	</div>
</div>
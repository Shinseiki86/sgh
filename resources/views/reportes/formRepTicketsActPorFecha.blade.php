<div class="row">
	@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaSolicitudDesde', 'label'=>'Fecha Solicitud desde' ])
	@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaSolicitudHasta', 'label'=>'Fecha Solicitud hasta' ])
</div>
<div class="row">
	@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaAprobDesde', 'label'=>'Fecha Aprobación desde' ])
	@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'fchaAprobHasta', 'label'=>'Fecha Aprobación hasta' ])
</div>

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'estado', 'label'=>'Estado', 'data'=>$arrEstados])

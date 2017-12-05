{{--@include('datepicker')--}}
@include('chosen')
<div class='col-md-8 col-md-offset-2'>

	@include('widgets.forms.input', ['type'=>'text', 'name'=>'NEGO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

	@include('widgets.forms.input', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empresa', 'data'=>$arrEmpleadores])

	@include('widgets.forms.input', ['type'=>'select', 'name'=>'PROS_ID', 'label'=>'Responsable', 'data'=>$arrProspectos])

	@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'NEGO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

	<!-- Botones -->
	@include('widgets.forms.buttons', ['url' => 'cnfg-contratos/negocios'])

</div>

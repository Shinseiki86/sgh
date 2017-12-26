<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'empresa', 'label'=>'Empresa', 'data'=>$arrEmpresas])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'gerencia', 'label'=>'Gerencia', 'data'=>$arrGerencias])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'centrocosto', 'label'=>'Centro de Costo', 'data'=>$arrCentros])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'temporal', 'label'=>'Temporal', 'data'=>$arrTemporales])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'cargo', 'label'=>'Cargo', 'data'=>$arrCargos])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'grupo', 'label'=>'Grupo de Empleado', 'data'=>$arrGrupos])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'turno', 'label'=>'Turno', 'data'=>$arrTurnos])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'estado', 'label'=>'Estado de Contrato', 'data'=>$arrEstadosContratos])

</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'fchaRetiroDesde', 'label'=>'Fecha retiro desde' ])
	@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'fchaRetiroHasta', 'label'=>'Fecha retiro hasta' ])
</div>






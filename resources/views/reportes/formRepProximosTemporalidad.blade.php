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

</div>






<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'empresa', 'label'=>'Empresa', 'data'=>$arrEmpresas])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'temporal', 'label'=>'Temporal', 'data'=>$arrTemporales])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'cargo', 'label'=>'Cargo', 'data'=>$arrCargos])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'grupo', 'label'=>'Grupo de Empleado', 'data'=>$arrGrupos])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'turno', 'label'=>'Turno', 'data'=>$arrTurnos])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'estadorestriccion', 'label'=>'Estado de Restricción', 'data'=>$arrEstadosRestriccion])

</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'fchaIngresoDesde', 'label'=>'Fecha ingreso desde' ])
	@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'fchaIngresoHasta', 'label'=>'Fecha ingreso hasta' ])
</div>






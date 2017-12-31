<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'empresa', 'label'=>'Empresa', 'ajax'=>['model'=>'Empleador','column'=>'EMPL_NOMBRECOMERCIAL']])
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'gerencia', 'label'=>'Gerencia', 'ajax'=>['model'=>'Gerencia','column'=>'GERE_DESCRIPCION']])
</div>

<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>12, 'name'=>'cargo', 'label'=>'Cargo', 'ajax'=>['model'=>'Cargo','column'=>'CARG_DESCRIPCION']])
</div>
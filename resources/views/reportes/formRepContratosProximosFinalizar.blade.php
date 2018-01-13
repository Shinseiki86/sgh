<div class="row">
	<div class="col-xs-12 col-sm-6">
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'empresa', 'label'=>'Empresa', 'ajax'=>['model'=>'Empleador','column'=>'EMPL_NOMBRECOMERCIAL']])
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'gerencia', 'label'=>'Gerencia', 'ajax'=>['model'=>'Gerencia','column'=>'GERE_DESCRIPCION']])
	</div>
	<div class="col-xs-12 col-sm-6">
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'centrocosto', 'label'=>'Centro de Costo', 'ajax'=>['model'=>'CentroCosto','column'=>'CECO_DESCRIPCION']])
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'cargo', 'label'=>'Cargo', 'ajax'=>['model'=>'Cargo','column'=>'CARG_DESCRIPCION']])
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6">
		
		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'grupo', 'label'=>'Grupo de Empleado', 'ajax'=>['model'=>'Grupo','column'=>'GRUP_DESCRIPCION']])

		@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'turno', 'label'=>'Turno', 'ajax'=>['model'=>'Turno','column'=>'TURN_DESCRIPCION']])
	</div>
	<div class="col-xs-12 col-sm-6">
		

		@include('widgets.forms.input', ['type'=>'number', 'column'=>6, 'name'=>'dias', 'label'=>'Días', 'options'=>['required']])
	</div>
</div>
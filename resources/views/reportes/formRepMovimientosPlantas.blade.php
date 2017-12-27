<div class="row">
	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'empresa', 'label'=>'Empresa', 'data'=>$arrEmpresas])

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'gerencia', 'label'=>'Gerencia', 'data'=>$arrGerencias])
</div>

<div class="row">

	@include('widgets.forms.input', ['type'=>'select', 'column'=>3, 'name'=>'cargo', 'label'=>'Cargo', 'data'=>$arrCargos])

</div>







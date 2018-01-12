@include('chosen')
@include('datepicker')
<div class='col-md-10'>

	@include('widgets.forms.input', ['type'=>'select', 'column' =>5 ,'name'=>'CONT_ID', 'label'=>'Empleado', 'data'=>$arrContratos, 'options'=>['required']])

</div>

<div class="col-md-10">
	@include('widgets.forms.input', ['type'=>'select', 'column' =>5, 'name'=>'ATRI_ID', 'label'=>'Atributo', 'data'=>$arrAtributos, 'options'=>['required']])

</div>

<div class="col-md-10">

	@include('widgets.forms.input', ['type'=>'date', 'column'=>5, 'name'=>'EMAT_FECHA', 'label'=>'Fecha de Inicio', 'options'=>['required']])
	
</div>

<div class="col-md-10">
	@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'EMAT_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
</div>






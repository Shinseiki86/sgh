@include('datepicker')
@include('chosen')

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'CAME_ID', 'label'=>'Empleado con R.M', 'data'=>$arrContratos])

</div>

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'date', 'column'=>5, 'name'=>'NOME_FECHANOVEDAD', 'label'=>'Fecha de Novedad' ])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>10,  'name'=>'NOME_DESCRIPCION', 'label'=>'Descripción de Novedad', 'options'=>['maxlength' => '300'] ])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>10, 'name'=>'NOME_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>



</div>
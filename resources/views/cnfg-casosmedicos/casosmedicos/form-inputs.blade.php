@include('datepicker')
@include('chosen')

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'CONT_ID', 'label'=>'Empleado', 'data'=>$arrContratos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'ESRE_ID', 'label'=>'Estado de Restricción', 'data'=>$arrEstadosres])

</div>

<div class="col-md-10">
@include('widgets.forms.input', ['type'=>'date', 'column'=>5, 'name'=>'CAME_FECHARESTRICCION', 'label'=>'Fecha de Restricción' ])

@include('widgets.forms.input', [ 'type'=>'text', 'column'=>5,  'name'=>'CAME_LUGARREUBICACION', 'label'=>'Lugar de Reubicación', 'options'=>['maxlength' => '100'] ])
</div>


<div class='col-md-10'>

@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'DIGE_ID', 'label'=>'Diágnostico General', 'data'=>$arrDiagnosticos])

@include('widgets.forms.input', [ 'type'=>'text', 'column'=>5, 'name'=>'CAME_LABOR', 'label'=>'Labor que Realiza', 'options'=>['maxlength' => '100'] ])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'text', 'column'=>5, 'name'=>'CAME_DIAGESPECIFICO', 'label'=>'Diágnostico Especifico', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', [ 'type'=>'text', 'column'=>5, 'name'=>'CAME_CONTINGENCIA', 'label'=>'Contingencia', 'options'=>['maxlength' => '100'] ])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'number', 'column'=>5, 'name'=>'CAME_PCL', 'label'=>'P.C.L', 'options'=>['max' => '100', 'step' => 'any'] ])

@include('widgets.forms.input', [ 'type'=>'number', 'column'=>5, 'name'=>'CAME_NIVELPRODUCTIVIDAD', 'label'=>'Nivel de Productividad', 'options'=>['max' => '100' , 'step' => 'any'] ])

</div>



<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>10, 'name'=>'CAME_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>



</div>
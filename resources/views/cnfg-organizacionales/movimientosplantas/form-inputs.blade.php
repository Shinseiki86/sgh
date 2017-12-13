@include('datepicker')
@include('chosen')

<div class='col-md-10'>

@include('widgets.forms.input', ['type'=>'select', 'column'=>10, 'name'=>'PALA_ID', 'label'=>'Planta Laboral', 'data'=>$arrPlantas])
</div>

<div class='col-md-10'>

@include('widgets.forms.input', ['type'=>'date', 'column'=>5, 'name'=>'MOPL_FECHAMOVIMIENTO', 'label'=>'Fecha de Variación', 'options'=>['required']])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', ['type'=>'select', 'column'=>5, 'name'=>'MOPL_MOTIVO', 'label'=>'Motivo del Movimiento', 'data'=>['INCREMENTO' => 'INCREMENTO', 'DECREMENTO' => 'DECREMENTO']])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', ['type'=>'text', 'column'=>5, 'name'=>'MOPL_CANTIDAD', 'label'=>'Cantidad de Variación', 'options'=>['size' => '99999', 'min' => '-1000' ] ])

</div>

<div class='col-md-10'>

@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>8, 'name'=>'MOPL_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '3000'] ])

</div>





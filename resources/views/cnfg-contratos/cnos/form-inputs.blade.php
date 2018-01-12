{{--@include('datepicker')--}}
{{--@include('chosen')--}}
<div class='col-md-8 col-md-offset-2'>

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CNOS_CODIGO', 'label'=>'Código', 'options'=>['maxlength' => '5'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CNOS_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '150'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'CNOS_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>
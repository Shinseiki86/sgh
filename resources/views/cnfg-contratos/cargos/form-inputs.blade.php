{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CARG_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'CNOS_ID', 'label'=>'C.N.O', 'data'=>$arrCnos])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'CARG_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

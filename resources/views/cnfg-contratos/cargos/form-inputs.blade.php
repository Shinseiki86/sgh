{{--@include('datapicker')--}}
@include('chosen')

@include('widgets.forms.group', ['type'=>'text', 'name'=>'CARG_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CNOS_ID', 'label'=>'C.N.O', 'data'=>$arrCnos])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'CARG_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

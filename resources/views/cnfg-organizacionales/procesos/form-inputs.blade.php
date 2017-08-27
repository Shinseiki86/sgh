{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROC_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'GERE_ids', 'label'=>'Gerencias', 'data'=>$arrGerencias, 'multiple'=>true])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'PROC_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
{{--@include('datepicker')--}}
@include('chosen')


@include('widgets.forms.group', ['type'=>'text', 'name'=>'GERE_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empresa', 'data'=>$arrEmpleadores])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'PROC_ids', 'label'=>'Procesos', 'data'=>$arrProcesos, 'multiple'=>true])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'GERE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
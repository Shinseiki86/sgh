{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.group', ['type'=>'text', 'name'=>'GRUP_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'GRUP_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

	
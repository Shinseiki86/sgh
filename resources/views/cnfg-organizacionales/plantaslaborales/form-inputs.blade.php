{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.group', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CARG_ID', 'label'=>'Cargo', 'data'=>$arrCargos])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'PALA_CANTIDAD', 'label'=>'Cantidad Autorizada', 'options'=>['size' => '99999' ] ])

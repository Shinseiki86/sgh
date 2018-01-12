{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.input', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores, 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'GERE_ID', 'label'=>'Gerencia', 'data'=>$arrGerencias, 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'CARG_ID', 'label'=>'Cargo', 'data'=>$arrCargos, 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'number', 'name'=>'PALA_CANTIDAD', 'label'=>'Cantidad Autorizada', 'options'=>['size' => '99999' ] ])

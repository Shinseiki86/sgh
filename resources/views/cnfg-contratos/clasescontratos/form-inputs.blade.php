{{--@include('datepicker')--}}
{{--@include('chosen')--}}

@include('widgets.forms.input', ['type'=>'text', 'name'=>'CLCO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'CLCO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
		
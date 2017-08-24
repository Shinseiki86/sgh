{{--@include('datapicker')--}}
{{--@include('chosen')--}}

@include('widgets.forms.group', ['type'=>'text', 'name'=>'CLCO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'CLCO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
		
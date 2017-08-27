{{--@include('datepicker')--}}
{{-- @include('chosen')--}}
@include('select-color')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'ESTI_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'color', 'name'=>'ESTI_COLOR', 'label'=>'Color'])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'ESTI_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])


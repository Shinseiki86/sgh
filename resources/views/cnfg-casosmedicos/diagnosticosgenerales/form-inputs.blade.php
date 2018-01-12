{{--@include('datepicker')--}}
{{-- @include('chosen') --}}

@include('widgets.forms.input', ['type'=>'text', 'name'=>'DIGE_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '300', 'required'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'DIGE_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
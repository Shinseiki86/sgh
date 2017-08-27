{{-- @include('datepicker') --}}
{{-- @include('chosen') --}}

@include('widgets.forms.group', ['type'=>'text', 'name'=>'RIES_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'RIES_FACTOR', 'label'=>'Factor', 'options'=>['max' => '5','step'=>'0.0001'] ])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'RIES_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
@include('datepicker')
@include('chosen')

<div class="col-md-10">

<input type="hidden" name="PALA_ID" value="{{ $plantalaboral->PALA_ID}}">


@include('widgets.forms.input', ['type'=>'date', 'column'=>3, 'name'=>'VAPA_FECHAVARIACION', 'label'=>'Fecha de Variación', 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'number', 'name'=>'VAPA_CANTIDAD', 'label'=>'Cantidad de Variación', 'options'=>['size' => '99999' ] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'column'=>8, 'name'=>'VAPA_DESCRIPCION', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>


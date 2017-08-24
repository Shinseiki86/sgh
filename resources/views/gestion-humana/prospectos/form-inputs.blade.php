@include('datapicker')
@include('chosen')

@include('widgets.forms.group', ['type'=>'number', 'name'=>'PROS_CEDULA', 'label'=>'Cédula', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.group', ['type'=>'date', 'name'=>'PROS_FECHAEXPEDICION', 'label'=>'Fecha Expedición' ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROS_PRIMERNOMBRE', 'label'=>'Primer Nombre', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROS_SEGUNDONOMBRE', 'label'=>'Segundo Nombre', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROS_PRIMERAPELLIDO', 'label'=>'Primer Apellido', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROS_SEGUNDOAPELLIDO', 'label'=>'Segundo Apellido', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'PROS_SEXO', 'label'=>'Sexo', 'data'=>['M'=>'Masculino', 'F'=>'Femenino']])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'PROS_DIRECCION', 'label'=>'Dirección', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'PROS_TELEFONO', 'label'=>'Teléfono', 'options'=>['size' => '9999999999' ] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'PROS_CELULAR', 'label'=>'Celular', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.group', ['type'=>'email', 'name'=>'PROS_CORREO', 'label'=>'Correo electrónico'])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'PROS_MARCA', 'label'=>'¿Descartada?', 'data'=>['NO'=>'NO','SI'=>'SI']])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'PROS_MARCAOBSERVACIONES', 'label'=>'Nota de descarte', 'options'=>['maxlength' => '300'] ])

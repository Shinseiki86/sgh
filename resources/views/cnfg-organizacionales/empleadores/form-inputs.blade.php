{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'EMPL_RAZONSOCIAL', 'label'=>'Razón Social', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'number', 'name'=>'EMPL_NIT', 'label'=>'NIT', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'EMPL_DIRECCION', 'label'=>'Dirección', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'CIUD_DOMICILIO', 'label'=>'Ciudad', 'data'=>$arrCiudades, 'options'=>['data-live-search'=>'true']])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'EMPL_NOMBRECOMERCIAL', 'label'=>'Nombre Comercial', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'EMPL_NOMBREREPRESENTANTE', 'label'=>'Nombre Representante Legal', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'number', 'name'=>'EMPL_CEDULAREPRESENTANTE', 'label'=>'Cedula Representante', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'CIUD_CEDULA', 'label'=>'Ciudad de Expedición', 'data'=>$arrCiudades, 'options'=>['data-live-search'=>'true']])

@include('widgets.forms.input', ['type'=>'email', 'name'=>'EMPL_CORREO', 'label'=>'Correo electrónico responsable G.H'])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'PROS_ID', 'label'=>'Responsable de Gestión Humana', 'data'=>$arrProspectos, 'options'=>['data-live-search'=>'true']])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'GERE_ids', 'label'=>'Gerencias', 'data'=>$arrGerencias, 'multiple'=>true])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'TURN_ids', 'label'=>'Turnos', 'data'=>$arrTurnos, 'multiple'=>true])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'GRUP_ids', 'label'=>'Grupos', 'data'=>$arrGrupos, 'multiple'=>true])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'EMPL_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

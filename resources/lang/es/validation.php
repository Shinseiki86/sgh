<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'alpha'                => ':attribute solo debe contener letras.',
    'alpha_dash'           => ':attribute solo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute solo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son validas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'url'                  => 'El formato :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo electrónico',
        'first_name'            => 'nombre',
        'last_name'             => 'apellidos',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'móvil',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',

        'rol'                   => 'rol',
        'ROLE_id'               => 'ID rol',
        'ROLE_rol'              => 'Identificador interno',
        'ROLE_descripcion'      => 'Descripción',

        'PAIS_ID'               => 'ID país',
        'PAIS_CODIGO'           => 'Código país',
        'PAIS_NOMBRE'           => 'Nombre país',
        'DEPA_ID'               => 'ID departamento',
        'DEPA_CODIGO'           => 'Código departamento',
        'DEPA_NOMBRE'           => 'Nombre departamento',

        'CIUD_CODIGO'           => 'Código ciudad',
        'CIUD_NOMBRE'           => 'Nombre ciudad',

        'GERE_DESCRIPCION'      => 'Descripción',
        'GERE_OBSERVACIONES'    => 'Observaciones',
        
        'CARG_DESCRIPCION'      => 'Descripción',
        'CARG_OBSERVACIONES'    => 'Observaciones',
        'CLCO_DESCRIPCION'      => 'Descripción',
        'CLCO_OBSERVACIONES'    => 'Observaciones',
        'CNOS_CODIGO'           => 'Código CNOS',
        'CNOS_DESCRIPCION'      => 'Observaciones',
        'ESCO_DESCRIPCION'      => 'Descripción',
        'ESCO_OBSERVACIONES'    => 'Observaciones',
        'JEFE_OBSERVACIONES'    => 'Observaciones',
        'MORE_DESCRIPCION'      => 'Descripción',
        'MORE_OBSERVACIONES'    => 'Observaciones',
        'TICO_DESCRIPCION'      => 'Descripción',
        'TICO_OBSERVACIONES'    => 'Observaciones',
        'TEMP_RAZONSOCIAL'      => 'Razón social',
        'TEMP_NOMBRECOMERCIAL'  => 'Nombre comercial',
        'TEMP_DIRECCION'        => 'dirección',
        'TEMP_OBSERVACIONES'    => 'Observaciones',

        'PROC_DESCRIPCION'      => 'Descripción',
        'PROC_OBSERVACIONES'    => 'Observaciones',

        'PROS_CEDULA'           => 'Cédula',

        'EMPL_ID' => 'Empleador',
        'CONT_OBSERVACIONES' => 'Observaciones',
        'CONT_FECHAINGRESO' => 'Fecha de Ingreso',
        'CARG_ID' => 'Cargo',
        'CECO_ID' => 'Centro de costo',
        'CLCO_ID' => 'Clase de contrato',
        'CONT_CASOMEDICO' => '¿R.M?',
        'ESCO_ID' => 'Estado de contrato',
        'GRUP_ID' => 'Grupo de Empleado',
        'JEFE_ID' => 'Jefe Inmediato',
        'MORE_ID' => 'Motivo de Retiro',
        'PROS_ID' => 'Prospecto',
        'RIES_ID' => 'Riesgo ARL',
        'TEMP_ID' => 'Temporal',
        'TICO_ID' => 'Tipo de contrato',
        'TIEM_ID' => 'Tipo de empleador',
        'TURN_ID' => 'Turno',
        'CONT_RODAJE' => 'Rodaje',
        'CONT_SALARIO' => 'Salario',
        'CONT_VARIABLE' => 'Variable',
        'CONT_FECHARETIRO' => 'Fecha de Retiro',
        'DIAG_CODIGO' => 'Codigo CIE10',
        'DIAG_DESCRIPCION' => 'Descripcion',
        'TIEN_CODIGO' => 'Codigo Tipo Entidad',
        'TIEN_DESCRIPCION' => 'Descripcion',
        'ENTI_CODIGO' => 'Codigo Entidad',
        'ENTI_NIT' => 'Nit Entidad',
        'ENTI_RAZONSOCIAL' => 'Razon Social',
    ],

];

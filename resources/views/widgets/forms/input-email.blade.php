{{ Form::email( $name, old($name), ['class'=>'form-control', 'maxlength'=>'320'] + (isset($options)?$options:[]) )}}

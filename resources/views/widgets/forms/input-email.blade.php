{{ Form::email( $name, old($name)!=null?old($name):(isset(${$name})?${$name}:'') , ['class'=>'form-control', 'maxlength'=>'320'] + (isset($options)?$options:[]) )}}

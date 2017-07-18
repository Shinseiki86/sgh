<?php
/*
|--------------------------------------------------------------------------
| Funciones PHP Globales (Helpers)
|--------------------------------------------------------------------------
|
| Variedad de funciones creadas para ser utilizadas en cualquier proyecto,
| 
| 
|
*/


use Illuminate\Support\Arr;
use SGH\Prospecto;


if (! function_exists('expression_concat')) {
    /**
     * Crea un array con la llave primaria y una columna a partir de un Model.
     * Se utiliza para contruir <select> en los views.
     *
     * @param  string|Model  $class
     * @param  string  $column
     * @param  string  $primaryKey
     * @return array
     */
    function expression_concat($columns = [], $alias = 'concat')
    {
        if(env('DB_CONNECTION') == 'pgsql'){
            foreach ($columns as $key => $column) {
                $columns[$key] = '"'.$column.'"';
            }
            $alias = '"'.$alias.'"';
        }

        $sqlIni = 'CONCAT(';
        $sqlEnd = ') AS '.$alias;
        $sqlColumns = null;
        foreach ($columns as $column) {
            $sqlColumns = !isset($sqlColumns)
                ? $column
                : $sqlColumns.', \' \' , '.$column;
        }
        
        return \DB::raw($sqlIni.$sqlColumns.$sqlEnd);
    }
}

if (! function_exists('model_to_array')) {
    /**
     * Crea un array con la llave primaria y una columna a partir de un Model.
     * Se utiliza para contruir <select> en los views.
     *
     * @param  string|Model  $class
     * @param  string  $column
     * @param  string  $primaryKey
     * @return array
     */
    function model_to_array($class, $column, $primaryKey = null)
    {

        if(is_object($class)){
            $models = $class;
            $primaryKey = isset($primaryKey) ? $primaryKey : $models->first()->getKeyName();
        } else {
            $class = class_exists($class) ? $class : '\\SGH\\'.basename($class);
            $primaryKey = isset($primaryKey) ? $primaryKey : (new $class)->getKeyName();
            $models = $class::orderBy($primaryKey)->select([ $primaryKey , $column ]);
        }

        //Si la columna es una expresión, se obtiene el alias de la columna
        if($column instanceof \Illuminate\Database\Query\Expression)
            $column = str_replace('"', '', array_last(explode(') AS ', $column->getValue())));

        if (is_array($column)){
            array_push($column, $primaryKey);
            $models = $models->select($column)->get()->keyBy($primaryKey);
        } elseif (is_string($column)) {
            $models = $models->pluck($column, $primaryKey);
        }

        return $models->toArray();
    }
}

if (! function_exists('nombre_empleado')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function nombre_empleado($PROS_ID) {
        
        $prospecto = \SGH\Prospecto::findOrFail($PROS_ID);
        
        $nombre = "";

        if($prospecto->PROS_SEGUNDONOMBRE != null && $prospecto->PROS_SEGUNDOAPELLIDO != null){
            $nombre = $prospecto->PROS_PRIMERNOMBRE . " " . $prospecto->PROS_SEGUNDONOMBRE . " " .
            $prospecto->PROS_PRIMERAPELLIDO . " " . $prospecto->PROS_SEGUNDOAPELLIDO;
        }
        if($prospecto->PROS_SEGUNDONOMBRE != null && $prospecto->PROS_SEGUNDOAPELLIDO == null){
            $nombre = $prospecto->PROS_PRIMERNOMBRE . " " . $prospecto->PROS_SEGUNDONOMBRE . " " .
            $prospecto->PROS_PRIMERAPELLIDO;
        }
        if($prospecto->PROS_SEGUNDONOMBRE == null && $prospecto->PROS_SEGUNDOAPELLIDO != null){
            $nombre = $prospecto->PROS_PRIMERNOMBRE . " " .
            $prospecto->PROS_PRIMERAPELLIDO . " " . $prospecto->PROS_SEGUNDOAPELLIDO;
        }
        
        return strtoupper($nombre);

    }

}

if (! function_exists('get_jefe_prospecto')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function get_jefe_prospecto($PROS_CEDULA) {

        $prospecto = \SGH\Prospecto::activos()->where('PROS_CEDULA', $PROS_CEDULA)->pluck('JEFE_ID');
        $pros_jefe = null;

        if ($prospecto != null) {
            $pros_jefe = $prospecto[0];
        }else{
            $pros_jefe = null;
        }
        
        return $pros_jefe;

    }

}

if (! function_exists('get_email_jefe')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function get_email_jefe($PROS_ID) {

        $jefe = \SGH\Prospecto::where('PROS_ID', $PROS_ID)->pluck('PROS_CORREO');


        $jefe_email = null;

        if ($jefe != null) {
            $jefe_email = $jefe[0];
        }else{
            $jefe_email = "sghmasterpromo@gmail.com";
        }
        
        return $jefe_email;

    }

}

if (! function_exists('get_email_empleador')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function get_email_empleador($EMPL_ID) {

        $empleador = \SGH\Empleador::where('EMPL_ID', $EMPL_ID)->pluck('EMPL_COREO');


        $empl_email = null;

        if($empleador != null) {
            $empl_email = $empleador[0];
        }else{
            $empl_email = "sghmasterpromo@gmail.com";
        }
        
        return $empl_email;

    }

}

if (! function_exists('get_email_user')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function get_email_user($USER_ID) {

        $usuario = \SGH\User::where('USER_id', $USER_ID)->pluck('email');


        $user_email = null;

        if ($usuario != null) {
            $user_email = $usuario[0];
        }else{
            $user_email = "sghmasterpromo@gmail.com";
        }
        
        return $user_email;

    }

}



if (! function_exists('array_implode')) {
    /**
     * Implode an array with the key and value pair giving
     * a glue, a separator between pairs and the array
     * to implode.
     * @param string $glue The glue between key and value
     * @param string $separator Separator between pairs
     * @param array $array The array to implode
     * @return string The imploded array
     */
    function array_implode( $glue, $separator, $array ) {
        if ( ! is_array( $array ) ) return $array;
        $string = array();
        foreach ( $array as $key => $val ) {
            if ( is_array( $val ) )
                $val = implode( ',', $val );
            $string[] = "{$key}{$glue}{$val}";

        }
        return implode( $separator, $string );

    }

}


if (! function_exists('img_to_base64')) {
    /**
     * Covertir imagen en base64.
     * @param string $pathImg Ruta del archivo.
     * @return string $dataUri
     */
    function img_to_base64( $pathImg ) {
        //
        $type = pathinfo($pathImg, PATHINFO_EXTENSION);
        $data = file_get_contents($pathImg);
        $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $dataUri;
    }
}

if (! function_exists('delete_tree')) {
    /**
     * Borra archivos en el servidor.
     * @param string $dir Ruta del archivo.
     * @return bool $resultado 
     */
    function delete_tree( $dir ) {
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach($files as $file) {
            //Primero se borran todos los archivos que se encuentran dentro de la carpeta
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        //Y luego se borra la carpeta, retornando el valor
        //Un error de nivel E_WARNING será generado si se produce un error.
        return rmdir($dir); 
    }
}

if (! function_exists('str_upperspace')) {
    /**
     * Convierte un string sin espacios, en donde cada palabra inicia con mayúscula.
     * Ej: class_basename($modelo) //return "NombreClase"
     *     str_upperspace(class_basename($modelo)) //return "Nombre Clase"
     * @param string $str String sin espacios tipo NombrePropio.
     * @return string $str_space
     */
    function str_upperspace( $str ) {
        $pattern = '/([A-Z])/'; 
        $replacement = ' ${1}'; 
        $str_space = ltrim(preg_replace($pattern, $replacement, $str));
        return $str_space; 
    }
}

if (! function_exists('flash_alert')) {
    /**
     * Almacena un mensaje para ser presentado como alerta flotante en la vista.
     * @param string $msg Mensaje a presentar.
     * @param string $type Tipo de alerta. Puede ser: info, success, warning o danger.
     * @return void
     */
    function flash_alert( $msg, $type = 'info' ) {
        //if(session()->has('alert-'.$type)){
        //    $msg = session()->get('alert-'.$type) + [$msg];
        //} else {
        $msg = [$msg];
        //}
        session()->flash('alert-'.$type, $msg);
    }
}

if (! function_exists('flash_modal')) {
    /**
     * Almacena un mensaje para ser presentado como ventana modal en la vista.
     * @param string $msg Mensaje a presentar.
     * @param string $type Tipo de modal. Puede ser: info, success, warning o danger.
     * @return void
     */
    function flash_modal( $msg, $type = 'info' ) {
        session()->flash('modal-'.$type, $msg);
    }
}

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
     * @param  array  $whereArr
     * @return array
     */
    function model_to_array($class, $column, $primaryKey = null, $whereArr = [])
    {
        if( is_array($primaryKey) and empty($whereArr)){
            $whereArr = $primaryKey;
            $primaryKey = null;
        }

        if($class instanceof Illuminate\Database\Eloquent\Collection){
            //Si es un Modelo, no se aplican las clausulas where.
            $model = $class;
            $primaryKey = isset($primaryKey) ? $primaryKey : $model->first()->getKeyName();

        } else {

            $class = class_exists($class) ? $class : '\\SGH\\Models\\'.basename($class);
            $primaryKey = isset($primaryKey) ? $primaryKey : (new $class)->getKeyName();
            $model = $class::orderBy($primaryKey)
                            ->select([ $primaryKey , $column ]);

            //Inclusión de clausulas where
            foreach ($whereArr as $where) {
                $columnWhere = $where[0];
                if(isset($where[2])){
                    $operatorWhere = $where[1];
                    $valueWhere = $where[2];
                } else {
                    $operatorWhere = '=';
                    $valueWhere = $where[1];
                }
                $model = $model->where($columnWhere, $operatorWhere, $valueWhere);
            }
        }

        //Si $column es una expresión, se adiciona alias a la columna (Compatibilidad para Postgress).
        if($column instanceof \Illuminate\Database\Query\Expression){
            $column = str_replace('"', '', array_last(explode(') AS ', $column->getValue())));
        }

        //Si $column es un array, se agrega $primaryKey y se retornan todas las columnas del array.
        if(is_array($column)){
            $column[] = $primaryKey;
            $model = $model->select($column)->get()->keyBy($primaryKey);
        }
        //Si $column es un string, sólo se retorna la columna solicitada.
        elseif (is_string($column)) {
            $model = $model->pluck($column, $primaryKey);
        }

        return $model->toArray();
    }
}


if (! function_exists('current_route_action')) {
    /**
     * 
     * @return string 
     */
    function current_route_action() {
        return explode("@", \Route::currentRouteAction())[1];
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
        
        $prospecto = \SGH\Models\Prospecto::findOrFail($PROS_ID);
        
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
        if($prospecto->PROS_SEGUNDONOMBRE == null && $prospecto->PROS_SEGUNDOAPELLIDO == null){
            $nombre = $prospecto->PROS_PRIMERNOMBRE . " " . $prospecto->PROS_PRIMERAPELLIDO ;
        }
        
        return strtoupper($nombre);

    }

}


if (! function_exists('get_email_empleador')) {
    /**
     * @param int $EMPL_ID 
     * @return string
     */
    function get_email_empleador($EMPL_ID) {

        $empleador = \SGH\Models\Empleador::where('EMPL_ID', $EMPL_ID)->pluck('EMPL_CORREO');


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
     * @param int $USER_ID 
     * @return string
     */
    function get_email_user($USER_ID) {

        $usuario = \SGH\Models\User::where('USER_id', $USER_ID)->pluck('email');


        $user_email = null;

        if ($usuario != null) {
            $user_email = $usuario[0];
        }else{
            $user_email = "sghmasterpromo@gmail.com";
        }
        
        return $user_email;

    }

}

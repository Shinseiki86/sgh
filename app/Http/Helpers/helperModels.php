<?php 

if (! function_exists('modelo')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function modelo($modelo){ 	
		$class = class_exists($modelo) ? $modelo : '\\SGH\\Models\\'.basename($modelo);
		return (new $class);
	}
}


if (! function_exists('repositorio')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function repositorio($modelo){ 
		$repositori = $modelo."Repository";
		$class = class_exists($repositori) ? $repositori : '\\SGH\\Repositories\\'.$repositori;
		return (new $class);
	}
}

if (! function_exists('findAll')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function findAll($modelo,$relacion=[]){
		$modelo = modelo($modelo);
		if (count($relacion)>0 )
			return $modelo::with($relacion)->get();
		return $modelo::all();
	}
}

if (! function_exists('findId')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function findId($modelo,$id)
    {
      return modelo($modelo)->find($id)->get();
    }
}
    
if (! function_exists('findBy')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
    function findBy($modelo,$column, $value)
    {
      return modelo($modelo)->where($column, $value)->get();
    }
}
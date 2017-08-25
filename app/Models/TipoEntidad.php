<?php namespace SGH\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SGH\Models\ModelWithSoftDeletes;

class TipoEntidad extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "tipoEntidades";
    protected $primaryKey =  'TIEN_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'TIEN_FECHACREADO';
    const UPDATED_AT = 'TIEN_FECHAMODIFICADO';
    const DELETED_AT = 'TIEN_FECHAELIMINADO';
    protected $dates = ['TIEN_FECHACREADO','TIEN_FECHAMODIFICADO','TIEN_FECHAELIMINADO'];

    public $fillable = [
        "TIEN_CODIGO",
		"TIEN_DESCRIPCION",
		"TIEN_OBSERVACIONES"
    ];


    public static $rules = [
        "TIEN_CODIGO" => "unique:tipoEntidades|required",
		"TIEN_DESCRIPCION" => "unique:tipoEntidades|required",
		"TIEN_OBSERVACIONES" => "unique"
    ];
   
    public function entidades()
    {
        $foreingKey = 'TIEN_ID';
        return $this->hasMany(Entidad::class, $foreingKey);
    }

}

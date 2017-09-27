<?php
namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class TipoEntidad extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "TIPOENTIDADES";
    protected $primaryKey =  'TIEN_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'TIEN_FECHACREADO';
    const UPDATED_AT = 'TIEN_FECHAMODIFICADO';
    const DELETED_AT = 'TIEN_FECHAELIMINADO';
    protected $dates = ['TIEN_FECHACREADO','TIEN_FECHAMODIFICADO','TIEN_FECHAELIMINADO'];

    //Constantes para referenciar los estados de una encuesta
    const ARL = 1;
    const EPS = 2;
    const CCF = 3;

    public $fillable = [
        "TIEN_CODIGO",
		"TIEN_DESCRIPCION",
		"TIEN_OBSERVACIONES"
    ];

    public static function rules($id = 0){
        return [
            'TIEN_CODIGO' => 'required|max:100|'.static::unique($id,'TIEN_CODIGO'),
            'TIEN_DESCRIPCION' => 'required|max:300|'.static::unique($id,'TIEN_DESCRIPCION'),
        ];
    }

    public function entidades()
    {
        $foreingKey = 'TIEN_ID';
        return $this->hasMany(Entidad::class, $foreingKey);
    }

}

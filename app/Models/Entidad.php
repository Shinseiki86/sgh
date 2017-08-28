<?php namespace SGH\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SGH\Models\ModelWithSoftDeletes;

class Entidad extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "ENTIDADES";
    protected $primaryKey =  'ENTI_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'ENTI_FECHACREADO';
    const UPDATED_AT = 'ENTI_FECHAMODIFICADO';
    const DELETED_AT = 'ENTI_FECHAELIMINADO';
    protected $dates = ['ENTI_FECHACREADO','ENTI_FECHAMODIFICADO','ENTI_FECHAELIMINADO'];

    public $fillable = [
        "ENTI_CODIGO",
		"ENTI_NIT",
		"ENTI_RAZONSOCIAL",
		"ENTI_OBSERVACIONES",
		"TIEN_ID"
    ];


    public static $rules = [
        "ENTI_CODIGO" => "unique:entidades|required",
		"ENTI_NIT" => "unique:entidades|required",
		"ENTI_RAZONSOCIAL" => "unique:entidades|required",
		"TIEN_ID" => "required|numeric"
    ];


    public function tipoentidad()
    {
        $foreingKey = 'TIEN_ID';
        return $this->belongsTo(TipoEntidad::class, $foreingKey);
    }

    public function contratos(){
        return $this->belongsToMany(Contrato::class);
    }


}

<?php namespace SGH\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SGH\Models\ModelWithSoftDeletes;

class Diagnostico extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "DIAGNOSTICOS";
    protected $primaryKey =  'DIAG_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'DIAG_FECHACREADO';
    const UPDATED_AT = 'DIAG_FECHAMODIFICADO';
    const DELETED_AT = 'DIAG_FECHAELIMINADO';
    protected $dates = ['DIAG_FECHACREADO','DIAG_FECHAMODIFICADO','DIAG_FECHAELIMINADO'];

    public $fillable = [
        "DIAG_CODIGO",
		"DIAG_DESCRIPCION"
    ];


    public static $rules = [
        "DIAG_CODIGO" => "unique:DIAGNOSTICOS|required",
		"DIAG_DESCRIPCION" => "unique:DIAGNOSTICOS|required"
    ];


    public function ausentismos()
    {
        $foreingKey = 'AUSE_ID';
        return $this->hasMany(Ausentismo::class, $foreingKey);
    }


}

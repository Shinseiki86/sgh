<?php 
namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class ProrrogaAusentismo extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "PRORROGAAUSENTISMOS";
    protected $primaryKey =  'PROR_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'PROR_FECHACREADO';
    const UPDATED_AT = 'PROR_FECHAMODIFICADO';
    const DELETED_AT = 'PROR_FECHAELIMINADO';
    protected $dates = ['PROR_FECHACREADO','PROR_FECHAMODIFICADO','PROR_FECHAELIMINADO'];

    public $fillable = [
        "AUSE_ID",
		"DIAG_ID",
		"COAU_ID",
		"PROR_FECHAINICIO",
		"PROR_FECHAFINAL",
		"PROR_DIAS",
		"PROR_OBSERVACIONES"
    ];


    public static $rules = [
        "AUSE_ID" => "required",
		"COAU_ID" => "required",
		"PROR_FECHAINICIO" => "date|required",
		"PROR_FECHAFINAL" => "date|required",
		"PROR_DIAS" => "required|numeric"
    ];


    public function ausentismo()
    {
        $foreingKey = 'AUSE_ID';
        return $this->belongsTo(Ausentismo::class, $foreingKey);
    }

    public function diagnostico()
    {
        $foreingKey = 'DIAG_ID';
        return $this->belongsTo(Diagnostico::class, $foreingKey);
    }

     public function conceptoausencia()
    {
        $foreingKey = 'COAU_ID';
        return $this->belongsTo(ConceptoAusencia::class, $foreingKey);
    }

    


}

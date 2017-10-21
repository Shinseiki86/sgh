<?php 
namespace SGH\Models;


use SGH\Models\ModelWithSoftDeletes;

class Ausentismo extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "AUSENTISMOS";
    protected $primaryKey =  'AUSE_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'AUSE_FECHACREADO';
    const UPDATED_AT = 'AUSE_FECHAMODIFICADO';
    const DELETED_AT = 'AUSE_FECHAELIMINADO';
    protected $dates = ['AUSE_FECHACREADO','AUSE_FECHAMODIFICADO','AUSE_FECHAELIMINADO'];

    public $fillable = [
        "DIAG_ID",
		"COAU_ID",
		"CONT_ID",
		"AUSE_FECHAINICIO",
		"AUSE_FECHAFINAL",
		"AUSE_DIAS",
		"AUSE_FECHAACCIDENTE",
		"ENTI_ID",
		"AUSE_IBC",
		"AUSE_VALOR",
		"AUSE_OBSERVACIONES"
    ];

	public static function rules($id = 0){
		$rules = [
	        "COAU_ID" => "required",
			"CONT_ID" => "required",
			"AUSE_FECHAINICIO" => "required|date",
			"AUSE_FECHAFINAL" => "date|required|after:AUSE_FECHAINICIO",
			"AUSE_DIAS" => "required",
			"AUSE_FECHAACCIDENTE" => "date",
			"ENTI_ID" => "required",
		];
		return $rules;
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

    public function contrato()
    {
        $foreingKey = 'CONT_ID';
        return $this->belongsTo(Contrato::class, $foreingKey);
    }

     public function entidad()
    {
        $foreingKey = 'ENTI_ID';
        return $this->belongsTo(Entidad::class, $foreingKey);
    }

    public function prorrogaausentismos()
    {
        $foreingKey = 'PROR_ID';
        return $this->hasMany(ProrrogaAusentismo::class, $foreingKey);
    }


}

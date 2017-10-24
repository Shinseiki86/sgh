<?php namespace SGH\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SGH\Models\ModelWithSoftDeletes;

class ConceptoAusencia extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "CONCEPTOAUSENCIAS";
    protected $primaryKey =  'COAU_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'COAU_FECHACREADO';
    const UPDATED_AT = 'COAU_FECHAMODIFICADO';
    const DELETED_AT = 'COAU_FECHAELIMINADO';
    protected $dates = ['COAU_FECHACREADO','COAU_FECHAMODIFICADO','COAU_FECHAELIMINADO'];

    public $fillable = [
        "COAU_CODIGO",
		"COAU_DESCRIPCION",
		"COAU_OBSERVACIONES",
		"TIAU_ID",
		"TIEN_ID"
    ];

    public static function rules($id = 0){
        return [
            'COAU_CODIGO' => 'required|'.static::unique($id,'COAU_CODIGO'),
            'COAU_DESCRIPCION' => 'required|'.static::unique($id,'COAU_DESCRIPCION'),
            "TIAU_ID" => "required",
            "TIEN_ID" => "required"
        ];
    }

    public function tipoausentismo()
    {
        $foreingKey = 'TIAU_ID';
        return $this->belongsTo(TipoAusentismo::class, $foreingKey);
    }

    public function tipoentidad()
    {
        $foreingKey = 'TIEN_ID';
        return $this->belongsTo(TipoEntidad::class, $foreingKey);
    }

    public function ausentismos()
    {
        $foreingKey = 'COAU_ID';
        return $this->hasMany(Ausentismo::class, $foreingKey);
    }

    public function prorrogaausentismos()
    {
        $foreingKey = 'COAU_ID';
        //return $this->hasMany(ProrrogaAusentismo::class, $foreingKey);
    }


}

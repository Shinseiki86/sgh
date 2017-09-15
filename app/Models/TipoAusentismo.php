<?php namespace SGH\Models;

use Illuminate\Database\Eloquent\Model as Model;
use SGH\Models\ModelWithSoftDeletes;
use Illuminate\Validation\Rule;

class TipoAusentismo extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "TIPOAUSENTISMOS";
    protected $primaryKey =  'TIAU_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'TIAU_FECHACREADO';
    const UPDATED_AT = 'TIAU_FECHAMODIFICADO';
    const DELETED_AT = 'TIAU_FECHAELIMINADO';
    protected $dates = ['TIAU_FECHACREADO','TIAU_FECHAMODIFICADO','TIAU_FECHAELIMINADO'];

    public $fillable = [
        "TIAU_CODIGO",
		"TIAU_DESCRIPCION",
		"TIAU_OBSERVACIONES"
    ];

    public static function rules($id)
    {
        $rules = [
            "TIAU_CODIGO" => ['required', Rule::unique('TIPOAUSENTISMOS')->ignore($id, 'TIAU_ID')],
            "TIAU_DESCRIPCION" => ['required', Rule::unique('TIPOAUSENTISMOS')->ignore($id, 'TIAU_ID')],
        ];

        return $rules;
    }

    public function conceptoausencias()
    {
        $foreingKey = 'COAU_ID';
        return $this->hasMany(conceptoausencia::class, $foreingKey);
    }


}

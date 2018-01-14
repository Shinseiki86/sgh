<?php 
namespace SGH\Models;

use SGH\Traits\ModelRulesTrait;
use SGH\Traits\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;

class CertificadoContrato extends Model
{
    //use RelationshipsTrait, ModelRulesTrait;

    //Nombre de la tabla en la base de datos   
    protected $table = 'CERTIFICADOSCONTRATOS';
    protected $primaryKey =  'CERT_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'CERT_FECHACREADO';
    const UPDATED_AT = 'CERT_FECHAMODIFICADO';
    protected $dates = ['CERT_FECHACREADO','CERT_FECHAMODIFICADO'];

    public $fillable = [
        'CONT_ID',
        'CERT_CREADOPOR',
    ];

	public static function rules($id = 0){
		$rules = [
			'CONT_ID' => 'required',
		];
		return $rules;
	}


    public function contrato()
    {
        $foreingKey = 'CONT_ID';
        return $this->belongsTo(Contrato::class, $foreingKey);
    }


}

<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Prospecto extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PROSPECTOS';
	protected $primaryKey = 'PROS_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PROS_FECHACREADO';
	const UPDATED_AT = 'PROS_FECHAMODIFICADO';
	const DELETED_AT = 'PROS_FECHAELIMINADO';
	protected $dates = ['PROS_FECHACREADO', 'PROS_FECHAMODIFICADO', 'PROS_FECHAELIMINADO'];

	const CONT_ACTIVO   = 1;

	protected $fillable = [
		'PROS_CEDULA',
		'PROS_FECHAEXPEDICION',
		'PROS_FECHANACIMIENTO',
		'PROS_PRIMERNOMBRE',
		'PROS_SEGUNDONOMBRE',
		'PROS_PRIMERAPELLIDO',
		'PROS_SEGUNDOAPELLIDO',
		'PROS_SEXO',
		'PROS_DIRECCION',
		'PROS_TELEFONO',
		'PROS_CELULAR',
		'PROS_CORREO',
		'PROS_MARCA',
		'PROS_MARCAOBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'PROS_CEDULA'          => ['numeric', 'required', static::unique($id,'PROS_CEDULA')],
			'PROS_FECHAEXPEDICION' => ['required'],
			'PROS_FECHANACIMIENTO' => ['required'],
			'PROS_PRIMERNOMBRE'    => ['required', 'max:100'],
			'PROS_SEGUNDONOMBRE'   => ['max:100'],	
			'PROS_PRIMERAPELLIDO'  => ['required', 'max:100'],
			'PROS_SEGUNDOAPELLIDO' => ['max:100'],
			'PROS_SEXO'            => ['required', 'max:1'],
			'PROS_DIRECCION'       => ['required', 'max:100'],
			'PROS_TELEFONO'        => ['numeric'],
			'PROS_CELULAR'         => ['numeric'],
			'PROS_CORREO'           => ['max:100'],
			'PROS_MARCA'           => ['required', 'max:2'],
			'PROS_MARCAOBSERVACIONES' => ['max:300'],
		];
	}

	public function scopeActivos($query)
	{
		$query = $query 
			->join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'PROSPECTOS.PROS_ID')
			->where('ESCO_ID',1);

		return $query;
	}

	public function scopeRetirados($query)
	{
		//se modifica el metodo debido a que no necesariamente el empleado debe estar retirado para ser remplazado
		$query = $query 
			->join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'PROSPECTOS.PROS_ID');
			//->where('ESCO_ID',2);

		return $query;
	}

	public function contratos()
	{
		$foreingKey = 'PROS_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function jefes()
	{
		$foreingKey = 'JEFE_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function remplazos()
	{
		$foreingKey = 'REMP_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function empleadores()
	{
		$foreingKey = 'PROS_ID';
		return $this->hasMany(Empleador::class, $foreingKey);
	}

	public function temporales()
	{
		$foreingKey = 'PROS_ID';
		return $this->hasMany(Temporal::class, $foreingKey);
	}

	public static function getJefe($PROS_CEDULA)
	{
		$model = new static;
        $prospecto = $model->activos()->where('PROS_CEDULA', $PROS_CEDULA)->first();

        return $prospecto;
    }

    public static function getProspectoPorCedula($PROS_CEDULA)
	{
		$model = new static;
        $prospecto = $model->where('PROS_CEDULA', $PROS_CEDULA)->first();

        return $prospecto;
    }

    public function negocios()
	{
		$foreingKey = 'PROS_ID';
		return $this->hasMany(Negocio::class, $foreingKey);
	}

}

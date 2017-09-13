<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\EstadoContrato;

class EstadoContratoController extends Controller
{
	protected $view = 'cnfg-contratos';
	protected $route = 'estadoscontratos';
	protected $class = EstadoContrato::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'ESCO_DESCRIPCION' => ['required','max:100','unique:ESTADOSCONTRATOS,ESCO_DESCRIPCION,'.$id.',ESCO_ID'],
			'ESCO_OBSERVACIONES' => ['max:300'],
		]);
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$estadoscontratos = EstadoContrato::all();
		//Se carga la vista y se pasan los registros
		return view($this->view.'.'.$this->route.'.index', compact('estadoscontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view.'.'.$this->route.'.create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function edit($ESCO_ID)
	{
		// Se obtiene el registro
		$estadocontrato = EstadoContrato::findOrFail($ESCO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->view.'.'.$this->route.'.edit', compact('estadocontrato'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function update($ESCO_ID)
	{
		parent::updateModel($ESCO_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function destroy($ESCO_ID)
	{
		parent::destroyModel($ESCO_ID);
	}
	
}

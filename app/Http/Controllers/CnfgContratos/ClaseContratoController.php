<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\ClaseContrato;

class ClaseContratoController extends Controller
{
	private $route = 'cnfg-contratos.clasescontratos';
	private $class = ClaseContrato::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:clasescontratos-index', ['only' => ['index']]);
		$this->middleware('permission:clasescontratos-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:clasescontratos-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:clasescontratos-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return Validator
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'CLCO_DESCRIPCION' => ['required','max:100','unique:CLASESCONTRATOS,CLCO_DESCRIPCION,'.$id.',CLCO_ID'],
			'CLCO_OBSERVACIONES' => ['max:300'],
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
		$clasescontratos = ClaseContrato::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('clasescontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel($this->class, $this->route.'.index');
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function edit($CLCO_ID)
	{
		// Se obtiene el registro
		$clasecontrato = ClaseContrato::findOrFail($CLCO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('clasecontrato'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function update($CLCO_ID)
	{
		parent::updateModel($CLCO_ID, $this->class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function destroy($CLCO_ID)
	{
		parent::destroyModel($CLCO_ID, $this->class, $this->route.'.index');
	}
	
}

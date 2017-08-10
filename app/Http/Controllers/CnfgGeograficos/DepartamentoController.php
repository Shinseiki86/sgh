<?php

namespace SGH\Http\Controllers\CnfgGeograficos;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Departamento;

class DepartamentoController extends Controller
{

	private $routeIndex = 'cnfg-geograficos.departamentos.index';

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:depart-index', ['only' => ['index']]);
		$this->middleware('permission:depart-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:depart-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:depart-delete',   ['only' => ['destroy']]);
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
			'DEPA_CODIGO' => ['required', 'numeric', 'unique:DEPARTAMENTOS,DEPA_CODIGO,'.$id.',DEPA_ID'],
			'DEPA_DESCRIPCION' => ['required', 'max:300', 'unique:DEPARTAMENTOS,DEPA_DESCRIPCION,'.$id.',DEPA_ID'],
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
		$departamentos = Departamento::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-geograficos/departamentos/index', compact('departamentos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-geograficos/departamentos/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Departamento::class, $this->routeIndex);
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function edit($DEPA_ID)
	{
		// Se obtiene el registro
		$departamento = Departamento::findOrFail($DEPA_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-geograficos/departamentos/edit', compact('departamento'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function update($DEPA_ID)
	{
		parent::updateModel($DEPA_ID, Departamento::class, $this->routeIndex);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function destroy($DEPA_ID, $showMsg=True)
	{
		parent::destroyModel($DEPA_ID, Departamento::class, $this->routeIndex);
	}


}


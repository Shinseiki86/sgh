<?php

namespace SGH\Http\Controllers\CnfgCasosMedicos;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\EstadoRestriccion;

class EstadoRestriccionController extends Controller
{
	protected $route = 'cnfg-casosmedicos.estadosrestriccion';
	protected $class = EstadoRestriccion::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$estadosrestricciones = EstadoRestriccion::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('estadosrestricciones'));
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
		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ESRE_ID
	 * @return Response
	 */
	public function edit($ESRE_ID)
	{
		// Se obtiene el registro
		$estadorestriccion = EstadoRestriccion::findOrFail($ESRE_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('estadorestriccion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESRE_ID
	 * @return Response
	 */
	public function update($ESRE_ID)
	{
		parent::updateModel($ESRE_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESRE_ID
	 * @return Response
	 */
	public function destroy($ESRE_ID)
	{
		parent::destroyModel($ESRE_ID);
	}
	
}

<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Categoria;

class CategoriaController extends Controller
{
	protected $route = 'cnfg-tickets.categorias';
	protected $class = Categoria::class;

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
	protected function validator($data)
	{
		return Validator::make($data, [
			'CATE_DESCRIPCION' => ['required','max:100'],
			'CATE_OBSERVACIONES' => ['max:300'],
			'CATE_ids' => ['array'],
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
		$categorias = Categoria::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('categorias'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		return view($this->route.'.create', compact('arrProcesos'));
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
	 * @param  int  $CATE_ID
	 * @return Response
	 */
	public function edit($CATE_ID)
	{
		// Se obtiene el registro
		$categoria = Categoria::findOrFail($CATE_ID);

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('categoria', 'arrProcesos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CATE_ID
	 * @return Response
	 */
	public function update($CATE_ID)
	{
		parent::updateModel($CATE_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CATE_ID
	 * @return Response
	 */
	public function destroy($CATE_ID)
	{
		parent::destroyModel($CATE_ID);
	}
	
}

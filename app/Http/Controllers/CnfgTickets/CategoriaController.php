<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tkcategoria-index', ['only' => ['index']]);
		$this->middleware('permission:tkcategoria-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tkcategoria-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tkcategoria-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data)
	{
		$validator = Validator::make($data, [
			'CATE_DESCRIPCION' => ['required','max:100'],
			'CATE_OBSERVACIONES' => ['max:300'],
			'CATE_ids' => ['array'],
		]);

		if ($validator->fails())
			return redirect()->back()
						->withErrors($validator)
						->withInput()->send();
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
		return view('cnfg-tickets/categorias/index', compact('categorias'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		return view('cnfg-tickets/categorias/create', compact('arrProcesos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Datos recibidos desde la vista.
		$data = request()->all();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data);

		//Se crea el registro.
		$categoria = Categoria::create($data);

		// redirecciona al index de controlador
		flash_alert( 'Categoria '.$categoria->CATE_ID.' creada exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.categorias.index');
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
		return view('cnfg-tickets/categorias/edit', compact('categoria', 'arrProcesos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CATE_ID
	 * @return Response
	 */
	public function update($CATE_ID)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data, $CATE_ID);

		// Se obtiene el registro
		$categoria = Categoria::findOrFail($CATE_ID);
		//y se actualiza con los datos recibidos.
		$categoria->update($data);

		// redirecciona al index de controlador
		flash_alert( 'Categoria '.$categoria->CATE_ID.' modificada exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.categorias.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CATE_ID
	 * @return Response
	 */
	public function destroy($CATE_ID, $showMsg=True)
	{
		$categorias = Categoria::findOrFail($CATE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($categorias->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Categoria '.$categorias->CATE_ID.' no se puede borrar.', 'danger' );
		} else {
			$categorias->delete();
				flash_alert( 'Categoria '.$categorias->CATE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.categorias.index');
	}
	
}

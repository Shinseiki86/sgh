<?php

namespace SGH\Http\Controllers\GestionHumana;

use Validator;
use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Prospecto;

class ProspectoController extends Controller
{
	private $route = 'gestion-humana.prospectos';

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:prospectos-index', ['only' => ['index']]);
		$this->middleware('permission:prospectos-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:prospectos-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:prospectos-delete',   ['only' => ['destroy']]);
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
			'PROS_CEDULA'          => ['numeric', 'required', 'unique:PROSPECTOS,PROS_CEDULA,'.$id.',PROS_ID'],
			'PROS_FECHAEXPEDICION' => ['required'],
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
			]);
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->route.'.index', compact('prospectos'));
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = Prospecto::select([
							'PROS_ID',
							'PROS_CEDULA',
							'PROS_FECHAEXPEDICION',
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
						])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				$ruta = route($this->route.'.edit', [ 'PROS_ID'=>$model->PROS_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'PROS_ID', 'PROS_CEDULA', 'prospectos');
			})->make(true);
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
		parent::storeModel(Prospecto::class, $this->route.'.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function edit($PROS_ID)
	{
		// Se obtiene el registro
		$prospecto = Prospecto::findOrFail($PROS_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('prospecto'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function update($PROS_ID)
	{
		parent::updateModel($PROS_ID, Prospecto::class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function destroy($PROS_ID, $showMsg=True)
	{
		parent::destroyModel($PROS_ID, Prospecto::class, $this->route.'.index');
	}

}

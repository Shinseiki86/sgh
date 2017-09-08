<?php

namespace SGH\Http\Controllers\Auth;

use SGH\Http\Requests;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Models\Menu;

class MenuController extends Controller
{
	private $route = 'auth.menu';
	private $class = Menu::class;

	public function __construct()
	{

	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'MENU_LABEL' => ['required','max:20'],
			'MENU_ICON'  => ['required','max:50'],
			'MENU_URL'   => ['max:250'],
		]);
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros, incluyendo menus deshabilitados
		$menusEditTop  = Menu::menus(true, 'TOP');
		$menusEditLeft = Menu::menus(true, 'LEFT');
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('menusEditTop', 'menusEditLeft'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @return Response
	 */
	public function reorder()
	{
		$source       = Input::get('source');
		$position     = Input::get('position');
		$destination  = Input::get('destination')!='' ? Input::get('destination') : 0;

		$item = Menu::find($source)->update([
					'MENU_PARENT' => $destination,
					'MENU_POSITION' => $position,
				]);

		//Si el item contiene subitems, tambien se debe actualizar la posición para ellos.
		$subItems = Menu::where('MENU_PARENT', $source)->update(['MENU_POSITION' => $position]);

		$ordering       = json_decode(Input::get('order'));
		$rootOrdering   = json_decode(Input::get('rootOrder'));

		if(!$ordering){
			$ordering = $rootOrdering;
		}

		foreach($ordering as $order=>$item_id){
			if($itemToOrder = Menu::find($item_id)){
				$itemToOrder->update(['MENU_ORDER'=>$order]);
			}
		}

		$this->refreshMenu();
		return response()->json([
			'status' => 'SAVED',
			'source' => $source,
			'destination' => $destination,
		]);
	}
	
	/**
	 * Actuliza arreglo global en session con los menús disponibles.
	 *
	 * @return void
	 */
	public static function refreshMenu()
	{
		self::destroyMenu();
		session()->put('menusLeft', Menu::menus());
		session()->put('menusTop', Menu::menus(false, 'TOP'));
	}

	/**
	 * Actuliza arreglo global en session con los menús disponibles.
	 *
	 * @return void
	 */
	public static function destroyMenu()
	{
		session()->forget(['menusLeft','menusTop']);
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los Role disponibles
		//$arrMenus = model_to_array(Menu::class, 'MENU_LABEL');

		$arrRoutes = $this->getRoutes();

		return view($this->route.'.create', compact('arrRoutes'));
	}

	private function getRoutes()
	{
		$arrRoutes = ['#'=>'#'];
		foreach (Route::getRoutes() as $value) {
			$uri = $value->getPath();
			if(ends_with($uri, 'create')){
				$uri = str_replace('/create', '', $uri);
				$arrRoutes[$uri] = $uri;
			}
		}
		return $arrRoutes;
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel($this->class, $this->route.'.index');
		$this->refreshMenu();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Se obtiene el registro
		$menu = Menu::findOrFail($id);

		//Se crea un array con los Role disponibles
		//$arrMenus = model_to_array(Menu::class, 'MENU_LABEL');

		$arrRoutes = $this->getRoutes();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('menu', 'arrRoutes'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, $this->class, $this->route.'.index');
		$this->refreshMenu();
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id, $this->class, $this->route.'.index');
		$this->refreshMenu();
	}
	
}

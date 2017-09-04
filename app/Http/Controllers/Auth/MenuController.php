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
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$menusEdit = Menu::menus();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('menusEdit'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @return Response
	 */
	public function reorder()
	{
		$source       = Input::get('source');
		$destination  = Input::get('destination')!='' ? Input::get('destination') : 0;

		$item               = Menu::find($source);
		$item->MENU_PARENT  = $destination;
		$item->save();

		$ordering       = json_decode(Input::get('order'));
		$rootOrdering   = json_decode(Input::get('rootOrder'));

		if($ordering){
			foreach($ordering as $order=>$item_id){
				if($itemToOrder = Menu::find($item_id)){
					$itemToOrder->MENU_ORDER = $order;
					$itemToOrder->save();
				}
			}
		} else {
			foreach($rootOrdering as $order=>$item_id){
				if($itemToOrder = Menu::find($item_id)){
					$itemToOrder->MENU_ORDER = $order;
					$itemToOrder->save();
				}
			}
		}

		session()->forget('menus');
		session()->put('menus', Menu::menus());

		return response()->json([
			'status' => 'OK',
			'source' => $source,
			'MENU_PARENT' => $destination
		]);

	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, Permission::class, $this->route.'.index', ['roles'=>'roles_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, $showMsg=True)
	{
		parent::destroyModel($id, $this->class, $this->route.'.index');
	}
	
}

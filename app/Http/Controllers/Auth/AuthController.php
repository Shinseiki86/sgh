<?php

namespace SGH\Http\Controllers\Auth;

use SGH\User;
use SGH\Rol;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{

	protected $username = 'username';
	
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

        $this->middleware('guest', ['except' => 'logout']);

		/*//Lista de acciones que no requieren autenticación
		$arrActionsLogin = [
			'logout',
			'login',
			'getLogout',
		];

		//Lista de acciones que solo puede realizar los administradores
		$arrActionsAdmin = [
			'index',
			'edit',
			'show',
			'update',
			'destroy',
			'register',
			'showRegistrationForm',
			'getRegister',
			'postRegister',
		];

		//Requiere que el usuario inicie sesión, excepto en la vista logout.
		$this->middleware($this->guestMiddleware(),
			['except' => array_collapse([$arrActionsLogin, $arrActionsAdmin])]
		);*/

	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'username' => 'required|max:15|unique:USERS',
			'email' => 'required|email|max:255|unique:USERS',
			'password' => 'required|min:6|confirmed',
		]);
	}


	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm()
	{
		if (property_exists($this, 'registerView')) {
			return view($this->registerView);
		}

		//Se crea un array con los roles disponibles
		//$arrRoles = model_to_array(Rol::class, 'ROLE_descripcion');
$arrRoles = null;

		// Muestra el formulario de creación y los array para los 'select'
		return view('auth.register', compact('arrRoles'));
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
		$validator = $this->validator($request->all());

		if( $validator->fails() ) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		//Auth::guard($this->getGuard())->login($this->create($request->all()));
		$usuario = $this->create($request->all());

		Session::flash('message', 'Usuario '.$usuario->username.' creado exitosamente!');
		return redirect('usuarios');
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'username' => strtolower($data['username']),
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'created_by' => auth()->user()->username,
		]);
	}


	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function loginUsername()
	{
		//Se modifica para que la autenticación se realice por username y no por email
		return property_exists($this, 'username') ? strtolower($this->username) : 'username';
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$usuarios = User::orderBy('USER_id')->get();

		//Se carga la vista y se pasan los registros
		return view('auth/index', compact('usuarios'));
	}

	/**
	 * Muestra información de un registro.
	 *
	 * @param  int  $USER_id
	 * @return Response
	 */
	public function show($USER_id)
	{
		// Se obtiene el registro
		$usuario = User::findOrFail($USER_id);

		// Muestra la vista y pasa el registro
		return view('auth/show', compact('usuario'));
	}



	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $USER_id
	 * @return Response
	 */
	public function edit($USER_id)
	{
		// Se obtiene el registro
		$usuario = User::findOrFail($USER_id);


		$roles = null;

		// Muestra el formulario de edición y pasa el registro a editar
		return view('auth/edit', compact('usuario', 'roles'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  User|int  $usuario
	 * @return Response
	 */
	public function update($usuario)
	{
		//Validación de datos
		$this->validate(request(), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:USERS,email,'.$USER_id.',id',
		]);

		// Valida si $usuario es un objeto User o el id
		$usuario = isset($usuario->USER_id) ? $usuario : User::findOrFail($usuario);

		$usuario->name = Input::get('name');
		$usuario->email = Input::get('email');
		$usuario->modified_at = auth()->user()->username;
		//Se guarda modelo
		$usuario->save();

		// redirecciona al index de controlador
		Session::flash('message', 'Usuario '.$usuario->username.' modificado exitosamente!');
		return redirect('usuarios');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  User|int  $usuario
	 * @return Response
	 */
	public function destroy($usuario)
	{
		// Valida si $usuario es un objeto User o el id
		$usuario = isset($usuario->USER_id) ? $usuario : User::findOrFail($usuario);

		//Si el usuario fue creado por SYSTEM, no se puede borrar.
		if($usuario->created_by == 'SYSTEM'){
			Session::flash('error-modal', '¡Usuario '.$usuario->username.' no se puede borrar!');
		} else {
			$usuario->delete();
			Session::flash('warning', ['¡Usuario '.$usuario->username.' borrado!']);
		}

		return redirect('usuarios');
	}

}

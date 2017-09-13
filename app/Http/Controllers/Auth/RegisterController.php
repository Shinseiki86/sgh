<?php

namespace SGH\Http\Controllers\Auth;

use SGH\Models\User;
use SGH\Models\Rol;
use SGH\Models\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $view = 'auth';
    protected $route = 'usuarios';
    protected $class = User::class;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
            'cedula' => 'required|max:15|unique:USERS',
            'email' => 'required|email|max:255|unique:USERS',
            'roles_ids' => 'required|array',
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

        //Se crea un array con los Role disponibles
        $arrRoles = model_to_array(Role::class, 'display_name');

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
        parent::storeModel(['roles'=>'roles_ids']);
    }



    /**
     * Muestra una lista de los registros.
     *
     * @return Response
     */
    public function index()
    {
        //Se obtienen todos los registros.
        $usuarios = User::orderBy('USER_ID')->get();
        //Se carga la vista y se pasan los registros
        return view('auth/index', compact('usuarios'));
    }

    /**
     * Muestra el formulario para editar un registro en particular.
     *
     * @param  int  $USER_ID
     * @return Response
     */
    public function edit($USER_ID)
    {
        // Se obtiene el registro
        $usuario = User::findOrFail($USER_ID);

        //Se crea un array con los Role disponibles
        $arrRoles = model_to_array(Role::class, 'display_name');
        $roles_ids = $usuario->roles->pluck('id')->toJson();

        // Muestra el formulario de edición y pasa el registro a editar
        return view('auth/edit', compact('usuario', 'arrRoles', 'roles_ids'));
    }

    /**
     * Actualiza un registro en la base de datos.
     *
     * @param  User|int  $usuario
     * @return Response
     */
    public function update($usuario)
    {
        // Valida si $usuario es un objeto User o el id
        $usuario = isset($usuario->USER_ID) ? $usuario : User::findOrFail($usuario);

        //Validación de datos
        $validator = Validator::make(request()->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:USERS,email,'.$usuario->USER_ID.',USER_ID',
            'cedula' => 'required|numeric|unique:USERS,cedula,'.$usuario->USER_ID.',USER_ID',
        ]);

        if($validator->passes()){
            $usuario->name = Input::get('name');
            $usuario->email = Input::get('email');
            $usuario->cedula = Input::get('cedula');
            $usuario->USER_MODIFICADOPOR = auth()->user()->username;
            //Se guarda modelo
            $usuario->save();

            //Relación con roles
            $roles_ids = Input::has('roles_ids') ? Input::get('roles_ids') : [];
            $usuario->roles()->sync($roles_ids, true);

            // redirecciona al index de controlador
            flash_alert( 'Usuario '.$usuario->username.' modificado exitosamente!', 'success' );
            return redirect()->route('usuarios.index');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
        $usuario = isset($usuario->USER_ID) ? $usuario : User::findOrFail($usuario);

        //Si el usuario fue creado por SYSTEM, no se puede borrar.
        if($usuario->USER_CREADOPOR == 'SYSTEM'){
            flash_modal( '¡Usuario '.$usuario->username.' no se puede borrar!', 'danger' );
        } else {
            $usuario->delete();
            flash_alert( '¡Usuario '.$usuario->username.' borrado!', 'warning' );
        }

        return redirect()->route('usuarios.index')->send();
    }

}

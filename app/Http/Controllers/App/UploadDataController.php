<?php
namespace SGH\Http\Controllers\App;

use SGH\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class UploadDataController extends Controller
{
	protected $route = 'app.upload';
	private $logs = [];

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Muestra formulario para carga de archivo al servidor.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->route.'.index');
	}



	/**
	 * Muestra formulario para carga de archivo al servidor.
	 *
	 * @return Response
	 */
	public function upload()
	{
		$this->validate(request(), [
			'archivo' => ['required', 'file'],
		]);

		if (Input::file('archivo')->isValid()) {

			$archivo = Input::file('archivo');
			$path = $archivo->getRealPath();
			$sheets = Excel::load($path, function($reader) {
			})->get();

			foreach($sheets as $sheet){
				$this->crearRegistros($sheet);
			}
		}
		return redirect()->back()->with($this->logs)->withInput()->send();
	}


	/**
	 * 
	 *
	 */
	protected function crearRegistros($sheet)
	{
		$table = strtoupper($sheet->getTitle());
		$rows = $sheet->toArray();

		try {
			\DB::table($table)->insert($rows);
			$this->logs['success'][] = count($rows).' registros creados en '.$table.'.';
		} catch (\Exception $e){
			$strErr = 'Tabla '.$table.' > ';
			if ($e instanceof \Illuminate\Database\QueryException OR $e instanceof \PDOException)
				$strErr = $strErr . $e->getPrevious()->errorInfo[2];
			else
				$strErr = $strErr . $e->getMessage();

			$this->logs['error'][] = $strErr;
		}
		return $this->logs;
	}


}
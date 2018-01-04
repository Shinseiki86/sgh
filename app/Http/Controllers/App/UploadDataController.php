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

			$results = Excel::load($path, function($reader) {})->get();

			if($results instanceof \Maatwebsite\Excel\Collections\SheetCollection){
				foreach($results as $sheet){
					$table = strtoupper($sheet->getTitle());
					$this->crearRegistros($table, $sheet->toArray());
				}
			} else if($results instanceof \Maatwebsite\Excel\Collections\RowCollection){
				$table = strtoupper($results->getTitle());
				$this->crearRegistros($table, $results->toArray());
			}
		}
		//dd($this->logs);
		return redirect()->back()->with($this->logs)->withInput()->send();
	}


	/**
	 * 
	 *
	 */
	protected function crearRegistros($table, $rows)
	{
		//dump($table);
		foreach (array_chunk($rows, 500) as $rows_chunk) {
			//dump($rows_chunk);
			try {
				\DB::table($table)->insert($rows_chunk);
				$this->logs['success'][] = count($rows_chunk).' registros creados en '.$table.'.';
			} catch (\Exception $e){
				$strErr = 'Tabla '.$table.' > ';
				if ($e instanceof \Illuminate\Database\QueryException OR $e instanceof \PDOException)
					$strErr = $strErr . $e->getPrevious()->errorInfo[2];
				else
					$strErr = $strErr . $e->getMessage();

				$this->logs['error'][] = $strErr;
			}

		}
		return $this->logs;
	}

}
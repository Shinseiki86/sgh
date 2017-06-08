<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use Maatwebsite\Excel\Facades\Excel;

use SGH\Tnl;
use SGH\Incapacidad;
use DateTime;
use Carbon\Carbon;

class UploadController extends Controller
{

	/**
	 * Crea usuarios por ajax cargados desde un archivo de excel.
	 *
	 */
	

	public function index()
	{
		//Se obtienen todos los registros.
		$tnls = Tnl::all();
		$incaps = Incapacidad::all();

		//Se carga la vista 
		return view('admin/uploads/index', compact('tnls','incaps'));
	}

	public function store(){

		// Import a user provided file
		$filetnl = Input::file('archivotnl');
		$fileincap = Input::file('archivoincap');
	    //$filename = $this->doSomethingLikeUpload($file);
	    $arregloincap = array();
		$arreglotnl = array();
		
		
		//leer el excel y crear los registros con el Modelo
		Excel::load($filetnl, function($reader) {

			
			$conttnl = 0;

			foreach ($reader->get() as $tnl) {
				$conttnl++;
				
				Tnl::create([
					'TNLA_EMPRESA' => $tnl->TNLA_EMPRESA,
					'TNLA_IDENTIFICACION'=> $tnl->TNLA_IDENTIFICACION,
					'TNLA_NOMBREEMPLEADO'=> $tnl->TNLA_NOMBREEMPLEADO,
					'TNLA_NOVEDAD'=> $tnl->TNLA_NOVEDAD,
					'TNLA_FECHAINICIO'=> $tnl->TNLA_FECHAINICIO,
					'TNLA_FECHAFINAL'=> $tnl->TNLA_FECHAFINAL,
					'TNLA_TOTALDIAS'=> $tnl->TNLA_TOTALDIAS,
					'TNLA_OBSERVACIONES'=> $tnl->TNLA_OBSERVACIONES,
					'TNLA_DOCUMENTO'=> $tnl->TNLA_DOCUMENTO,
					]);
				
			}
		});

		//leer el excel y crear los registros con el Modelo
		Excel::load($fileincap, function($reader) {

			$contincap = 0;

			foreach ($reader->get() as $incap) {
				$contincap++;
				
				Incapacidad::create([
					'INCA_EMPRESA' => $incap->INCA_EMPRESA,
					'INCA_IDENTIFICACION' => $incap->INCA_IDENTIFICACION,
					'INCA_NOMBREEMPLEADO' => $incap->INCA_NOMBREEMPLEADO,
					'INCA_DX' => $incap->INCA_DX,
					'INCA_DXDESCRIPCION' => $incap->INCA_DXDESCRIPCION,
					'INCA_FECHAINICIO' => $incap->INCA_FECHAINICIO,
					'INCA_TOTALDIAS' => $incap->INCA_TOTALDIAS,
					'INCA_FECHAFINAL' => $incap->INCA_FECHAFINAL,
					'INCA_CONTINGENCIA' => $incap->INCA_CONTINGENCIA,
					'INCA_INIPRO' => $incap->INCA_INIPRO,
					'INCA_FECHAENVIO' => $incap->INCA_FECHAENVIO,
					'INCA_OBSERVACIONES' => $incap->INCA_OBSERVACIONES,
					'INCA_PRIMERDIAAT' => $incap->INCA_PRIMERDIAAT,
					'INCA_DOCUMENTO'=> $incap->INCA_DOCUMENTO,
					]);
				
			}
		});

		//traer todos los registros de TNL e Incapacidades
		$tnls = Tnl::all();
		$incapacidades = Incapacidad::all();

		//declaración de arreglo que contendrá las incapacidades que también estan en TNL
		$arrincapentnl = array();
		//contador para arreglo
		$cont = 0;

		//================================================================
		/*
		crea el arreglo con los registros de incapacidades que estan en los TNL
		en donde coincida el numero de identificación, fecha de inicio y fecha final
		*/
		foreach ($incapacidades as $inc) {
			foreach ($tnls as $tnl) {
				//$format = 'Y-m-d';
				$diainiinca = new Carbon($inc->INCA_FECHAINICIO);
				$diainitnl =  new Carbon($tnl->TNLA_FECHAINICIO);
				$diafininca = new Carbon($inc->INCA_FECHAFINAL);
				$diafintnl =  new Carbon($tnl->TNLA_FECHAFINAL);

				$nota1 = "existe un registro con las mismas fechas en TNL";
				$nota2 = "existe un registro con la misma fecha inicial pero fecha final menor que TNL";
				$nota3 = "exite un registro con la misma fecha final pero fecha inicial mayor que TNL";
				$nota4 = "existe un registro que contiene a esta incapacidad en su lapso";
				
				if(($diainiinca == $diainitnl && $diafininca == $diafintnl) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){
					//array_push($arrincapentnl, $inc);
					$arrincapentnl[$cont] = [

					'INCA_EMPRESA' => $inc->INCA_EMPRESA,
					'INCA_IDENTIFICACION' => $inc->INCA_IDENTIFICACION,
					'INCA_NOMBREEMPLEADO' => $inc->INCA_NOMBREEMPLEADO,
					'INCA_DX' => $inc->INCA_DX,
					'INCA_DXDESCRIPCION' => $inc->INCA_DXDESCRIPCION,
					'INCA_FECHAINICIO' => $inc->INCA_FECHAINICIO,
					'INCA_TOTALDIAS' => $inc->INCA_TOTALDIAS,
					'INCA_FECHAFINAL' => $inc->INCA_FECHAFINAL,
					'INCA_CONTINGENCIA' => $inc->INCA_CONTINGENCIA,
					'INCA_INIPRO' => $inc->INCA_INIPRO,
					'INCA_FECHAENVIO' => $inc->INCA_FECHAENVIO,
					'INCA_OBSERVACIONES' => $inc->INCA_OBSERVACIONES,
					'INCA_PRIMERDIAAT' => $inc->INCA_PRIMERDIAAT,
					'INCA_DOCUMENTO'=> $inc->INCA_DOCUMENTO,
					'INCA_NOTA' => $nota1,

					];
				}

				//si la fecha de inicio es la misma pero la fecha final de inc. es menor
				//que la fecha final del ausentismo
				if(($diainiinca == $diainitnl && $diafininca < $diafintnl) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){
					//array_push($arrincapentnl, $inc);
					$arrincapentnl[$cont] = [

					'INCA_EMPRESA' => $inc->INCA_EMPRESA,
					'INCA_IDENTIFICACION' => $inc->INCA_IDENTIFICACION,
					'INCA_NOMBREEMPLEADO' => $inc->INCA_NOMBREEMPLEADO,
					'INCA_DX' => $inc->INCA_DX,
					'INCA_DXDESCRIPCION' => $inc->INCA_DXDESCRIPCION,
					'INCA_FECHAINICIO' => $inc->INCA_FECHAINICIO,
					'INCA_TOTALDIAS' => $inc->INCA_TOTALDIAS,
					'INCA_FECHAFINAL' => $inc->INCA_FECHAFINAL,
					'INCA_CONTINGENCIA' => $inc->INCA_CONTINGENCIA,
					'INCA_INIPRO' => $inc->INCA_INIPRO,
					'INCA_FECHAENVIO' => $inc->INCA_FECHAENVIO,
					'INCA_OBSERVACIONES' => $inc->INCA_OBSERVACIONES,
					'INCA_PRIMERDIAAT' => $inc->INCA_PRIMERDIAAT,
					'INCA_DOCUMENTO'=> $inc->INCA_DOCUMENTO,
					'INCA_NOTA' => $nota2,

					];
				}

				//si la incapacidad tiene fecha de inicio superior al TNL, pero la fecha final es igual a la de finalización de TNL
				if(($diainiinca > $diainitnl && $diafininca == $diafintnl) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){
					//array_push($arrincapentnl, $inc);
					$arrincapentnl[$cont] = [

					'INCA_EMPRESA' => $inc->INCA_EMPRESA,
					'INCA_IDENTIFICACION' => $inc->INCA_IDENTIFICACION,
					'INCA_NOMBREEMPLEADO' => $inc->INCA_NOMBREEMPLEADO,
					'INCA_DX' => $inc->INCA_DX,
					'INCA_DXDESCRIPCION' => $inc->INCA_DXDESCRIPCION,
					'INCA_FECHAINICIO' => $inc->INCA_FECHAINICIO,
					'INCA_TOTALDIAS' => $inc->INCA_TOTALDIAS,
					'INCA_FECHAFINAL' => $inc->INCA_FECHAFINAL,
					'INCA_CONTINGENCIA' => $inc->INCA_CONTINGENCIA,
					'INCA_INIPRO' => $inc->INCA_INIPRO,
					'INCA_FECHAENVIO' => $inc->INCA_FECHAENVIO,
					'INCA_OBSERVACIONES' => $inc->INCA_OBSERVACIONES,
					'INCA_PRIMERDIAAT' => $inc->INCA_PRIMERDIAAT,
					'INCA_DOCUMENTO'=> $inc->INCA_DOCUMENTO,
					'INCA_NOTA' => $nota3,

					];
				}

				//si la incapacidad se encuentra contenida en un TNL (Ej: TNL desde el 2017-05-01 hasta 2017-05-05 y la incapacidad tiene fechas desde 2017-05-02 hasta 2017-05-03)
				if(($diainiinca > $diainitnl && $diafininca < $diafintnl) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){
					//array_push($arrincapentnl, $inc);
					$arrincapentnl[$cont] = [

					'INCA_EMPRESA' => $inc->INCA_EMPRESA,
					'INCA_IDENTIFICACION' => $inc->INCA_IDENTIFICACION,
					'INCA_NOMBREEMPLEADO' => $inc->INCA_NOMBREEMPLEADO,
					'INCA_DX' => $inc->INCA_DX,
					'INCA_DXDESCRIPCION' => $inc->INCA_DXDESCRIPCION,
					'INCA_FECHAINICIO' => $inc->INCA_FECHAINICIO,
					'INCA_TOTALDIAS' => $inc->INCA_TOTALDIAS,
					'INCA_FECHAFINAL' => $inc->INCA_FECHAFINAL,
					'INCA_CONTINGENCIA' => $inc->INCA_CONTINGENCIA,
					'INCA_INIPRO' => $inc->INCA_INIPRO,
					'INCA_FECHAENVIO' => $inc->INCA_FECHAENVIO,
					'INCA_OBSERVACIONES' => $inc->INCA_OBSERVACIONES,
					'INCA_PRIMERDIAAT' => $inc->INCA_PRIMERDIAAT,
					'INCA_DOCUMENTO'=> $inc->INCA_DOCUMENTO,
					'INCA_NOTA' => $nota4,

					];
				}

			}

			$cont++;	
		}
		//================================================================

		$cont2 = 0;

		//declaración de arreglo que contendrá los TNL que también estan en Incapacidades
		$arrtnlenincap = array();

		foreach ($incapacidades as $inc) {
			foreach ($tnls as $tnl) {
				//$format = 'Y-m-d';
				$diainiinca = new Carbon($inc->INCA_FECHAINICIO);
				$diainitnl =  new Carbon($tnl->TNLA_FECHAINICIO);
				$diafininca = new Carbon($inc->INCA_FECHAFINAL);
				$diafintnl =  new Carbon($tnl->TNLA_FECHAFINAL);

				$nota5 = "existe un registro con las mismas fechas en INCAP.";
				$nota6 = "existe un registro con la misma fecha inicial pero fecha final menor que INCAP";
				$nota7 = "exite un registro con la misma fecha final pero fecha inicial mayor que INCAP";
				$nota8 = "existe un registro que contiene a este TNL en su lapso";
				
				//si los registros tienen las mismas fechas
				if(($diainiinca == $diainitnl && $diafininca == $diafintnl) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){

					$arrtnlenincap[$cont2] = [

					'TNLA_EMPRESA' => $tnl->TNLA_EMPRESA,
					'TNLA_IDENTIFICACION'=> $tnl->TNLA_IDENTIFICACION,
					'TNLA_NOMBREEMPLEADO'=> $tnl->TNLA_NOMBREEMPLEADO,
					'TNLA_NOVEDAD'=> $tnl->TNLA_NOVEDAD,
					'TNLA_FECHAINICIO'=> $tnl->TNLA_FECHAINICIO,
					'TNLA_FECHAFINAL'=> $tnl->TNLA_FECHAFINAL,
					'TNLA_TOTALDIAS'=> $tnl->TNLA_TOTALDIAS,
					'TNLA_OBSERVACIONES'=> $tnl->TNLA_OBSERVACIONES,
					'TNLA_DOCUMENTO'=> $tnl->TNLA_DOCUMENTO,
					'TNLA_NOTA' => $nota5,

					];
				}

				//si la fecha inicial es la misma pero la fecha final de TNL es menor que la fecha final de incapacidad
				if(($diainiinca == $diainitnl && $diafintnl < $diafininca) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){

					$arrtnlenincap[$cont2] = [

					'TNLA_EMPRESA' => $tnl->TNLA_EMPRESA,
					'TNLA_IDENTIFICACION'=> $tnl->TNLA_IDENTIFICACION,
					'TNLA_NOMBREEMPLEADO'=> $tnl->TNLA_NOMBREEMPLEADO,
					'TNLA_NOVEDAD'=> $tnl->TNLA_NOVEDAD,
					'TNLA_FECHAINICIO'=> $tnl->TNLA_FECHAINICIO,
					'TNLA_FECHAFINAL'=> $tnl->TNLA_FECHAFINAL,
					'TNLA_TOTALDIAS'=> $tnl->TNLA_TOTALDIAS,
					'TNLA_OBSERVACIONES'=> $tnl->TNLA_OBSERVACIONES,
					'TNLA_DOCUMENTO'=> $tnl->TNLA_DOCUMENTO,
					'TNLA_NOTA' => $nota6,

					];
				}

				//si la fecha inicial es mayor que la fecha inicial de TNL pero la fecha fin de TNL es igual a la fecha fin de INCAP
				if(($diainitnl > $diainiinca && $diafintnl == $diafininca) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){

					$arrtnlenincap[$cont2] = [

					'TNLA_EMPRESA' => $tnl->TNLA_EMPRESA,
					'TNLA_IDENTIFICACION'=> $tnl->TNLA_IDENTIFICACION,
					'TNLA_NOMBREEMPLEADO'=> $tnl->TNLA_NOMBREEMPLEADO,
					'TNLA_NOVEDAD'=> $tnl->TNLA_NOVEDAD,
					'TNLA_FECHAINICIO'=> $tnl->TNLA_FECHAINICIO,
					'TNLA_FECHAFINAL'=> $tnl->TNLA_FECHAFINAL,
					'TNLA_TOTALDIAS'=> $tnl->TNLA_TOTALDIAS,
					'TNLA_OBSERVACIONES'=> $tnl->TNLA_OBSERVACIONES,
					'TNLA_DOCUMENTO'=> $tnl->TNLA_DOCUMENTO,
					'TNLA_NOTA' => $nota7,

					];
				}

				//si el TNL se encuentra contenido en una incapacidad
				if(($diainitnl > $diainiinca && $diafintnl == $diafininca) && $inc->INCA_IDENTIFICACION == $tnl->TNLA_IDENTIFICACION){

					$arrtnlenincap[$cont2] = [

					'TNLA_EMPRESA' => $tnl->TNLA_EMPRESA,
					'TNLA_IDENTIFICACION'=> $tnl->TNLA_IDENTIFICACION,
					'TNLA_NOMBREEMPLEADO'=> $tnl->TNLA_NOMBREEMPLEADO,
					'TNLA_NOVEDAD'=> $tnl->TNLA_NOVEDAD,
					'TNLA_FECHAINICIO'=> $tnl->TNLA_FECHAINICIO,
					'TNLA_FECHAFINAL'=> $tnl->TNLA_FECHAFINAL,
					'TNLA_TOTALDIAS'=> $tnl->TNLA_TOTALDIAS,
					'TNLA_OBSERVACIONES'=> $tnl->TNLA_OBSERVACIONES,
					'TNLA_DOCUMENTO'=> $tnl->TNLA_DOCUMENTO,
					'TNLA_NOTA' => $nota8,

					];
				}

			}

			$cont2++;	
		}

		
		Excel::create('Depuracion_IncapVsTNL', function($excel) use($arrincapentnl,$arrtnlenincap)  {
 
            $excel->sheet('Incapacidades_En_TNL', function($sheet) use($arrincapentnl, $arrtnlenincap) {  
                $sheet->fromArray($arrincapentnl);
            });

            $excel->sheet('TNL_En_Incapacidades', function($sheet) use($arrincapentnl, $arrtnlenincap) {  
                $sheet->fromArray($arrtnlenincap);
            });
            
        })->export('xls');

	}

	public function create()
	{
		return view('admin/uploads/upload');
	}


}



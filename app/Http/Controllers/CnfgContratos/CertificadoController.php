<?php
namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;

use Carbon\Carbon;

class ContratoController extends Controller
{
    protected $route = 'gestion-humana.contratos';
    protected $class = CertificadoContrato::class;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Muestra una lista de los registros.
     *
     * @return Response
     */
    public function index()
    {
    }

	public function makeCertificado(Contrato $contrato)
	{

        $date = Date::now()->format('l j F Y H:i:s');

        $idcertificado = \DB::table('CERTIFICADOSCONTRATOS')
					        ->insertGetId([
						        'CONT_ID' => $contrato->CONT_ID
					        ]);

        if($data->id_estadocontrato == 1 or $data->id_estadocontrato == 3){
            $view =  \View::make('contratos.invoice', compact('data','date','idcertificado'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('CrtLaboral_'.$data->cedula.'_'.$date.'.pdf');
        } else if($data->id_estadocontrato == 2){
            $view =  \View::make('contratos.retirado', compact('data','date','idcertificado'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('CrtLaboral_'.$data->cedula.'_'.$date.'.pdf');
        }
        
        //return $pdf->download('invoice');
        /* 
        no olvidar agregar funcionalidad de contar cuantos certificados se generan por cada empleado
        con el objetivo de ver cuantas certificaciones genera por mes.
        */
    }

}
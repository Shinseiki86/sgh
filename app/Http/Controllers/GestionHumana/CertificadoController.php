<?php
namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Controllers\Controller;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\CertificadoContrato;

use PDF;
use Carbon\Carbon;

class CertificadoController extends Controller
{
    //protected $route = 'gestion-humana.contratos';
    //protected $class = CertificadoContrato::class;

    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Muestra una lista de los registros.
     *
     * @return Response
     */
    public function index()
    {
    }

	public function buildPdf(Contrato $contrato)
	{
        $today = Carbon::today();

        $certificado = CertificadoContrato::create([
            'CONT_ID' => $contrato->CONT_ID,
            'CERT_CREADOPOR' => 'PRUEBAS'
        ]);

        $view = 'cnfg-contratos/certificadocontrato/carta';
        $empleador = $contrato->empleador;
        $prospecto = $contrato->prospecto;

        //return view($view, compact('empleador', 'certificado', 'prospecto', 'today', 'contrato' ));

        $pdf = PDF::loadView($view, compact('empleador', 'certificado', 'prospecto', 'today', 'contrato' ))
                    ->setPaper('letter', 'portrait');

        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(50, 770, "Pág {PAGE_NUM} de {PAGE_COUNT}", null, 10, [0, 0, 0]);
        
        return $pdf->stream('CrtLaboral_'.$contrato->prospecto->PROS_CEDULA.'_'.$today.'.pdf');

        
        //return $pdf->download('invoice');
        /* 
        no olvidar agregar funcionalidad de contar cuantos certificados se generan por cada empleado
        con el objetivo de ver cuantas certificaciones genera por mes.
        */
    }

}
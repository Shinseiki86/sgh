<?php

use Illuminate\Database\Seeder;

class ContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contrato = new \SGH\Contrato;
    	$contrato->PROS_ID = 1;
    	$contrato->JEFE_ID = 2;
    	$contrato->CONT_CASOMEDICO = 'NO';
    	$contrato->CARG_ID = 1;
    	$contrato->CONT_FECHAINGRESO = '2017-07-01';
    	$contrato->CONT_FECHARETIRO = NULL;
    	$contrato->CONT_SALARIO = 1000000;
    	$contrato->CONT_VARIABLE = 500000;
    	$contrato->CONT_RODAJE = 350000;
    	$contrato->ESCO_ID = 1;
    	$contrato->MORE_ID = NULL;
    	$contrato->TICO_ID = 1;
    	$contrato->CLCO_ID = 1;
    	$contrato->EMPL_ID = 1;
    	$contrato->RIES_ID = 1;
    	$contrato->TIEM_ID = 1;
    	$contrato->CECO_ID = 1;
        $contrato->CIUD_CONTRATA = 1004;
        $contrato->CIUD_SERVICIO = 1004;
        $contrato->CECO_ID = 1;
    	$contrato->CONT_OBSERVACIONES = 'CONTRATO DE PRUEBA';
    	$contrato->save();

    	$contrato = new \SGH\Contrato;
    	$contrato->PROS_ID = 2;
    	$contrato->JEFE_ID = 1;
    	$contrato->CONT_CASOMEDICO = 'NO';
    	$contrato->CARG_ID = 1;
    	$contrato->CONT_FECHAINGRESO = '2017-07-01';
    	$contrato->CONT_FECHARETIRO = NULL;
    	$contrato->CONT_SALARIO = 1000000;
    	$contrato->CONT_VARIABLE = 500000;
    	$contrato->CONT_RODAJE = 350000;
    	$contrato->ESCO_ID = 1;
    	$contrato->MORE_ID = NULL;
    	$contrato->TICO_ID = 1;
    	$contrato->CLCO_ID = 1;
    	$contrato->EMPL_ID = 1;
    	$contrato->RIES_ID = 1;
    	$contrato->TIEM_ID = 1;
    	$contrato->CECO_ID = 1;
        $contrato->CIUD_CONTRATA = 1004;
        $contrato->CIUD_SERVICIO = 1004;
    	$contrato->CONT_OBSERVACIONES = 'CONTRATO DE PRUEBA';
    	$contrato->save();

    }
}

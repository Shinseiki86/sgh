<?php

use Illuminate\Database\Seeder;

class ClasescontratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Clasescontratos');
		
		$clasecontrato = new \SGH\ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'TERMINO INDEFINIDO';
        $clasecontrato->CLCO_OBSERVACIONES =  'CLASE DE CONTRATO DE PRUEBA';
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

        $clasecontrato = new \SGH\ClaseContrato;
        $clasecontrato->CLCO_DESCRIPCION = 'TERMINO FIJO';
        $clasecontrato->CLCO_OBSERVACIONES =  'TIPO DE CONTRATO DE PRUEBA';
        $clasecontrato->CLCO_CREADOPOR =  'SYSTEM';
        $clasecontrato->save();

	}
}

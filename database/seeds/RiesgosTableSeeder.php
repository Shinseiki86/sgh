<?php

use Illuminate\Database\Seeder;
use SGH\Models\Riesgo;

class RiesgosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Clasescontratos');
		
		$riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO I';
        $riesgo->RIES_FACTOR = 0.522;
        $riesgo->RIES_OBSERVACIONES =  NULL;
        $riesgo->RIES_CREADOPOR =  'admin';
        $riesgo->save();

        $riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO II';
        $riesgo->RIES_FACTOR = 1.044;
        $riesgo->RIES_OBSERVACIONES =  NULL;
        $riesgo->RIES_CREADOPOR =  'admin';
        $riesgo->save();

        $riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO III';
        $riesgo->RIES_FACTOR = 2.436;
        $riesgo->RIES_OBSERVACIONES =  NULL;
        $riesgo->RIES_CREADOPOR =  'admin';
        $riesgo->save();

        $riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO IV';
        $riesgo->RIES_FACTOR = 4.350;
        $riesgo->RIES_OBSERVACIONES =  NULL;
        $riesgo->RIES_CREADOPOR =  'admin';
        $riesgo->save();

        $riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO V';
        $riesgo->RIES_FACTOR = 6.960;
        $riesgo->RIES_OBSERVACIONES =  NULL;
        $riesgo->RIES_CREADOPOR =  'admin';
        $riesgo->save();

	}
}

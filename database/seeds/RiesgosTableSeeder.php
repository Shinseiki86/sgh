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
        $riesgo->RIES_OBSERVACIONES =  'RIESGO I';
        $riesgo->RIES_CREADOPOR =  'SYSTEM';
        $riesgo->save();

        $riesgo = new Riesgo;
        $riesgo->RIES_DESCRIPCION = 'RIESGO II';
        $riesgo->RIES_FACTOR = 1.044;
        $riesgo->RIES_OBSERVACIONES =  'RIESGO II';
        $riesgo->RIES_CREADOPOR =  'SYSTEM';
        $riesgo->save();

	}
}

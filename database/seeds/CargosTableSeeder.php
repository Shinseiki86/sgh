<?php

use Illuminate\Database\Seeder;
use SGH\Models\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Cargos');
		
		$cargo = new Cargo;
        $cargo->CARG_DESCRIPCION = 'COORDINADOR DE NÓMINA';
        $cargo->CARG_OBSERVACIONES =  'CARGO DE PRUEBA';
        $cargo->CNOS_ID =  1;
        $cargo->CARG_CREADOPOR =  'SYSTEM';
        $cargo->save();

        $cargo = new Cargo;
        $cargo->CARG_DESCRIPCION = 'CONDUCTOR';
        $cargo->CARG_OBSERVACIONES =  'CARGO DE PRUEBA';
        $cargo->CNOS_ID =  2;
        $cargo->CARG_CREADOPOR =  'SYSTEM';
        $cargo->save();
	}
}

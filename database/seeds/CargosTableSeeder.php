<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->command->info('---Cargos table');
		
		$cargo = new \SGH\Cargo;
        $cargo->CARG_DESCRIPCION = 'COORDINADOR DE NÓMINA';
        $cargo->CARG_OBSERVACIONES =  'CARGO DE PRUEBA';
        $cargo->CNOS_ID =  1;
        $cargo->CARG_CREADOPOR =  'SYSTEM';
        $cargo->save();


		$this->command->info('---FIN CargosTableSeeder');
	}
}

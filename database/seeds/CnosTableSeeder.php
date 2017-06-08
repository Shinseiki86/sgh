<?php

use Illuminate\Database\Seeder;

class CnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Cnos ');
		
		$cno = new \SGH\Cnos;
        $cno->CNOS_CODIGO = '???';
        $cno->CNOS_DESCRIPCION = 'COORDINADORES';
        $cno->CNOS_OBSERVACIONES =  'CLASIFICACIÓN DE OCUPACIÓN DE COORDINADORES';
        $cno->CNOS_CREADOPOR =  'SYSTEM';
        $cno->save();
	}

}

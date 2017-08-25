<?php

use Illuminate\Database\Seeder;
use SGH\Models\Cnos;

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
		
		$cno = new Cnos;
        $cno->CNOS_CODIGO = '001';
        $cno->CNOS_DESCRIPCION = 'COORDINADORES';
        $cno->CNOS_OBSERVACIONES =  'CLASIFICACIÓN DE OCUPACIÓN DE COORDINADORES';
        $cno->CNOS_CREADOPOR =  'SYSTEM';
        $cno->save();

        $cno = new Cnos;
        $cno->CNOS_CODIGO = '002';
        $cno->CNOS_DESCRIPCION = 'OPERATIVOS';
        $cno->CNOS_OBSERVACIONES =  'CLASIFICACIÓN DE OCUPACIÓN DE PERSONAL OPERATIVO';
        $cno->CNOS_CREADOPOR =  'SYSTEM';
        $cno->save();
	}

}

<?php

use Illuminate\Database\Seeder;

class TiposcontratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->command->info('---Tiposcontratos table');
		
		$tipocontrato = new \SGH\Tiposcontrato;
        $tipocontrato->TICO_DESCRIPCION = 'DIRECTO';
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO DE PRUEBA';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();

        $tipocontrato = new \SGH\Tiposcontrato;
        $tipocontrato->TICO_DESCRIPCION = 'TEMPORAL';
        $tipocontrato->TICO_OBSERVACIONES =  'TIPO DE CONTRATO DE PRUEBA';
        $tipocontrato->TICO_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();


		$this->command->info('---FIN TiposcontratoTableSeeder');
	}

}

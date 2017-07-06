<?php

use Illuminate\Database\Seeder;

class TiposIncidentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		//$this->command->info('---Seeder Tiposcontratos');
		
		$tipocontrato = new \SGH\TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'AUSENCIA SIN JUSTIFICACIÓN';
        $tipocontrato->TIIN_OBSERVACIONES =  'INDICA CUANDO UN EMPLEADO NO SE PRESENTÓ A LABORAR';
        $tipocontrato->TIIN_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();

        $tipocontrato = new \SGH\TipoIncidente;
        $tipocontrato->TIIN_DESCRIPCION = 'AGRESIÓN A OTRO COMPAÑERO';
        $tipocontrato->TIIN_OBSERVACIONES =  'AGRESIÓN FÍSICA';
        $tipocontrato->TIIN_CREADOPOR =  'SYSTEM';
        $tipocontrato->save();
	}
}

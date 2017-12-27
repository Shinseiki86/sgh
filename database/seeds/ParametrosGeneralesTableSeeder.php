<?php

use Illuminate\Database\Seeder;
use SGH\Models\ParametroGeneral;

class ParametrosGeneralesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->info('---Seeder ParametrosGenerales');

       	$parametrogeneral = new ParametroGeneral;
	    $parametrogeneral->PAGE_DESCRIPCION = 'DIAS_NOTIFICACION_TEMPORALIDAD';
	    $parametrogeneral->PAGE_VALOR = '300';
	    $parametrogeneral->PAGE_OBSERVACIONES = 'NUMERO DE DÍAS QUE SE ESPECIFICAN PARA TOMARLOS COMO BASE PARA LA GENERACIÓN DE REPORTE DE PROXIMOS A TEMPORALIDAD';
	    $parametrogeneral->PAGE_CREADOPOR = 'SYSTEM';
	    $parametrogeneral->save();
    }
}

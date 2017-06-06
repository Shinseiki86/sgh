<?php

use Illuminate\Database\Seeder;

class EmpleadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('---Empleadores table');
    	
    	$empleador = new \SGH\Empleadore;
    	$empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL CALI S.A ESP';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOCALI';
        $empleador->EMPL_DIRECCION = 'CALLE 70 E BIS # 7-34';
    	$empleador->EMPL_OBSERVACIONES =  'EMPLEADOR DE PRUEBA';
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$empleador = new \SGH\Empleadore;
    	$empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL VALLE S.A ESP';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOVALLE';
        $empleador->EMPL_DIRECCION = 'CALLE 70 E BIS # 7-34';
    	$empleador->EMPL_OBSERVACIONES =  'EMPLEADOR DE PRUEBA';
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$this->command->info('---FIN EmpleadoresTableSeeder');
    }

}

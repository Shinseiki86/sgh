<?php

use Illuminate\Database\Seeder;
use SGH\Models\Empleador;

class EmpleadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Empleadores');
    	
    	$empleador = new Empleador;
    	$empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL CALI S.A ESP';
        $empleador->EMPL_NIT = 900332590;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79398605;
        $empleador->CIUD_CEDULA = 2;
        $empleador->CIUD_DOMICILIO = 1;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'TOMAS SALVADOR MENDOZA PARDO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOCALI';
        $empleador->EMPL_DIRECCION = 'CALLE 70 E BIS # 7-34';
        $empleador->EMPL_CORREO = 'kfrodriguez6@misena.edu.co';
    	$empleador->EMPL_OBSERVACIONES =  'EMPLEADOR DE PRUEBA';
        $empleador->PROS_ID =  4;
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    	$empleador = new Empleador;
    	$empleador->EMPL_RAZONSOCIAL = 'PROMOAMBIENTAL VALLE S.A ESP';
        $empleador->EMPL_NIT = 900235531;
        $empleador->EMPL_CEDULAREPRESENTANTE = 79398605;
        $empleador->CIUD_CEDULA = 2;
        $empleador->CIUD_DOMICILIO = 1;
        $empleador->EMPL_NOMBREREPRESENTANTE = 'TOMAS SALVADOR MENDOZA PARDO';
        $empleador->EMPL_NOMBRECOMERCIAL = 'PROMOVALLE';
        $empleador->EMPL_DIRECCION = 'CALLE 70 E BIS # 7-34';
        $empleador->EMPL_CORREO = 'kfrodriguez6@misena.edu.co';
    	$empleador->EMPL_OBSERVACIONES =  'EMPLEADOR DE PRUEBA';
        $empleador->PROS_ID =  4;
    	$empleador->EMPL_CREADOPOR =  'SYSTEM';
    	$empleador->save();

    }

}

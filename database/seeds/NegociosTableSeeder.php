<?php

use Illuminate\Database\Seeder;
use SGH\Models\Negocio;

class NegociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->info('---Seeder Negocios');

       	$negocio = new Negocio;
	    $negocio->NEGO_DESCRIPCION = 'PROMOCALI R3';
	    $negocio->NEGO_OBSERVACIONES = NULL;
	    $negocio->EMPL_ID = 3;
	    $negocio->PROS_ID = 1;
	    $negocio->NEGO_CREADOPOR = 'admin';
	    $negocio->save();

	    $negocio = new Negocio;
	    $negocio->NEGO_DESCRIPCION = 'PROMOVALLE R1';
	    $negocio->NEGO_OBSERVACIONES = NULL;
	    $negocio->EMPL_ID = 3;
	    $negocio->PROS_ID = 1;
	    $negocio->NEGO_CREADOPOR = 'admin';
	    $negocio->save();

	    $negocio = new Negocio;
	    $negocio->NEGO_DESCRIPCION = 'SURASEO R5';
	    $negocio->NEGO_OBSERVACIONES = NULL;
	    $negocio->EMPL_ID = 3;
	    $negocio->PROS_ID = 1;
	    $negocio->NEGO_CREADOPOR = 'admin';
	    $negocio->save();

	    $negocio = new Negocio;
	    $negocio->NEGO_DESCRIPCION = 'SERAMBIENTAL R2';
	    $negocio->NEGO_OBSERVACIONES = NULL;
	    $negocio->EMPL_ID = 3;
	    $negocio->PROS_ID = 1;
	    $negocio->NEGO_CREADOPOR = 'admin';
	    $negocio->save();

    }
}

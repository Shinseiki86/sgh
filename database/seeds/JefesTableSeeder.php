<?php

use Illuminate\Database\Seeder;

class JefesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $jefe = new \SGH\Jefe;
    	$jefe->PROS_ID = 2;
    	$jefe->JEFE_OBSERVACIONES = 'JEFE DE PRUEBA';
    	$jefe->save();
    }
}

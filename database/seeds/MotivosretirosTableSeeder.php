<?php

use Illuminate\Database\Seeder;
use SGH\Models\MotivoRetiro;

class MotivosRetirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Motivosretiros');
    	
    	$motivoretiro = new MotivoRetiro;
    	$motivoretiro->MORE_DESCRIPCION = 'RENUNCIA VOLUNTARIA';
    	$motivoretiro->MORE_OBSERVACIONES =  'MOTIVO RETIRO DE PRUEBA';
    	$motivoretiro->MORE_CREADOPOR =  'SYSTEM';
    	$motivoretiro->save();

    	$motivoretiro = new MotivoRetiro;
    	$motivoretiro->MORE_DESCRIPCION = 'DESPIDO SIN JUSTA CAUSA';
    	$motivoretiro->MORE_OBSERVACIONES =  'MOREEADOR DE PRUEBA';
    	$motivoretiro->MORE_CREADOPOR =  'SYSTEM';
    	$motivoretiro->save();
    }
}

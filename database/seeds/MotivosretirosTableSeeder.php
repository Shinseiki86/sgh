<?php

use Illuminate\Database\Seeder;

class MotivosretirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('---Motivosretiros table');
    	
    	$motivoretiro = new \SGH\Motivosretiro;
    	$motivoretiro->MORE_DESCRIPCION = 'RENUNCIA VOLUNTARIA';
    	$motivoretiro->MORE_OBSERVACIONES =  'MOTIVO RETIRO DE PRUEBA';
    	$motivoretiro->MORE_CREADOPOR =  'SYSTEM';
    	$motivoretiro->save();

    	$motivoretiro = new \SGH\Motivosretiro;
    	$motivoretiro->MORE_DESCRIPCION = 'DESPIDO SIN JUSTA CAUSA';
    	$motivoretiro->MORE_OBSERVACIONES =  'MOREEADOR DE PRUEBA';
    	$motivoretiro->MORE_CREADOPOR =  'SYSTEM';
    	$motivoretiro->save();

    	$this->command->info('---FIN MotivosretirosTableSeeder');
    }
}

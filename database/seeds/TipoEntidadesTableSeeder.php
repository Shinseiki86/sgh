<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoEntidad;

class TipoEntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @reTIEN void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Empleadores');
    	
        TipoEntidad::create([
            'TIEN_CODIGO' => 'RIESGO',
            'TIEN_DESCRIPCION' => 'Administradora de Riesgos Laborales',
            'TIEN_OBSERVACIONES' => 'Empresas que administran los Riesgos del Empleado',
        ]);

    	TipoEntidad::create([
            'TIEN_CODIGO' => 'SALUD',
            'TIEN_DESCRIPCION' => 'Entidad Promotora de Salud',
            'TIEN_OBSERVACIONES' => 'Empresas que administran la salud del Empleado',
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'RECREACION',
            'TIEN_DESCRIPCION' => 'Cajas de Compensacion',
            'TIEN_OBSERVACIONES' => 'Empresas orientadas a la Recreacion de los Empleados',
        ]);

    }
}

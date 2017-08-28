<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoEntidad;

class TipoEntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TipoEntidad::create([
            'TIEN_CODIGO' => 'ARL',
            'TIEN_DESCRIPCION' => 'Administradora de Riesgos Laborales',
            'TIEN_OBSERVACIONES' => 'Empresas que administran los Riesgos del Empleado',
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'EPS',
            'TIEN_DESCRIPCION' => 'Entidad Promotora de Salud',
            'TIEN_OBSERVACIONES' => 'Empresas que administran la salud del Empleado',
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'CCF',
            'TIEN_DESCRIPCION' => 'Cajas de Compensacion',
            'TIEN_OBSERVACIONES' => 'Empresas orientadas a la Recreacion de los Empleados',
        ]);
    }
}

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
            'TIEN_DESCRIPCION' => 'ADMINISTRADORA DE RIESGOS LABORALES',
            'TIEN_OBSERVACIONES' => NULL,
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'EPS',
            'TIEN_DESCRIPCION' => 'ENTIDADES PROMOTORAS DE SALUD',
            'TIEN_OBSERVACIONES' => NULL,
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'CCF',
            'TIEN_DESCRIPCION' => 'CAJAS DE COMPENSACIÓN',
            'TIEN_OBSERVACIONES' => NULL,
        ]);

        TipoEntidad::create([
            'TIEN_CODIGO' => 'AFP',
            'TIEN_DESCRIPCION' => 'FONDOS DE PENSIONES',
            'TIEN_OBSERVACIONES' => NULL,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use SGH\Models\TipoAusentismo;

class TipoAusentismosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TipoAusentismo::create([
            'TIAU_CODIGO' => 'AT',
            'TIAU_DESCRIPCION' => 'Accidente de Trabajo',
            'TIAU_OBSERVACIONES' => 'Tipo de ausentismo Accidente de Trabajo',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'EP',
            'TIAU_DESCRIPCION' => 'Enfermedad Profesional',
            'TIAU_OBSERVACIONES' => 'Tipo de ausentismo Enfermedad Profesional',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'EG',
            'TIAU_DESCRIPCION' => 'Enfermedad General',
            'TIAU_OBSERVACIONES' => 'Tipo de ausentismo Enfermedad General',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'PE',
            'TIAU_DESCRIPCION' => 'Permisos',
            'TIAU_OBSERVACIONES' => 'Tipo de ausentismo Permisos',
        ]);
    }
}

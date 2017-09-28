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
            'TIAU_CODIGO' => 'INAT',
            'TIAU_DESCRIPCION' => 'INCAPACIDADES POR ACCIDENTES DE TRABAJO',
            'TIAU_OBSERVACIONES' => 'INCAPACIDADES GENERADAS POR ACCIDENTES LABORALES',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'INEG',
            'TIAU_DESCRIPCION' => 'INCAPACIDADES POR ENFERMEDADES GENERALES',
            'TIAU_OBSERVACIONES' => 'INCAPACIDADES GENERADAS POR ENFERMEDAD GENERAL',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'INEP',
            'TIAU_DESCRIPCION' => 'INCAPACIDADES POR ENFERMEDADES PROFESIONALES',
            'TIAU_OBSERVACIONES' => 'INCAPACIDADES GENERADAS POR ENFERMEDAD PROFESIONAL',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'PLRE',
            'TIAU_DESCRIPCION' => 'PERMISOS Y LICENCIAS REMUNERADAS',
            'TIAU_OBSERVACIONES' => 'PERMISOS Y LICENCIAS EN LOS CUALES EL EMPLEADO PERCIBE DEVENGO',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'PLNR',
            'TIAU_DESCRIPCION' => 'PERMISOS Y LICENCIAS NO REMUNERADAS',
            'TIAU_OBSERVACIONES' => 'PERMISOS Y LICENCIAS EN LOS CUALES EL EMPLEADO NO PERCIBE DEVENGO',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'AUSJ',
            'TIAU_DESCRIPCION' => 'AUSENCIAS LABORALES SIN JUSTIFICACIÓN',
            'TIAU_OBSERVACIONES' => 'AUSENCIAS LABORALES DONDE EL EMPLEADO NO CUENTA CON JUSTIFICACIÓN',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'SANC',
            'TIAU_DESCRIPCION' => 'SANCIONES',
            'TIAU_OBSERVACIONES' => 'SANCIONES AL EMPLEADO',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'VACA',
            'TIAU_DESCRIPCION' => 'VACACIONES',
            'TIAU_OBSERVACIONES' => 'VACACIONES DEL EMPLEADO',
        ]);

       TipoAusentismo::create([
            'TIAU_CODIGO' => 'OTRO',
            'TIAU_DESCRIPCION' => 'OTRAS AUSENCIAS NO TIPIFICADAS',
            'TIAU_OBSERVACIONES' => 'OTRAS AUSENCIAS QUE NO CUENTAN CON TIPIFICACIÓN',
        ]);
    }
}
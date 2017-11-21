<?php

use Illuminate\Database\Seeder;
use SGH\Models\Sancion;

class SancionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sanciones = [
            [
                'SANC_DESCRIPCION' => 'OPORTUNIDAD DE MEJORA',
                'SANC_OBSERVACIONES' => 'INDICA QUE AL EMPLEADO SE LE HIZO UNA RETROALIMENTACIÓN PARA MEJORAMIENTO.',
                'SANC_CREADOPOR' => 'admin',
            ],
            [
                'SANC_DESCRIPCION' => 'LLAMADO DE ATENCIÓN',
                'SANC_OBSERVACIONES' => 'INDICA QUE AL EMPLEADO SE LE HIZO UN LLAMADO DE ATENCIÓN POR ESCRITO.',
                'SANC_CREADOPOR' => 'admin',
            ],[
                'SANC_DESCRIPCION' => 'SUSPENSIÓN',
                'SANC_OBSERVACIONES' => 'INDICA QUE EL EMPLEADO FUÉ SUSPENDIDO.',
                'SANC_CREADOPOR' => 'admin',
            ],[
                'SANC_DESCRIPCION' => 'DESPIDO CON JUSTA CAUSA',
                'SANC_OBSERVACIONES' => 'INDICA QUE EL EMPLEADO LE FUE TERMINADO EL CONTRATO DE FORMA UNILATERAL POR JUSTA CAUSA.',
                'SANC_CREADOPOR' => 'admin',
            ],[
                'SANC_DESCRIPCION' => 'DESPIDO SIN JUSTA CAUSA',
                'SANC_OBSERVACIONES' => 'INDICA QUE EL EMPLEADO LE FUE TERMINADO EL CONTRATO DE FORMA UNILATERAL SIN JUSTA CAUSA.',
                'SANC_CREADOPOR' => 'admin',
            ],[
                'SANC_DESCRIPCION' => 'EXONERACIÓN',
                'SANC_OBSERVACIONES' => 'INDICA QUE EL EMPLEADO QUEDÓ EXONERADO DEL PROCESO.',
                'SANC_CREADOPOR' => 'admin',
            ],
        ];

        foreach ($sanciones as $sancion) {
            Sancion::create($sancion);
        }
        
    }
}
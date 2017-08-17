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
        //
        $sancion = new Sancion;
        $sancion->SANC_DESCRIPCION = 'SUSPENSIÓN';
        $sancion->SANC_OBSERVACIONES =  'INDICA QUE EL EMPLEADO FUÉ SUSPENDIDO';
        $sancion->SANC_CREADOPOR =  'SYSTEM';
        $sancion->save();

        $sancion = new Sancion;
        $sancion->SANC_DESCRIPCION = 'LLAMADO DE ATENCIÓN';
        $sancion->SANC_OBSERVACIONES =  'INDICA QUE AL EMPLEADO SE LE HIZO UN LLAMADO DE ATENCIÓN POR ESCRITO';
        $sancion->SANC_CREADOPOR =  'SYSTEM';
        $sancion->save();
    }
}

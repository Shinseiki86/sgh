<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SGH\Pais::create([
            'PAIS_CODIGO'       => 57,
            'PAIS_NOMBRE'  =>  'COLOMBIA',
        ]);
    }
}
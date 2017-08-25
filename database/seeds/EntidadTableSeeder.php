<?php

use Illuminate\Database\Seeder;
use SGH\Models\Entidad;

class EntidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Entidad::create([
            'ENTI_CODIGO' => 'EPS005',
            'ENTI_NIT' => '8002514406',
            'ENTI_RAZONSOCIAL' => 'E.P.S. SANITAS S.A.',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '1',
        ]);

        Entidad::create([
            'ENTI_CODIGO' => 'EPS001',
            'ENTI_NIT' => '8301138310',
            'ENTI_RAZONSOCIAL' => 'COLMEDICA ENTIDAD PROMOTORA DE SALUD S.A.',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '2',
        ]);
    

        Entidad::create([
            'ENTI_CODIGO' => '14-25',
            'ENTI_NIT' => '8002261753',
            'ENTI_RAZONSOCIAL' => 'COLMENA RIESGOS PROFESIONALES S.A.',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '3',
        ]);

             
        Entidad::create([
            'ENTI_CODIGO' => '14-5',
            'ENTI_NIT' => '8600025286',
            'ENTI_RAZONSOCIAL' => 'COMPAÑIA AGRICOLA DE SEGUROS DE VIDA S.A.',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '1',
        ]);


        Entidad::create([
            'ENTI_CODIGO' => 'CCF23',
            'ENTI_NIT' => '8600066060',
            'ENTI_RAZONSOCIAL' => 'CAJA DE COMPENSACION FAMILIAR COMFENALCO CUNDINAMARCA',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '2',
        ]);


             
         Entidad::create([
            'ENTI_CODIGO' => 'EPS012',
            'ENTI_NIT' => '8903030935',
            'ENTI_RAZONSOCIAL' => 'COMFENALCO VALLE',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '3',
        ]);

       

        Entidad::create([
            'ENTI_CODIGO' => 'CCF',
            'ENTI_NIT' => '8600669427',
            'ENTI_RAZONSOCIAL' => 'CAJA DE COMPENSACION FAMILIAR COMPENSAR',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '1',
        ]);

        Entidad::create([
            'ENTI_CODIGO' => 'EPS023',
            'ENTI_NIT' => '8300097830',
            'ENTI_RAZONSOCIAL' => 'CRUZBLANCA S.A.',
            'ENTI_OBSERVACIONES' => '',
            'TIEN_ID' => '2',
        ]);
    }
}

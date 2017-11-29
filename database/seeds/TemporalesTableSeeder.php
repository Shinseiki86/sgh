<?php

use Illuminate\Database\Seeder;
use SGH\Models\Temporal;
use Faker\Factory as Faker;

class TemporalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        //$this->command->info('---Seeder Temporales');
        
        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'PROSERVIS TEMPORALES SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'PROSERVIS';
        $temporal->TEMP_DIRECCION = 'CALLE 38N # 3CN-92';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  5;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'PROSERVIS TRANSPORTES SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'PROSERVIS TRANSPORTES';
        $temporal->TEMP_DIRECCION = 'CALLE 38N # 3HN-31';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  5;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'ATIEMPO SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'ATIEMPO';
        $temporal->TEMP_DIRECCION = 'PIE DEL CERRO CALLE 30 No. 17-220';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'EXTRAS SA';
        $temporal->TEMP_NOMBRECOMERCIAL = 'EXTRAS';
        $temporal->TEMP_DIRECCION = 'AV 5N # 23AN-35 BARIO SAN VICENTE';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'GENTES SA';
        $temporal->TEMP_NOMBRECOMERCIAL = 'GENTES';
        $temporal->TEMP_DIRECCION = 'CALLE 34N 2 BIS-60 BARIO SAN VICENTE';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'GENTEFICIENTE SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'GENTEFICIENTE';
        $temporal->TEMP_DIRECCION = 'AV 4TA NORTE # 44N-47 BARIO LA FLORA';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'SOMOS SUMINISTRO TEMPORAL SA';
        $temporal->TEMP_NOMBRECOMERCIAL = 'SOMOS';
        $temporal->TEMP_DIRECCION = 'CRA 48 No. 95-56 BOGOTA';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'LAZOS EMPRESARIALES SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'SOMOS';
        $temporal->TEMP_DIRECCION = 'CARRERA 48 95 5 BOGOTA';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  5;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'SOLUCIONES EMPRESARIALES TEMPORALES SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'SOLUTEMP';
        $temporal->TEMP_DIRECCION = 'CARERA. 18 #63-35, BOGOTA';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'SOTELO VELEZ LTDA';
        $temporal->TEMP_NOMBRECOMERCIAL = 'SOVEL';
        $temporal->TEMP_DIRECCION = 'CABRERO, CALLE REAL # 43-73 CARTAGENA';
        $temporal->TEMP_OBSERVACIONES =  NULL;
        $temporal->PROS_ID =  5;
        $temporal->TEMP_CREADOPOR =  'admin';
        $temporal->save();

    }

}
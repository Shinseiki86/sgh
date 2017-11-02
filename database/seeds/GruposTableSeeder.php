<?php

use Illuminate\Database\Seeder;
use SGH\Models\Grupo;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('---Seeder Grupos');

        //PROMOCALI    	
    	$grupo = new Grupo;
    	$grupo->GRUP_DESCRIPCION = 'AVENIDA DEL RIO';
    	$grupo->GRUP_OBSERVACIONES =  NULL;
    	$grupo->GRUP_CREADOPOR =  'admin';
    	$grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'PRADOS DEL NORTE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CALIMA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'SENA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CHAPINERO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        //PROMOVALLE
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'LIMONAR';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'EL INGENIO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'NAPOLES';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'VALLE DEL LILI';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        //===================================SERAMBIENTAL==============================//
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE GIRARDOT';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE RICAURTE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE ESPINAL';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE MELGAR';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE TOCAIMA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE ARBELAEZ';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE FLANDES';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE COELLO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE GUAMO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE FUSAGASUGA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE AGUA DE DIOS';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1,7); //TAMBIEN PARA CENCOASEO
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE SALDANA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE NILO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CORFERIAS BOGOTA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ZIPAQUIRA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ESTACION DE TRASFERENCIA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'BRL ZIPAQUIRA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'RELLENO UBATE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        //===================================CENTRAL COLOMBIANA DE ASEO==============================//
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'RELLENO SANITARIO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(7);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE CHIQUINQUIRA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(7);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'RELLENO CHIQUINQUIRA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(7);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'MUNICIPIO DE TOCAIMA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(7);
        $grupo->empleadores()->sync($empleadores);

        //=================================PROMOAMBIENTAL CARIBE=========================//
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'BOCAGRANDE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CENTRO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'CANAPOTE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ALCIBIA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ALPES';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'POZON';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

    	
        //===================================ADMINISTRATIVOS==============================//
        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS PROMOCALI';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(4);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS PROMOVALLE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(3);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS SURASEO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();

        $empleadores = array(5);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS SERAMBIENTAL';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();
        
        $empleadores = array(1);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS CENCOASEO';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();
        
        $empleadores = array(7);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS PACARIBE';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();
        
        $empleadores = array(2);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS PROMOAMBIENTAL';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();
        
        $empleadores = array(6);
        $grupo->empleadores()->sync($empleadores);

        $grupo = new Grupo;
        $grupo->GRUP_DESCRIPCION = 'ADMINISTRATIVOS METALMECANICA';
        $grupo->GRUP_OBSERVACIONES =  NULL;
        $grupo->GRUP_CREADOPOR =  'admin';
        $grupo->save();
        
        $empleadores = array(8);
        $grupo->empleadores()->sync($empleadores);

    }
}

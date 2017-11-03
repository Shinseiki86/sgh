<?php

use Illuminate\Database\Seeder;
use SGH\Models\Gerencia;

class GerenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->command->info('---Seeder Gerencias');

		
        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA NACIONAL DE GESTIÓN HUMANA';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE REGULACIÓN Y FACTURACIÓN';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA GENERAL';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE OPERACIONES';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA FINANCIERA Y CONTRALORIA';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE MANTENIMIENTO';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA CLUS';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE GESTION HUMANA';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA JURIDICA';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE VENTAS';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save(); 

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA ADMINISTRATIVA';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(1,2,3,4,5,6,7,8);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA DE CANALES Y GESTIÓN SOCIAL';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save();

        $empleadores = array(2,8,6);
        $gerencia->empleadores()->sync($empleadores);

        $gerencia = new Gerencia;
        $gerencia->GERE_DESCRIPCION = 'GERENCIA SERVICIO ESPECIAL DE ASEO (RESIDUOS HOSPITALARIOS)';
        $gerencia->GERE_OBSERVACIONES =  NULL;
        $gerencia->GERE_CREADOPOR =  'admin';
        $gerencia->save(); 

        $empleadores = array(4);
        $gerencia->empleadores()->sync($empleadores);

    }

}
		
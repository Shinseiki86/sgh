<?php

use Illuminate\Database\Seeder;
use SGH\Models\CentroCosto;

class CentrosCostosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->command->info('---Seeder Centroscostos');

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '010101';
        $centrocosto->CECO_DESCRIPCION = 'GERENCIA GENERAL';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(3);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '010201';
        $centrocosto->CECO_DESCRIPCION = 'REVISORIA FISCAL';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(5);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '010301';
        $centrocosto->CECO_DESCRIPCION = 'OFICINA CENTRAL';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(3);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '020101';
        $centrocosto->CECO_DESCRIPCION = 'FINANCIERA Y CONTRALORIA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(5);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '020201';
        $centrocosto->CECO_DESCRIPCION = 'CONTABILIDAD';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(5);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '020301';
        $centrocosto->CECO_DESCRIPCION = 'CARTERA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(5);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '020401';
        $centrocosto->CECO_DESCRIPCION = 'TESORERIA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(5);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '030101';
        $centrocosto->CECO_DESCRIPCION = 'REGULACION Y FACTURACION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(2);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '030201';
        $centrocosto->CECO_DESCRIPCION = 'SERVICIO AL CLIENTE';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(2);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '030301';
        $centrocosto->CECO_DESCRIPCION = 'FACTURACION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(2);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040101';
        $centrocosto->CECO_DESCRIPCION = 'ADMINISTRACION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040202';
        $centrocosto->CECO_DESCRIPCION = 'CALIDAD';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);        

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040301';
        $centrocosto->CECO_DESCRIPCION = 'COMPRAS Y ALMACEN';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040401';
        $centrocosto->CECO_DESCRIPCION = 'SISTEMAS';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040501';
        $centrocosto->CECO_DESCRIPCION = 'SERVICIOS GENERALES';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '040601';
        $centrocosto->CECO_DESCRIPCION = 'GESTION AMBIENTAL';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(11);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '050101';
        $centrocosto->CECO_DESCRIPCION = 'GESTION HUMANA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(1,8);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '050201';
        $centrocosto->CECO_DESCRIPCION = 'SALUD OCUPACIONAL Y SEGURIDAD INDUSTRIAL';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(1,8);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '050301';
        $centrocosto->CECO_DESCRIPCION = 'BIENESTAR Y DESARROLLO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(1,8);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '060101';
        $centrocosto->CECO_DESCRIPCION = 'VENTAS';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(10);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '070101';
        $centrocosto->CECO_DESCRIPCION = 'JURIDICA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(9);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32130';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE RECOLECCION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32137';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32231';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE TRANSPORTE';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32237';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32332';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE REALIZACION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,7);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32337';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32433';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE TRASLADO DE CARGA';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32527';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE CLASIFICACIÓN DE RESIDUOS';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32628';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE PLANIFICACIÓN DE TRANSFORMACIÓN';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32735';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE DEPURACIÓN DE RESIDUOS';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32832';
        $centrocosto->CECO_DESCRIPCION = 'CORTE DE CESPED Y PODA DE ARBOLES';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,7);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32837';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32932';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE REALIZACION';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,7);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '32937';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '33030';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE RH';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,13);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '33037';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO OPERATIVO DE MANTENIMIENTO RH';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,6,13);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '33181';
        $centrocosto->CECO_DESCRIPCION = 'PROCESO COMERCIAL DE FACTURACION Y RECAUDO 3';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(2);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '39001';
        $centrocosto->CECO_DESCRIPCION = 'COSTOS COMPARTIDOS DE OPERACIONES';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,6);
        $centrocosto->gerencias()->sync($gerencias);

        $centrocosto = new CentroCosto;
        $centrocosto->CECO_CODIGO = '39002';
        $centrocosto->CECO_DESCRIPCION = 'COSTOS COMPARTIDOS DE MANTENIMIENTO';
        $centrocosto->CECO_OBSERVACIONES =  NULL;
        $centrocosto->CECO_CREADOPOR =  'admin';
        $centrocosto->save();

        $gerencias = array(4,6);
        $centrocosto->gerencias()->sync($gerencias);
		
	}
}

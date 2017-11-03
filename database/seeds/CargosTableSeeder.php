<?php

use Illuminate\Database\Seeder;
use SGH\Models\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('---Seeder Cargos');

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SOLDADOR LIDER';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 369;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SOLDADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 369;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE CLUS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE FINANCIERO CONTRALOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE FINANCIERO CONTRALOR NACIONAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE GENERAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 4;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE JURIDICO NACIONAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE NACIONAL DE GESTION HUMANA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 6;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE TECNICO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE DE PROYECTOS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE GENERAL ZONA NORTE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 4;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE DE GESTION SOCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE DE OPERACIONES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE COMERCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 8;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE ADMINISTRATIVO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE DE MANTENIMIENTO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE DE RELLENO SANITARIO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 33;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GERENTE FINANCIERO CORPORATIVO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR ADMINISTRATIVO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR DE MANTENIMIENTO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR DE MICRO RUTAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR NACIONAL DE COMPRAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR DE VENTAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 8;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR NACIONAL DE REGULACION Y FACTURACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR NACIONAL DE SEGURIDAD Y SALUD EN EL TRABAJO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 7;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR FINANCIERO Y CONTRALOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR NACIONAL DE ADMINISTRACION DE PERSONAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 6;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'DIRECTOR FINANCIERO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE ADMINISTRATIVO DE GESTION HUMANA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 6;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE DE CARTERA Y SUI';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE DE CONTABILIAD';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 5;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE NACIONAL DE SEGURIDAD Y SALUD EN EL TRABAJO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE DE FACTURACION Y CATASTRO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE DE SISTEMAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 131;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR AMBIENTAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE ALMACEN';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE MANTENIMIENTO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE NOMINA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 253;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE OPERACIONES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE SERVICIO AL CLIENTE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR OPERATIVO DE PLANTA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE PLANTA Y GESTION AMBIENTAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE SUMINISTROS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE FACTURACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE CALIDAD Y CONTROL INTERNO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR ADMINISTRATIVO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE PQR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR SISTEMA DE GESTION SEGURIDAD INDUSTRIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE CARTERA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE SISTEMAS Y SUI';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR COMERCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE CONTROL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE MANTENIMIENTO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE OPERACIONES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE SERVICIOS GENERALES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE PLANTA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE OPERACIONES CLUS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'SUPERVISOR DE ALMACEN';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA CONTABLE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA SENIOR DE BIENESTAR Y DESARROLLO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 264;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE CARTERA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE FACTURACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE INFORMACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 264;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE NOMINA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 253;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE SERVICIO AL CLIENTE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 277;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA FINANCIERA SENIOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA SENIOR DE FACTURACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA SENIOR DE GESTION AMBIENTAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 163;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA SENIOR SISTEMA DE CALIDAD';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 264;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE CONTROL Y ESTADISTICA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 264;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE ADMINISTRATIVA Y COMERCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE CONTABLE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE DE GERENCIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE DE GESTION HUMANA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE JURIDICA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 107;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE DE FACTURACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE REPARACIONES LOCATIVAS Y MENSAJERIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR ADMINISTRATIVA DE OPERACIONES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE ALMACEN Y COMPRAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CARTERA OFICINA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CARTERA TERRENO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CENSO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE VENTAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE DIGITACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE LOGISTICA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR ADMINISTRATIVO DE MANTENIMIENTO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE REPARACIONES LOCATIVAS Y JARDINERIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE REPARACIONES LOCATIVAS Y SERVICIOS GENERALES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE SERVICIO AL CLIENTE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE SERVICIOS GENERALES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR OPERATIVO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AFORADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE ALMACEN';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR ADMINISTRATIVO DE ALMACEN';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR PQR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CARTERA TELEFONICO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR ADMINISTRATIVO CONTABLE';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE SOLDADURA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 369;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR CALL CENTER';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 21;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASESOR COMERCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 209;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASESOR JURIDICO (OFICINA BOGOTA)';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 107;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASESOR JURIDICO DE COBRANZAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 107;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASESOR JURIDICO LOCAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 107;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GESTOR SOCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 138;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GESTOR AMBIENTAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 63;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'GESTOR DE GRANDES GENERADORES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 199;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONTADOR NIFF';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONTADOR BOGOTA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'RADIOPERADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'RECEPCIONISTA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 265;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'APRENDIZ SENA ETAPA LECTIVA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'APRENDIZ SENA ETAPA PRODUCTIVA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LIDER DE PROYECTOS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'PROFESIONAL EN SISTEMAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 131;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'INSPECTOR DE FLOTA II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'INSPECTOR DE SEGURIDAD Y SALUD EN EL TRABAJO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'EJECUTIVO DE VENTAS GRANDES PRODUCTORES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 209;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR SERVICIO ESPECIAL DE ASEO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR INSTRUCTOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 463;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR MENSAJERO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 463;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR MINICARGADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR SUPERNUMERARIO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR SUPERNUMERAIRO II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR OPERACIONES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR DE GERENCIA GENERAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 463;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE RECOLECCION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE RECOLECCION II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE RECOLECCION RUTA HOSPITALARIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE RECOLECCION SUPERNUMERARIO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE RECOLECCION SUPERNUMERARIO II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AYUDANTE DE SOLDADURA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 369;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE BARRIDO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE BARRIDO II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE BARRIDO SUPERNUMERARIO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE LLANTAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE PLANTA RUTA HOSPITALARIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE RECOLECCION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE JARDINERIA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ELECTRICISTA AUTOMOTRIZ';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ELECTROMECANICO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'INGENERIO DE PROYECTOS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'INGENIERO AMBIENTAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 84;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LAVADOR ENGRASADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LAVADOR ENGRASADOR II';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LUBRICADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'MECANICO I';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'MECANICO CARRO TALLER';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'MECANICO HIDRAULICO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'MECANICO DE PATIO I';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'MECANICO LUBRICADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'PINTOR LAMINADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'PLANEADOR';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'TESORERA CENTRAL (BOGOTA)';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 115;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LIDER DE CONTENERIZACION';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();
      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'LLANTERO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 485;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo->CARG_DESCRIPCION = 'ASISTENTE ADMINISTRATIVA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'OPERARIO DE RESPEL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CUADRANTE LIMPIO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR DE CONTROL DE LLANTAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 423;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'JEFE DE PLANTA';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE SEGURIDAD Y SALUD EN EL TRABAJO';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'COORDINADOR DE COMPRAS';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE CONTABLE (BOGOTA)';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ASISTENTE DE GERENCIA (BOGOTA)';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 221;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'AUXILIAR COMERCIAL';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 209;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE RELACIONES LABORALES';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'ANALISTA DE SELECCIÓN';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 503;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();

      $cargo = new Cargo;
      $cargo->CARG_DESCRIPCION = 'CONDUCTOR (BOGOTA)';
      $cargo->CARG_OBSERVACIONES = NULL;
      $cargo->CNOS_ID = 466;
      $cargo->CARG_CREADOPOR = 'admin';
      $cargo->save();


  }
}

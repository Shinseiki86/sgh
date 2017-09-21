<?php

use Illuminate\Database\Seeder;
use SGH\Models\Turno;
use SGH\Models\Empleador;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //======================================================================
        //PROMOCALI - PROMOVALLE - SURASEO - SERAMBIENTAL - PACARIBE - CENCOASEO
    	$this->command->info('---Seeder Turnos');

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #1 (06:00 - 14:00)';
        $turno->TURN_CODIGO = 'T1';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '14:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save(); 

        $empleadores = array(1,2,3,4,5,6,7,8);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #2 (14:00 - 22:00)';
        $turno->TURN_CODIGO = 'T2';
        $turno->TURN_HORAINICIOPI = '14:00:00';
        $turno->TURN_HORAFINALPI = '22:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1,2,3,4,5,6,8);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #3 (22:00 - 06:00)';
        $turno->TURN_CODIGO = 'T3';
        $turno->TURN_HORAINICIOPI = '22:00:00';
        $turno->TURN_HORAFINALPI = '06:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1,2,3,4,5,6,8);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #4 (18:00 - 02:00)';
        $turno->TURN_CODIGO = 'T4';
        $turno->TURN_HORAINICIOPI = '18:00:00';
        $turno->TURN_HORAFINALPI = '02:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1,2,3,4,5,6,8);
        $turno->empleadores()->sync($empleadores);
        //======================================================================

        //======================================================================
        //PROMOCALI - PROMOVALLE - SURASEO

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #5 (10:00 - 18:00)';
        $turno->TURN_CODIGO = 'T5';
        $turno->TURN_HORAINICIOPI = '10:00:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(3,4,5);
        $turno->empleadores()->sync($empleadores);

        //PROMOCALI - PROMOVALLE - SURASEO - CENCOASEO
        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #6 (20:00 - 04:00)';
        $turno->TURN_CODIGO = 'T6';
        $turno->TURN_HORAINICIOPI = '20:00:00';
        $turno->TURN_HORAFINALPI = '04:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1,3,4,5);
        $turno->empleadores()->sync($empleadores);

        //======================================================================

        //======================================================================
        //CENTRA COLOMBIANA DE ASEO
        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #7 (12:00 - 20:00)';
        $turno->TURN_CODIGO = 'T7';
        $turno->TURN_HORAINICIOPI = '12:00:00';
        $turno->TURN_HORAFINALPI = '20:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(7);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #8 (04:00 - 12:00)';
        $turno->TURN_CODIGO = 'T8';
        $turno->TURN_HORAINICIOPI = '04:00:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(7);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #9 (07:00 - 16:00)';
        $turno->TURN_CODIGO = 'T9';
        $turno->TURN_HORAINICIOPI = '07:00:00';
        $turno->TURN_HORAFINALPI = '16:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(7);
        $turno->empleadores()->sync($empleadores);
        //======================================================================

        //======================================================================
        //PROMOCARIBE - SERAMBIENTAL
        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #10 (15:00 - 23:00)';
        $turno->TURN_CODIGO = 'T10';
        $turno->TURN_HORAINICIOPI = '15:00:00';
        $turno->TURN_HORAFINALPI = '23:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,1,6);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #11 (04:00 - 12:00)';
        $turno->TURN_CODIGO = 'T11';
        $turno->TURN_HORAINICIOPI = '04:00:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,1,6);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #12 (05:00 - 13:00)';
        $turno->TURN_CODIGO = 'T12';
        $turno->TURN_HORAINICIOPI = '05:00:00';
        $turno->TURN_HORAFINALPI = '13:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,1,6);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #13 (07:00 - 15:00)';
        $turno->TURN_CODIGO = 'T13';
        $turno->TURN_HORAINICIOPI = '07:00:00';
        $turno->TURN_HORAFINALPI = '15:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,1,6);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #14 (13:00 - 21:00)';
        $turno->TURN_CODIGO = 'T14';
        $turno->TURN_HORAINICIOPI = '13:00:00';
        $turno->TURN_HORAFINALPI = '21:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,6);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #15 (21:00 - 05:00)';
        $turno->TURN_CODIGO = 'T15';
        $turno->TURN_HORAINICIOPI = '21:00:00';
        $turno->TURN_HORAFINALPI = '05:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,1,6);
        $turno->empleadores()->sync($empleadores);
        //======================================================================

        //======================================================================
        //SERAMBIENTAL
        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #16 (12:00 - 20:00)';
        $turno->TURN_CODIGO = 'T16';
        $turno->TURN_HORAINICIOPI = '12:00:00';
        $turno->TURN_HORAFINALPI = '20:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

       $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #17 (07:30 - 12:00 -- 14:00 - 17:30)';
        $turno->TURN_CODIGO = 'T17';
        $turno->TURN_HORAINICIOPI = '07:30:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = '14:00:00';
        $turno->TURN_HORAFINALSI = '17:30:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #18 (08:00 - 16:30)';
        $turno->TURN_CODIGO = 'T18';
        $turno->TURN_HORAINICIOPI = '08:00:00';
        $turno->TURN_HORAFINALPI = '16:30:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #19 (19:00 - 03:00)';
        $turno->TURN_CODIGO = 'T19';
        $turno->TURN_HORAINICIOPI = '19:00:00';
        $turno->TURN_HORAFINALPI = '03:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #20 (03:00 - 11:00)';
        $turno->TURN_CODIGO = 'T20';
        $turno->TURN_HORAINICIOPI = '03:00:00';
        $turno->TURN_HORAFINALPI = '11:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #21 (16:00 - 20:00)';
        $turno->TURN_CODIGO = 'T21';
        $turno->TURN_HORAINICIOPI = '16:00:00';
        $turno->TURN_HORAFINALPI = '20:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #22 (06:00 - 10:00)';
        $turno->TURN_CODIGO = 'T22';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '10:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #23 (11:00 - 18:00)';
        $turno->TURN_CODIGO = 'T23';
        $turno->TURN_HORAINICIOPI = '11:00:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #24 (04:00 - 08:00)';
        $turno->TURN_CODIGO = 'T24';
        $turno->TURN_HORAINICIOPI = '04:00:00';
        $turno->TURN_HORAFINALPI = '08:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #25 (06:00 - 10:00 -- 16:00 - 20:00)';
        $turno->TURN_CODIGO = 'T25';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '10:00:00';
        $turno->TURN_HORAINICIOSI = '16:00:00';
        $turno->TURN_HORAFINALSI = '20:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #26 (06:00 - 12:00 -- 14:00 - 16:00)';
        $turno->TURN_CODIGO = 'T26';
        $turno->TURN_HORAINICIOPI = '06:00:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = '14:00:00';
        $turno->TURN_HORAFINALSI = '16:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #27 (03:00 - 07:00 -- 13:00 - 17:00)';
        $turno->TURN_CODIGO = 'T27';
        $turno->TURN_HORAINICIOPI = '03:00:00';
        $turno->TURN_HORAFINALPI = '07:00:00';
        $turno->TURN_HORAINICIOSI = '13:00:00';
        $turno->TURN_HORAFINALSI = '17:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #28 (04:00 - 09:00 -- 14:00 - 17:00)';
        $turno->TURN_CODIGO = 'T28';
        $turno->TURN_HORAINICIOPI = '04:00:00';
        $turno->TURN_HORAFINALPI = '09:00:00';
        $turno->TURN_HORAINICIOSI = '14:00:00';
        $turno->TURN_HORAFINALSI = '17:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #29 (13:00 - 17:00 -- 22:00 - 02:00)';
        $turno->TURN_CODIGO = 'T29';
        $turno->TURN_HORAINICIOPI = '13:00:00';
        $turno->TURN_HORAFINALPI = '17:00:00';
        $turno->TURN_HORAINICIOSI = '22:00:00';
        $turno->TURN_HORAFINALSI = '02:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #30 (08:00 - 17:00)';
        $turno->TURN_CODIGO = 'T30';
        $turno->TURN_HORAINICIOPI = '08:00:00';
        $turno->TURN_HORAFINALPI = '17:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #31 (09:00 - 18:00)';
        $turno->TURN_CODIGO = 'T31';
        $turno->TURN_HORAINICIOPI = '09:00:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #32 (19:00 - 03:00)';
        $turno->TURN_CODIGO = 'T32';
        $turno->TURN_HORAINICIOPI = '19:00:00';
        $turno->TURN_HORAFINALPI = '03:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #33 (16:00 - 00:00)';
        $turno->TURN_CODIGO = 'T33';
        $turno->TURN_HORAINICIOPI = '19:00:00';
        $turno->TURN_HORAFINALPI = '03:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #34 (08:00 - 12:00 -- 14:00 - 18:00)';
        $turno->TURN_CODIGO = 'T34';
        $turno->TURN_HORAINICIOPI = '08:00:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = '14:00:00';
        $turno->TURN_HORAFINALSI = '18:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #35 (07:00 - 12:00 -- 13:00 - 16:00)';
        $turno->TURN_CODIGO = 'T35';
        $turno->TURN_HORAINICIOPI = '07:00:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = '13:00:00';
        $turno->TURN_HORAFINALSI = '16:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #36 (07:30 - 12:00 -- 13:30 - 17:00)';
        $turno->TURN_CODIGO = 'T36';
        $turno->TURN_HORAINICIOPI = '07:30:00';
        $turno->TURN_HORAFINALPI = '12:00:00';
        $turno->TURN_HORAINICIOSI = '13:30:00';
        $turno->TURN_HORAFINALSI = '17:00:00';
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO #37 (17:00 - 01:00)';
        $turno->TURN_CODIGO = 'T37';
        $turno->TURN_HORAINICIOPI = '17:00:00';
        $turno->TURN_HORAFINALPI = '01:00:00';
        $turno->TURN_HORAINICIOSI = NULL;
        $turno->TURN_HORAFINALSI = NULL;
        $turno->TURN_TIPOTURNO = 'OPERATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        //======================================================================

        //TURNOS ADMINISTRATIVOS 
        //======================================================================
        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO ADMINISTRATIVO PACARIBE (07:00 - 17:00)';
        $turno->TURN_CODIGO = 'ADM-PACA';
        $turno->TURN_HORAINICIOPI = '07:00:00';
        $turno->TURN_HORAFINALPI = '17:00:00';
        $turno->TURN_HORAINICIOSI = '08:00:00';
        $turno->TURN_HORAFINALSI = '11:00:00';
        $turno->TURN_TIPOTURNO = 'ADMINISTRATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,6,8);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO PACARIBE SERV. GENERALES (06:30 - 16:30)';
        $turno->TURN_CODIGO = 'PACA-SRG';
        $turno->TURN_HORAINICIOPI = '06:30:00';
        $turno->TURN_HORAFINALPI = '16:30:00';
        $turno->TURN_HORAINICIOSI = '08:00:00';
        $turno->TURN_HORAFINALSI = '11:00:00';
        $turno->TURN_TIPOTURNO = 'ADMINISTRATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(2,6,8);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO ADMINISTRATIVO CALI (07:15 - 17:00)';
        $turno->TURN_CODIGO = 'ADM-CALI';
        $turno->TURN_HORAINICIOPI = '07:15:00';
        $turno->TURN_HORAFINALPI = '17:00:00';
        $turno->TURN_HORAINICIOSI = '08:30:00';
        $turno->TURN_HORAFINALSI = '12:00:00';
        $turno->TURN_TIPOTURNO = 'ADMINISTRATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(3,4,5);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO ADMINISTRATIVO SERAMBIENTAL (07:30 - 18:00)';
        $turno->TURN_CODIGO = 'ADM-SER';
        $turno->TURN_HORAINICIOPI = '07:30:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = '08:00:00';
        $turno->TURN_HORAFINALSI = '11:00:00';
        $turno->TURN_TIPOTURNO = 'ADMINISTRATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(1);
        $turno->empleadores()->sync($empleadores);

        $turno = new Turno;
        $turno->TURN_DESCRIPCION = 'TURNO ADMINISTRATIVO CENCOASEO (08:00 - 18:00)';
        $turno->TURN_CODIGO = 'ADM-CEN';
        $turno->TURN_HORAINICIOPI = '08:00:00';
        $turno->TURN_HORAFINALPI = '18:00:00';
        $turno->TURN_HORAINICIOSI = '08:00:00';
        $turno->TURN_HORAFINALSI = '12:00:00';
        $turno->TURN_TIPOTURNO = 'ADMINISTRATIVO';
        $turno->TURN_OBSERVACIONES = NULL;
        $turno->save();

        $empleadores = array(7);
        $turno->empleadores()->sync($empleadores);
        //======================================================================

    }
}

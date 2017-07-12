<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTickets extends Migration
{
    private $nomTabla = 'TICKETS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TICKETS: tabla que contiene los tickets generados)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('TICK_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla tickets.');

            $table->string('TICK_DESCRIPCION', 3000)
                ->comment('descripción del ticket');

            $table->datetime('TICK_FECHASOLICITUD')
                ->comment('fecha de solicitud de ticket');

            $table->date('TICK_FECHAEVENTO')
                ->comment('fecha del evento');

            $table->date('TICK_FECHAAPROBACION')
                ->nullable()
                ->comment('fecha en que el jefe inmediato aprueba la solicitud del proceso disciplinario');

            $table->date('TICK_FECHACIERE')
                ->nullable()
                ->comment('fecha en que se cierra el caso');

            $table->datetime('TICK_FECHACUMPLIMIENTO')
                ->nullable()
                ->comment('fecha de cumplimiento de ticket');

            $table->string('TICK_ARCHIVO', 500)
                ->comment('archivos relacionadas con el ticket')->nullable();

            $table->unsignedInteger('CONT_ID')
                ->comment('relacion a la tabla contratos');

            $table->unsignedInteger('ESTI_ID')
                ->comment('relacion a la tabla estados tickets');

            $table->unsignedInteger('ESAP_ID')
                ->comment('relacion a la tabla estados de aprobaciones');

            $table->unsignedInteger('SANC_ID')
                ->nullable()
                ->comment('relacion a la tabla de sanciones');

            $table->string('TICK_CONCLUSION', 3000)
                ->nullable()
                ->comment('descripción del ticket');

            $table->unsignedInteger('PRIO_ID')
                ->comment('relacion a la tabla prioridades');

            $table->unsignedInteger('CATE_ID')
                ->comment('relacion a la tabla categorias');

            $table->unsignedInteger('TIIN_ID')
                ->comment('relacion a la tabla tipos de incidente');

            $table->string('TICK_OBSERVACIONES', 3000)
                ->nullable()
                ->comment('observaciones del ticket');
            
            //Traza
            $table->string('TICK_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TICK_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TICK_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TICK_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TICK_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TICK_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla CONTRATOS
            $table->foreign('CONT_ID')
                ->references('CONT_ID')
                ->on('CONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla ESTADOSTICKETS
            $table->foreign('ESTI_ID')
                ->references('ESTI_ID')
                ->on('ESTADOSTICKETS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla ESTADOSAPROBACIONES
            $table->foreign('ESAP_ID')
                ->references('ESAP_ID')
                ->on('ESTADOSAPROBACIONES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla SANCIONES
            $table->foreign('SANC_ID')
                ->references('SANC_ID')
                ->on('SANCIONES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla PRIORIDADES
            $table->foreign('PRIO_ID')
                ->references('PRIO_ID')
                ->on('PRIORIDADES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla CATEGORIAS
            $table->foreign('CATE_ID')
                ->references('CATE_ID')
                ->on('CATEGORIAS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Relación con tabla TIPOS DE INCIDENTES
            $table->foreign('TIIN_ID')
                ->references('TIIN_ID')
                ->on('TIPOSINCIDENTES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
        
        if(env('DB_CONNECTION') == 'pgsql')
            DB::statement("COMMENT ON TABLE ".env('DB_SCHEMA').".\"".$this->nomTabla."\" IS '".$commentTabla."'");
        elseif(env('DB_CONNECTION') == 'mysql')
            DB::statement("ALTER TABLE ".$this->nomTabla." COMMENT = '".$commentTabla."'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        echo '- Borrando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::drop($this->nomTabla);
    }
}

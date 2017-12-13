<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosPlantasTable extends Migration
{
    private $nomTabla = 'MOVIMIENTOS_PLANTAS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'MOVIMIENTOS DE PLANTAS: tabla que contiene los registros de movimientos sobre las plantas de personal autorizadas';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('MOPL_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla movimientos_plantas.');

            $table->unsignedInteger('PALA_ID')
                ->comment('relacion a la tabla plantas autorizadas');

            $table->date('MOPL_FECHAMOVIMIENTO')
                ->comment('fecha del movimiento de la planta');

            $table->string('MOPL_MOTIVO', 300)
                ->comment('descripción del motivo de movimiento');

            $table->Integer('MOPL_CANTIDAD')
                ->comment('numero entero del movimiento (puede ser positivo o negativo)');

            $table->string('MOPL_OBSERVACIONES', 3000)
                ->nullable()
                ->comment('observaciones del movimiento de planta');
            
            //Traza
            $table->string('MOPL_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('MOPL_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('MOPL_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('MOPL_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('MOPL_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('MOPL_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relación con tabla CONTRATOS
            $table->foreign('PALA_ID')
                ->references('PALA_ID')
                ->on('PLANTASLABORALES')
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
        Schema::dropIfExists($this->nomTabla);
    }
}

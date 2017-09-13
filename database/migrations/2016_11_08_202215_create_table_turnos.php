<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTurnos extends Migration
{
    
    private $nomTabla = 'TURNOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        $commentTabla = 'TURNOS: contiene los turnos de trabajo de la organización';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('TURN_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleadores.');

            $table->string('TURN_DESCRIPCION', 300)
                ->comment('descripción del turno de trabajo');

            $table->string('TURN_CODIGO', 10)
                ->comment('codigo del turno de trabajo');

            $table->time('TURN_HORAINICIO')
                ->comment('hora de inicio del turno de trabajo');

            $table->time('TURN_HORAFINAL')
                ->comment('hora de finalización del turno de trabajo');

            $table->string('TURN_OBSERVACIONES', 300)
                ->nullable()
                ->comment('observaciones del turno de trabajo');
            
            //Traza
            $table->string('TURN_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TURN_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TURN_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TURN_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TURN_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TURN_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioridadesTable extends Migration
{
    private $nomTabla = 'PRIORIDADES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'PRIORIDADES DE TICKETS: contiene las prioridades disponibles para los tickets';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('PRIO_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('PRIO_DESCRIPCION', 100)
                ->comment('descripción de la prioridad de ticket Ej: baja, alta');

            $table->string('PRIO_COLOR', 100)
                ->comment('color de la prioridad de ticket');

            $table->string('PRIO_OBSERVACIONES', 300)
                ->comment('observaciones de la prioridad de ticket')->nullable();
            
            //Traza
            $table->string('PRIO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('PRIO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('PRIO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('PRIO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('PRIO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('PRIO_FECHAELIMINADO')->nullable()
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

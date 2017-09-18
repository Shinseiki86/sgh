<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposIncidentesTable extends Migration
{
    private $nomTabla = 'TIPOSINCIDENTES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TIPOS DE INCIDENTES DE TICKETS: contiene los tipos de incidentes para los tickets';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('TIIN_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('TIIN_DESCRIPCION', 100)
                ->comment('descripción del tipod de incidente de ticket Ej: llegada tarde, inasistencia, etc.');

            $table->string('TIIN_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de incidente')->nullable();
            
            //Traza
            $table->string('TIIN_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TIIN_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TIIN_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TIIN_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TIIN_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TIIN_FECHAELIMINADO')->nullable()
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

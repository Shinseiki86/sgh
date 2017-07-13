<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadosaprobaciones extends Migration
{
    private $nomTabla = 'ESTADOSAPROBACIONES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'ESTADOS DE APROBACIONES: contiene los estados disponibles para las aprobaciones de tickets por parte de los jefes inmediatos';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('ESAP_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('ESAP_DESCRIPCION', 100)
                ->comment('descripción del estado de aprobacion Ej: en espera de autorizacion, en tramite, etc');

            $table->string('ESAP_COLOR', 100)
                ->comment('color del estado de aprobacion');

            $table->string('ESAP_OBSERVACIONES', 300)
                ->comment('observaciones del estado de aprobacion')->nullable();
            
            //Traza
            $table->string('ESAP_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ESAP_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ESAP_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ESAP_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ESAP_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ESAP_FECHAELIMINADO')->nullable()
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
        Schema::drop($this->nomTabla);
    }
}

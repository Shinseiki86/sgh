<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanciones extends Migration
{
    private $nomTabla = 'SANCIONES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'SANCIONES: contiene las sanciones que se generan para cerrar un proceso disciplinarío';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('SANC_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('SANC_DESCRIPCION', 100)
                ->comment('descripción del estado de ticket Ej: abierto, cerrado');

            $table->string('SANC_OBSERVACIONES', 300)
                ->comment('observaciones del estado de ticket')->nullable();
            
            //Traza
            $table->string('SANC_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('SANC_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('SANC_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('SANC_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('SANC_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('SANC_FECHAELIMINADO')->nullable()
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

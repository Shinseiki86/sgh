<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCentrocostos extends Migration
{

    private $nomTabla = 'CENTROSCOSTOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CENTROS DE COSTOS: tabla que contiene los centros de costos existentes)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('CECO_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla centro de costos.');

            $table->string('CECO_CODIGO', 50)
                ->unique()
                ->comment('codigo del centro de costos');

            $table->string('CECO_DESCRIPCION', 300)
                ->comment('descripción de la gerencia, ej: gerencia de ventas, gerencia de mercadeo');

            $table->string('CECO_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('CECO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CECO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CECO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CECO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CECO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CECO_FECHAELIMINADO')->nullable()
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticosGeneralesTable extends Migration
{
    private $nomTabla = 'DIAGNOSTICOSGENERALES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'DIAGNOSTICOS GENERALES: contien la información de diagnosticos generales del personal con restricciones médicas';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('DIGE_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla diagnosticos generales.');

            $table->string('DIGE_DESCRIPCION', 300)
                ->comment('descripción del diagnostico general.');

            $table->string('DIGE_OBSERVACIONES', 300)
                ->comment('observaciones del diagnostico general')->nullable();
            
            //Traza
            $table->string('DIGE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('DIGE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('DIGE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('DIGE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('DIGE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('DIGE_FECHAELIMINADO')->nullable()
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

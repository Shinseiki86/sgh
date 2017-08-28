<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRiesgos extends Migration
{

     private $nomTabla = 'RIESGOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'RIESGOS: contiene la información del escalafon de riesgos existentes. Ej: uno (0.522), dos (1.044), etc.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('RIES_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla riesgos.');

            $table->string('RIES_DESCRIPCION', 100)
                ->comment('descripción del riesgo');

            $table->double('RIES_FACTOR', 4, 3)
                ->comment('factor del riesgo');

            $table->string('RIES_OBSERVACIONES', 300)
                ->comment('observaciones del riesgo')->nullable();
            
            //Traza
            $table->string('RIES_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('RIES_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('RIES_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('RIES_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('RIES_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('RIES_FECHAELIMINADO')->nullable()
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

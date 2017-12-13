<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosRestriccionesTable extends Migration
{
    private $nomTabla = 'ESTADOSRESTRICCION';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'ESTADOS RESTRICCIONES: contien la información de los estados del personal con restricciones médicas';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('ESRE_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla estados de restriccion.');

            $table->string('ESRE_DESCRIPCION', 300)
                ->comment('descripción del estado de restricción.');

            $table->string('ESRE_OBSERVACIONES', 300)
                ->comment('observaciones del estado de restricción')->nullable();
            
            //Traza
            $table->string('ESRE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ESRE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ESRE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ESRE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ESRE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ESRE_FECHAELIMINADO')->nullable()
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

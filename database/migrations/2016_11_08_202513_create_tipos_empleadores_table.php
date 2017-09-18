<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposEmpleadoresTable extends Migration
{
    
    private $nomTabla = 'TIPOSEMPLEADORES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TIPOS DE EMPLEADORES: contien la información de tipos de empleados existentes. Ej: directo, temporal, etc';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('TIEM_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla tipos de empleadores.');

            $table->string('TIEM_DESCRIPCION', 100)
                ->comment('descripción del tipo de empleador.');

            $table->string('TIEM_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de empleador')->nullable();
            
            //Traza
            $table->string('TIEM_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TIEM_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TIEM_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TIEM_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TIEM_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TIEM_FECHAELIMINADO')->nullable()
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

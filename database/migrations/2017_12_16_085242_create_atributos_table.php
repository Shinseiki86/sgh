<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtributosTable extends Migration
{
    private $nomTabla = 'ATRIBUTOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'ATRIBUTOS: contiene los atributos que pueden ser asociados a los diferentes contratos.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('ATRI_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla atributos.');

            $table->string('ATRI_DESCRIPCION', 300)
                ->comment('descripción del atributo.');

            $table->string('ATRI_OBSERVACIONES', 300)
                ->comment('observaciones del atributo')->nullable();
            
            //Traza
            $table->string('ATRI_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ATRI_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ATRI_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ATRI_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ATRI_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ATRI_FECHAELIMINADO')->nullable()
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

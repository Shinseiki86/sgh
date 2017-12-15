<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadesMedicasTable extends Migration
{
    private $nomTabla = 'NOVEDADESMEDICAS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'NOVEDADESMEDICAS: contiene las novedades del personal con restricciones medicas';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('NOME_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla novedades medicas.');

            $table->date('NOME_FECHANOVEDAD')
                ->comment('fecha de la novedad');

            $table->string('NOME_DESCRIPCION', 300)
                ->comment('descripción de la novedad médica');

            $table->string('NOME_OBSERVACIONES', 300)
                ->comment('observaciones del caso medico')->nullable();

            $table->unsignedInteger('CAME_ID')
                ->comment('referencia al caso médico');
            
            //Traza
            $table->string('NOME_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('NOME_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('NOME_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('NOME_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('NOME_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('NOME_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones
            $table->foreign('CAME_ID')
                ->references('CAME_ID')
                ->on('CASOSMEDICOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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

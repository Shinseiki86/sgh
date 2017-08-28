<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCargos extends Migration
{

    private $nomTabla = 'CARGOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CARGOS: contiene los cargos desempeñados en la organización.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('CARG_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla CARGO.');

            $table->string('CARG_DESCRIPCION', 100)
                ->comment('descripción del cargo Ej: operario, gerente administrativo');

            $table->integer('CNOS_ID')->unsigned();

            $table->string('CARG_OBSERVACIONES', 300)
                ->comment('observaciones del cargo')->nullable();
            
            //Traza
            $table->string('CARG_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CARG_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CARG_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CARG_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CARG_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CARG_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla CNOS
            $table->foreign('CNOS_ID')
                ->references('CNOS_ID')
                ->on('CNOS')
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

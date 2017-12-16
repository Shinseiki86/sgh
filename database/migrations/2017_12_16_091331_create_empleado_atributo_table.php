<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoAtributoTable extends Migration
{
    private $nomTabla = 'EMPLEADOATRIBUTO';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'EMPLEADOATRIBUTO: contiene los atributos asociados a los diferentes contratos.';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->increments('EMAT_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla empleado atributos.');

            $table->unsignedInteger('CONT_ID')
                ->comment('referencia al contrato');

            $table->unsignedInteger('ATRI_ID')
                ->comment('referencia al atributo');

            $table->date('EMAT_FECHA')
                ->comment('fecha de la asociación del atributo');

            $table->string('EMAT_OBSERVACIONES', 300)
                ->comment('observaciones del registro')->nullable();
            
            //Traza
            $table->string('EMAT_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('EMAT_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('EMAT_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('EMAT_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('EMAT_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('EMAT_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones
            $table->foreign('CONT_ID')
                ->references('CONT_ID')
                ->on('CONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ATRI_ID')
                ->references('ATRI_ID')
                ->on('ATRIBUTOS')
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantasLaboralesTable extends Migration
{
    private $nomTabla = 'PLANTASLABORALES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'PLANTAS LABORALES: contiene las plantas de personal autorizadas por cada empresa';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->increments('PALA_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->integer('EMPL_ID')->unsigned()
                ->comment('Empleador el cual tiene la planta autorizada');

            $table->integer('GERE_ID')->unsigned()
                ->comment('Gerencia en la cual tiene la planta autorizada');

            $table->integer('CARG_ID')->unsigned()
                ->comment('Cargo asociado al empleador el cual tiene el cargo autorizado');

            $table->integer('PALA_CANTIDAD')
                ->comment('Cantidad de empleados autorizados ');

                       
            //Traza
            $table->string('PALA_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('PALA_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('PALA_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('PALA_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('PALA_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('PALA_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relaciones

            $table->foreign('EMPL_ID')
                ->references('EMPL_ID')
                ->on('EMPLEADORES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

             $table->foreign('GERE_ID')
                ->references('GERE_ID')
                ->on('GERENCIAS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CARG_ID')
                ->references('CARG_ID')
                ->on('CARGOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //$table->primary(array('EMPL_ID', 'CARG_ID'));



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

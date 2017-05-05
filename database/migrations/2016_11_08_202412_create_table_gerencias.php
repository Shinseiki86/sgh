<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGerencias extends Migration
{
    
    private $nomTabla = 'GERENCIAS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'GERENCIAS: contiene las gerencias existentes de los empleadores)';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            
            $table->unsignedInteger('GERE_ID')->primary()
                ->comment('Valor autonumérico, llave primaria de la tabla gerencias.');

            $table->string('GERE_DESCRIPCION', 100)
                ->unique()
                ->comment('descripción de la gerencia, ej: gerencia de ventas, gerencia de mercadeo');

            $table->integer('EMPL_ID')->unsigned();

            $table->string('GERE_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('GERE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('GERE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('GERE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('GERE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('GERE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('GERE_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla EMPLEADORES
            $table->foreign('EMPL_ID')
                ->references('EMPL_ID')
                ->on('EMPLEADORES')
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
        Schema::drop($this->nomTabla);
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadoscontrato extends Migration
{

     private $nomTabla = 'ESTADOSCONTRATOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'ESTADOS DE CONTRATOS: contiene la información de estados de contratos existentes. Ej: activo, retirado, vacaciones, etc.';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('ESCO_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla estados de contratos.');

            $table->string('ESCO_DESCRIPCION', 100)
                ->comment('descripción del estado de contrato Ej: indefinido, fijo');

            $table->string('ESCO_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('ESCO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('ESCO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('ESCO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('ESCO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('ESCO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('ESCO_FECHAELIMINADO')->nullable()
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
        Schema::drop($this->nomTabla);
    }
}

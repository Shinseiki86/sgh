<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTiposcontratos extends Migration
{
    
    private $nomTabla = 'TIPOSCONTRATOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'TIPOS DE CONTRATOS: contiene los tipos de contratos existentes de acuerdo a la ley vigente';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->unsignedInteger('TICO_ID')->primary()
                ->comment('Valor autonumérico, llave primaria de la tabla TICO.');

            $table->string('TICO_DESCRIPCION', 100)
                ->comment('descripción del tipo de contrato Ej: temporal, directo');

            $table->string('TICO_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('TICO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TICO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TICO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TICO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TICO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TICO_FECHAELIMINADO')->nullable()
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

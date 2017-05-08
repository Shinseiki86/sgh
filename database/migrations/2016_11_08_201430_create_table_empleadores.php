<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmpleadores extends Migration
{
    
    private $nomTabla = 'EMPLEADORES';

    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        $commentTabla = 'EMPLEADORES: contiene los empleadores de la organización (empresas)';

        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->unsignedInteger('EMPL_ID')->primary()
                ->comment('Valor autonumérico, llave primaria de la tabla empleadores.');

            $table->string('EMPL_RAZONSOCIAL', 300)
                ->comment('razon social del empleador');

            $table->string('EMPL_NOMBRECOMERCIAL', 300)
                ->comment('nombre comercial del empleador');

            $table->string('EMPL_DIRECCION', 300)
                ->comment('dirección de la empresa');

            $table->string('EMPL_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('EMPL_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('EMPL_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('EMPL_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('EMPL_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('EMPL_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('EMPL_FECHAELIMINADO')->nullable()
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

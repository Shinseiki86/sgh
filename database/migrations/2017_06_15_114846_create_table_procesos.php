<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProcesos extends Migration
{
    private $nomTabla = 'PROCESOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'PROCESOS: contiene los procesos existentes por cada área (gerencia)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('PROC_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('PROC_DESCRIPCION', 300)
                ->comment('descripción del proceso Ej: admon de personal, selección y desarrollo');

            $table->string('PROC_OBSERVACIONES', 300)
                ->comment('observaciones del proceso')->nullable();
            
            //Traza
            $table->string('PROC_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('PROC_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('PROC_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('PROC_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('PROC_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('PROC_FECHAELIMINADO')->nullable()
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
        Schema::drop($this->nomTabla);
    }
}

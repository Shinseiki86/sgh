<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClasescontratos extends Migration
{

    private $nomTabla = 'CLASESCONTRATOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CLASES DE CONTRATOS: contiene las clases de contratos existentes de acuerdo a la ley vigente (fijo, indefinido, por obra o labor contratada)';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('CLCO_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla clases de contratos.');

            $table->string('CLCO_DESCRIPCION', 100)
                ->comment('descripción del la clase de contrato Ej: indefinido, fijo');

            $table->string('CLCO_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('CLCO_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CLCO_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CLCO_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CLCO_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CLCO_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CLCO_FECHAELIMINADO')->nullable()
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

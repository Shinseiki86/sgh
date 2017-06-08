<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMotivosretiros extends Migration
{
    
    private $nomTabla = 'MOTIVOSRETIROS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'MOTIVOS DE RETIRO: contiene los motivos de retiro existentes de acuerdo a la ley vigente';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('MORE_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla motivos de retiro.');

            $table->string('MORE_DESCRIPCION', 300)
                ->comment('descripcion del motivo de retiro');

            $table->string('MORE_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('MORE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('MORE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('MORE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('MORE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('MORE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('MORE_FECHAELIMINADO')->nullable()
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

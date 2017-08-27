<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatConratoEntidadTable extends Migration
{
    private $nomTabla = 'contrato_entidad';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Contiene Las entides de cada prospecto, por ejemplo EPS, ARL CCF';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create('contrato_entidad', function (Blueprint $table) {
            $table->unsignedInteger('CONT_ID')->index();
            $table->unsignedInteger('ENTI_ID')->index();
            $table->foreign('CONT_ID')->references('CONT_ID')->on('contratos')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('ENTI_ID')->references('ENTI_ID')->on('entidades')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['CONT_ID','ENTI_ID']);
            $table->timestamps();
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
        Schema::drop('contrato_entidad');
    }
}

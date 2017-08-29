<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoEntidadTable extends Migration
{
    private $nomTabla = 'CONTRATO_ENTIDAD';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'Contiene Las entides de cada prospecto, por ejemplo EPS, ARL CCF';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->unsignedInteger('CONTRATO_ID')->index();
            $table->unsignedInteger('ENTIDAD_ID')->index();
            $table->foreign('CONTRATO_ID')->references('CONT_ID')->on('CONTRATOS')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('ENTIDAD_ID')->references('ENTI_ID')->on('ENTIDADES')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['CONTRATO_ID','ENTIDAD_ID']);            

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

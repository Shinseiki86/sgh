<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategorias extends Migration
{
    private $nomTabla = 'CATEGORIAS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CATEGORIAS DE TICKETS: contiene las categorias disponibles para los tickets';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::create($this->nomTabla, function (Blueprint $table) {
            $table->increments('CATE_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla.');

            $table->string('CATE_DESCRIPCION', 100)
                ->comment('descripción de la categoria de ticket Ej: solicitud descargos, vacaciones');

            $table->string('CATE_COLOR', 100)
                ->comment('color de la categoria de ticket');

            $table->unsignedInteger('PROC_ID')
                ->comment('relacion a la tabla procesos');

            $table->string('CATE_OBSERVACIONES', 300)
                ->comment('observaciones de la categoria de ticket')->nullable();
            
            //Traza
            $table->string('CATE_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CATE_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CATE_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CATE_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CATE_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CATE_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relación con tabla EMPLEADORES
            $table->foreign('PROC_ID')
                ->references('PROC_ID')
                ->on('PROCESOS')
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
        echo '- Borrando tabla '.$this->nomTabla.'...' . PHP_EOL;
        Schema::drop($this->nomTabla);
    }
}

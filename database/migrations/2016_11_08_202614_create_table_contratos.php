<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratos extends Migration
{

    private $nomTabla = 'CONTRATOS';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $commentTabla = 'CONTRATOS: contiene la información de los contratos laborales que han tenido los colaboradores con las diferentes empresas';

        Schema::create($this->nomTabla, function (Blueprint $table) {

            $table->increments('CONT_ID')
                ->comment('Valor autonumérico, llave primaria de la tabla contratos.');

            $table->integer('PROS_ID')->unsigned()
                ->comment('referencia al prospecto que tiene el contrato con la empresa');

            $table->string('CONT_CASOMEDICO', 2)->nullable();

            $table->integer('CARG_ID')->unsigned()
                ->comment('referencia al cargo que tiene el colaborador en el contrato');

            $table->date('CONT_FECHAINGRESO')
                ->comment('fecha de inicio del contrato');

            $table->date('CONT_FECHARETIRO')
                ->nullable()
                ->comment('fecha de retiro del contrato');

            $table->integer('CONT_SALARIO')->unsigned()
                ->comment('asignacion salarial del colaborador en el contrato');

            $table->integer('CONT_VARIABLE')->unsigned()
                ->comment('promedio salarial variable del colaborador en el contrato');

            $table->integer('CONT_RODAJE')->unsigned()
                ->comment('rodaje del colaborador en el contrato');

            $table->integer('ESCO_ID')->unsigned()
                ->comment('estado de contrato del colaborador');

            $table->integer('MORE_ID')->nullable()->unsigned()
                ->comment('motivo de retiro del contrato');

            $table->integer('TICO_ID')->unsigned()
                ->comment('tipo de contrato del colaborador'); // temporal, directo

            $table->integer('CLCO_ID')->unsigned()
                ->comment('clase de contrato del colaborador (referencia a clase contratos)'); // termino fijo, indefinido

            $table->integer('EMPL_ID')->unsigned()
                ->comment('empleador del colaborador');

            $table->integer('TIEM_ID')->unsigned()
                ->comment('tipo de empleador del colaborador');

            $table->integer('CECO_ID')->unsigned()
                ->comment('centro de costos del contrato');

            $table->string('CONT_OBSERVACIONES', 300)
                ->comment('observaciones del tipo de contrato')->nullable();
            
            //Traza
            $table->string('CONT_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('CONT_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('CONT_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('CONT_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('CONT_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('CONT_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');


            //Relaciones

            $table->foreign('PROS_ID')
                ->references('PROS_ID')
                ->on('PROSPECTOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CARG_ID')
                ->references('CARG_ID')
                ->on('CARGOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ESCO_ID')
                ->references('ESCO_ID')
                ->on('ESTADOSCONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('MORE_ID')
                ->references('MORE_ID')
                ->on('MOTIVOSRETIROS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('TICO_ID')
                ->references('TICO_ID')
                ->on('TIPOSCONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CLCO_ID')
                ->references('CLCO_ID')
                ->on('CLASESCONTRATOS')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('EMPL_ID')
                ->references('EMPL_ID')
                ->on('EMPLEADORES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('TIEM_ID')
                ->references('TIEM_ID')
                ->on('TIPOSEMPLEADORES')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CECO_ID')
                ->references('CECO_ID')
                ->on('CENTROSCOSTOS')
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

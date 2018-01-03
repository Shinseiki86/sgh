<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProrrogaAusentismosTable extends Migration
{
	private $nomTabla = 'PRORROGAAUSENTISMOS';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene las prorrogas de Ausentismo';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('PRORROGAAUSENTISMOS', function(Blueprint $table)
		{
			
			$table->increments('PROR_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->integer('AUSE_ID')->unsignedInteger('AUSE_ID')->foreign('AUSE_ID')->references('AUSE_ID')->on('AUSENTISMOS')->onDelete('cascade')->onUpdate('cascade')->comment('Id del Ausentismo');
			$table->integer('DIAG_ID')->unsignedInteger('DIAG_ID')->foreign('DIAG_ID')->references('DIAG_ID')->on('DIAGNOSTICOS')->onDelete('cascade')->onUpdate('cascade')->nullable()->comment('Id del Dianostico');
			$table->integer('COAU_ID')->unsignedInteger('COAU_ID')->foreign('COAU_ID')->references('COAU_ID')->on('CONCEPTOAUSENCIAS')->onDelete('cascade')->onUpdate('cascade')->comment('Ide del Consecpto Ausentismo');
			$table->datetime('PROR_FECHAINICIO')->comment('Fecha de Inicio de la Prorroga');
			$table->datetime('PROR_FECHAFINAL')->comment('Fecha Final de la Prorroga');
			$table->integer('PROR_DIAS')->unsigned();
			$table->string('PROR_OBSERVACIONES')->nullable()->comment('Observaciones de la Prorroga');
			$table->enum('PROR_PERIODO', ['ENERO', 'FEBRERO','MARZO', 'ABRIL','MAYO', 'JUNIO','JULIO', 'AGOSTO','SEPTIEMBRE', 'OCTUBRE','NOVIEMBRE', 'DICIEMBRE'])->nullable()->comment('Indica el periodo en el que se causa la prorroga de  Ausentismo');


			//Traza
            $table->string('PROR_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('PROR_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('PROR_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('PROR_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('PROR_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('PROR_FECHAELIMINADO')->nullable()
                ->comment('Fecha en que se eliminó el registro en la tabla.');

            //Relaciones

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
		Schema::drop('PRORROGAAUSENTISMOS');
	}

}

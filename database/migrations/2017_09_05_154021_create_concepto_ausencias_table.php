<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptoAusenciasTable extends Migration
{
	private $nomTabla = 'CONCEPTOAUSENCIAS';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'comentario';

		echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('CONCEPTOAUSENCIAS', function(Blueprint $table)
		{
			
			$table->increments('COAU_ID')->comment('Valor autonumérico, llave primaria de la tabla.');

			$table->string('COAU_CODIGO')->comment('Codigo del concepto de la Ausencia');

			$table->string('COAU_DESCRIPCION')->comment('Descripcion del Concepto de la Ausencia');

			$table->string('COAU_OBSERVACIONES')->nullable()->comment('Observaciones Relacionadas con el Concepto de la Ausencia');

			$table->integer('TIAU_ID')->unsignedInteger('TIAU_ID')->foreign('TIAU_ID')->references('TIAU_ID')->on('TIPOAUSENTISMOS')->onDelete('cascade')->onUpdate('cascade')->comment('Id del Tipo de Ausentismo');
			
			$table->integer('TIEN_ID')->unsignedInteger('TIEN_ID')->foreign('TIEN_ID')->references('TIEN_ID')->on('TIPOENTIDADES')->onDelete('cascade')->onUpdate('cascade')->comment('Id del Tipo de Entidad');

			$table->enum('COAU_REMUNERADO', ['SI', 'NO'])->nullable()->comment('Indica si el Concepto de Ausencia es remunerado o no');


			//Traza
			$table->string('COAU_CREADOPOR')
			->comment('Usuario que creó el registro en la tabla');
			$table->timestamp('COAU_FECHACREADO')
			->comment('Fecha en que se creó el registro en la tabla.');
			$table->string('COAU_MODIFICADOPOR')->nullable()
			->comment('Usuario que realizó la última modificación del registro en la tabla.');
			$table->timestamp('COAU_FECHAMODIFICADO')->nullable()
			->comment('Fecha de la última modificación del registro en la tabla.');
			$table->string('COAU_ELIMINADOPOR')->nullable()
			->comment('Usuario que eliminó el registro en la tabla.');
			$table->timestamp('COAU_FECHAELIMINADO')->nullable()
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
		Schema::drop('CONCEPTOAUSENCIAS');
	}

}

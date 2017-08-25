<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEntidadsTable extends Migration
{
	private $nomTabla = 'tipoEntidades';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$commentTabla = 'Contiene la clasificación de tipos de entidades existentes como ejemplo: cajas de compensación, EPS, ARL, fondos de pensiones etc';

        echo '- Creando tabla '.$this->nomTabla.'...' . PHP_EOL;
		Schema::create('tipoEntidades', function(Blueprint $table)
		{
			
			$table->increments('TIEN_ID')->comment('Valor autonumérico, llave primaria de la tabla.');
			$table->string('TIEN_CODIGO')->unique()->comment('Codigo del tipo de Entidad');
			$table->string('TIEN_DESCRIPCION')->unique()->comment('Descripcion del tipo de Entidad');
			$table->string('TIEN_OBSERVACIONES')->comment('Observaciones correspondientes al tipo de entidad')->nullable();


			//Traza
            $table->string('TIEN_CREADOPOR')
                ->comment('Usuario que creó el registro en la tabla');
            $table->timestamp('TIEN_FECHACREADO')
                ->comment('Fecha en que se creó el registro en la tabla.');
            $table->string('TIEN_MODIFICADOPOR')->nullable()
                ->comment('Usuario que realizó la última modificación del registro en la tabla.');
            $table->timestamp('TIEN_FECHAMODIFICADO')->nullable()
                ->comment('Fecha de la última modificación del registro en la tabla.');
            $table->string('TIEN_ELIMINADOPOR')->nullable()
                ->comment('Usuario que eliminó el registro en la tabla.');
            $table->timestamp('TIEN_FECHAELIMINADO')->nullable()
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
		Schema::drop('tipoEntidades');
	}

}

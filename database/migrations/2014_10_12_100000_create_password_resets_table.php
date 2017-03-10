<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$nomTabla = 'password_resets';
		$commentTabla = 'Tabla creada por Laravel para almacenar los token generados al solicitar cambio de contraseña. No se debe cambiar el nombre ni eliminar. Mas información: https://laravel.com/docs/5.2/authentication';

		Schema::create($nomTabla, function (Blueprint $table) {
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});

		if(env('DB_CONNECTION') == 'pgsql')
			DB::statement("COMMENT ON TABLE ".env('DB_SCHEMA').".\"".$nomTabla."\" IS '".$commentTabla."'");
		elseif(env('DB_CONNECTION') == 'mysql')
			DB::statement("ALTER TABLE ".$nomTabla." COMMENT = '".$commentTabla."'");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('password_resets');
	}
}

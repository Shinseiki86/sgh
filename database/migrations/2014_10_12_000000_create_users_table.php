<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$nomTabla = 'USERS';
		$commentTabla = 'Tabla de usuarios para ingresar al aplicativo.';

		Schema::create($nomTabla, function (Blueprint $table) {
			$table->increments('USER_id')
				->comment('Valor autonumérico, llave primaria de la tabla USERS.');
			$table->string('name')
				->comment('Nombre completo del usuario.');
			$table->string('username')->unique()
				->comment('Cuenta del usuario, con la cual realizará la autenticación. Valor único en la tabla');
			$table->string('email')->unique()
				->comment('Correo electrónico del usuario. Necesario para enviar enlace de restauración de contraseña.');
			$table->string('password')
				->comment('Contraseña del usuario cifrada.');
			$table->unsignedInteger('ROLE_id')
				->comment('Campo foráneo de la tabla ROLES.');
			$table->rememberToken()
				->comment('Almacena un token para autenticar el usuario automáticamente si se activó el check \"Recordarme\" al iniciar sesión. Mas información: https://laravel.com/docs/5.2/authentication#remembering-users');

			//Traza
			$table->string('USER_creadopor')
				->comment('Usuario que creó el registro en la tabla');
			$table->timestamp('USER_fechacreado')
				->comment('Fecha en que se creó el registro en la tabla.');
			$table->string('USER_modificadopor')->nullable()
				->comment('Usuario que realizó la última modificación del registro en la tabla.');
			$table->timestamp('USER_fechamodificado')->nullable()
				->comment('Fecha de la última modificación del registro en la tabla.');
			$table->string('USER_eliminadopor')->nullable()
				->comment('Usuario que eliminó el registro en la tabla.');
			$table->timestamp('USER_fechaeliminado')->nullable()
				->comment('Fecha en que se eliminó el registro en la tabla.');

			//Relaciones
			$table->foreign('ROLE_id')
				->references('ROLE_id')
				->on('ROLES')
				->onDelete('cascade')
				->onUpdate('cascade');
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
		Schema::drop('USERS');
	}
}

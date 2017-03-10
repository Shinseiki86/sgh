<?php
	
use Illuminate\Database\Seeder;

	class UsersTableSeeder extends Seeder {

		public function run() {

            $pass = '123456';
            //$faker = Faker\Factory::create('es_ES');

            $this->command->info('--- Creación de Usuarios prueba');
            //Admin
            \DB::table('USERS')->insert( array(
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password'  => \Hash::make($pass),
                'ROLE_id' => SGH\Rol::where('ROLE_rol','admin')->get()->first()->ROLE_id,
                'USER_creadopor' => 'SYSTEM',
                'USER_fechacreado' => \Carbon\Carbon::now()->toDateTimeString(),
            ));

            //Editores
            \DB::table('USERS')->insert( array(
                'name' => 'Editor 1 de prueba',
                'username' => 'editor1',
                'email' => 'editor1@example.com',
                'password'  => \Hash::make($pass),
                'ROLE_id' => SGH\Rol::where('ROLE_rol','editor')->get()->first()->ROLE_id,
                'USER_creadopor' => 'admin',
                'USER_fechacreado' => \Carbon\Carbon::now()->toDateTimeString(),
            ));
            \DB::table('USERS')->insert( array(
                'name' => 'Editor 2 de prueba',
                'username' => 'editor2',
                'email' => 'editor2@example.com',
                'password'  => \Hash::make($pass),
                'ROLE_id' => SGH\Rol::where('ROLE_rol','editor')->get()->first()->ROLE_id,
                'USER_creadopor' => 'admin',
                'USER_fechacreado' => \Carbon\Carbon::now()->toDateTimeString(),
            ));


            //5 usuarios faker
            //$USERS = factory(SGH\User::class)->times(5)->create();

            $this->command->info('--- Fin Creación de Usuarios prueba');
		}


	}
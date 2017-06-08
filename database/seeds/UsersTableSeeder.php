<?php
	
use Illuminate\Database\Seeder;
use SGH\User;
use SGH\Role;
use SGH\Permission;

	class UsersTableSeeder extends Seeder {

		public function run() {

            $pass = '123';
            $date = \Carbon\Carbon::now()->toDateTimeString();
            //$faker = Faker\Factory::create('es_ES');

            $this->command->info('--- Seeder Creación de Roles');

                $rolOwner = new Role();
                $rolOwner->name         = 'owner';
                $rolOwner->display_name = 'Project Owner'; // optional
                $rolOwner->description  = 'User is the owner of a given project'; // optional
                $rolOwner->save();

                $rolAdmin = new Role();
                $rolAdmin->name         = 'admin';
                $rolAdmin->display_name = 'Administrador'; // optional
                $rolAdmin->description  = 'User is allowed to manage and edit other users'; // optional
                $rolAdmin->save();

                $rolEditor = new Role();
                $rolEditor->name         = 'editor';
                $rolEditor->display_name = 'Editor'; // optional
                $rolEditor->description  = 'Usuario con permisos para editar contenido.'; // optional
                $rolEditor->save();

            $this->command->info('--- Seeder Creación de Permisos');

                $crearUsuario = new Permission();
                $crearUsuario->name         = 'crear-usuario';
                $crearUsuario->display_name = 'Crear usuarios'; // optional
                $crearUsuario->description  = 'Crear nuevos usuarios en el sistema.'; // optional
                $crearUsuario->save();

                $editarUsuario = new Permission();
                $editarUsuario->name         = 'editar-usuario';
                $editarUsuario->display_name = 'Editar usuarios'; // optional
                $editarUsuario->description  = 'Editar usuarios existentes en el sistema.'; // optional
                $editarUsuario->save();

                $rolAdmin->attachPermissions([$crearUsuario, $editarUsuario]);
                // equivalent to $rolAdmin->perms()->sync( [$crearUsuario->id, $editarUsuario->id] );


            $this->command->info('--- Seeder Creación de Usuarios prueba');

                //Admin
                $admin = User::create( [
                    'name' => 'Administrador',
                    'username' => 'admin',
                    'email' => 'admin@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                // role attach alias
                $admin->attachRole($rolAdmin); // parameter can be an Role object, array, or id
                // or eloquent's original technique
                //$admin->roles()->attach($rolAdmin->id); // id only

                //Owner
                $owner = User::create( [
                    'name' => 'Owner',
                    'username' => 'owner',
                    'email' => 'diegoarmandocortes@outlook.com',
                    'password'  => \Hash::make('Side102')
                ]);
                // role attach alias
                $owner->attachRole($rolOwner);


                //Editores
                $editor1 = User::create( [
                    'name' => 'Editor 1 de prueba',
                    'username' => 'editor1',
                    'email' => 'editor1@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $editor1->attachRole($admin);

                $editor2 = User::create( [
                    'name' => 'Editor 2 de prueba',
                    'username' => 'editor2',
                    'email' => 'editor2@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $editor2->attachRole($admin);

                //5 usuarios faker
                //$USERS = factory(SGH\User::class)->times(5)->create();

		}

	}
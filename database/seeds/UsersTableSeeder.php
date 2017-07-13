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

                $rolOwner = Role::create([
                    'name'         => 'owner',
                    'display_name' => 'Project Owner',
                    'description'  => 'User is the owner of a given project',
                ]);
                $rolAdmin = Role::create([
                    'name'         => 'admin',
                    'display_name' => 'Administrador',
                    'description'  => 'User is allowed to manage and edit other users',
                ]);
                $rolSuperOper = Role::create([
                    'name'         => 'superoper',
                    'display_name' => 'Supervisor Operaciones',
                    //'description'  => 'Comentario',
                ]);
                $rolCoorOper = Role::create([
                    'name'         => 'cooroper',
                    'display_name' => 'Coordinador Operaciones',
                    //'description'  => 'Comentario',
                ]);
                $rolGestHum = Role::create([
                    'name'         => 'gesthum',
                    'display_name' => 'Gestión Humana',
                    //'description'  => 'Comentario',
                ]);
                

            $this->command->info('--- Seeder Creación de Permisos');

                $create = Permission::create([
                    'name'         => 'usuario-create',
                    'display_name' => 'Crear usuarios',
                    'description'  => 'Crear nuevos usuarios en el sistema',
                ]);
                $edit = Permission::create([
                    'name'         => 'usuario-edit',
                    'display_name' => 'Editar usuarios',
                    'description'  => 'Editar usuarios existentes en el sistema',
                ]);
                $index = Permission::create([
                    'name'         => 'usuario-index',
                    'display_name' => 'Listar usuarios',
                    'description'  => 'Listar usuarios existentes en el sistema',
                ]);
                $delete = Permission::create([
                    'name'         => 'usuario-delete',
                    'display_name' => 'Borrar usuarios',
                    'description'  => 'Borrar usuarios existentes en el sistema',
                ]);
                $rolAdmin->attachPermissions([$create, $edit, $index, $delete]);
                // equivalent to $rolAdmin->perms()->sync( [$crearUsuario->id, $editarUsuario->id] );
                $create = $edit = $index = $delete = null;

                $create = Permission::create([
                    'name'         => 'cargo-create',
                    'display_name' => 'Crear cargos',
                    'description'  => 'Crear nuevos cargos',
                ]);
                $editUser = Permission::create([
                    'name'         => 'cargo-edit',
                    'display_name' => 'Editar cargos',
                    'description'  => 'Editar cargos existentes',
                ]);
                $indexUser = Permission::create([
                    'name'         => 'cargo-index',
                    'display_name' => 'Listar cargos',
                    'description'  => 'Listar cargos existentes',
                ]);
                $delUser = Permission::create([
                    'name'         => 'cargo-delete',
                    'display_name' => 'Borrar cargos',
                    'description'  => 'Borrar cargos existentes',
                ]);
                $rolGestHum->attachPermissions([$create, $edit, $index]);
                $rolAdmin->attachPermissions([$create, $edit, $index, $delete]);
                $create = $edit = $index = $delete = null;

                $create = Permission::create([
                    'name'         => 'clasocup-create',
                    'display_name' => 'Crear clasificaciones de ocupación',
                    'description'  => 'Crear nuevas clasificaciones de ocupación',
                ]);
                $editUser = Permission::create([
                    'name'         => 'clasocup-edit',
                    'display_name' => 'Editar clasificaciones de ocupación',
                    'description'  => 'Editar clasificaciones de ocupación existentes',
                ]);
                $indexUser = Permission::create([
                    'name'         => 'clasocup-index',
                    'display_name' => 'Listar clasificaciones de ocupación',
                    'description'  => 'Listar clasificaciones de ocupación existentes',
                ]);
                $delUser = Permission::create([
                    'name'         => 'clasocup-delete',
                    'display_name' => 'Borrar clasificaciones de ocupación',
                    'description'  => 'Borrar clasificaciones de ocupación existentes',
                ]);
                $rolGestHum->attachPermissions([$create, $edit, $index]);
                $rolAdmin->attachPermissions([$create, $edit, $index, $delete]);
                $create = $edit = $index = $delete = null;



                //Contratos
                $create = Permission::create([
                    'name'         => 'contrato-create',
                    'display_name' => 'Crear contratos',
                    'description'  => 'Crear nuevos contratos',
                ]);
                $editUser = Permission::create([
                    'name'         => 'contrato-edit',
                    'display_name' => 'Editar contratos',
                    'description'  => 'Editar contratos existentes',
                ]);
                $indexUser = Permission::create([
                    'name'         => 'contrato-index',
                    'display_name' => 'Listar contratos',
                    'description'  => 'Listar contratos existentes',
                ]);
                $delUser = Permission::create([
                    'name'         => 'contrato-delete',
                    'display_name' => 'Borrar contratos',
                    'description'  => 'Borrar contratos existentes',
                ]);
                $rolGestHum->attachPermissions([$create, $edit, $index]);
                $rolAdmin->attachPermissions([$create, $edit, $index, $delete]);
                $create = $edit = $index = $delete = null;


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
                $owner->attachRole($rolOwner);

                //Owner
                $owner = User::create( [
                    'name' => 'Owner1',
                    'username' => 'owner1',
                    'email' => 'rodriguez221293@outlook.com',
                    'password'  => \Hash::make($pass)
                ]);
                $owner->attachRole($rolOwner);

                //Editores
                $gesthum1 = User::create( [
                    'name' => 'Gestión humana 1 de prueba',
                    'username' => 'gesthum1',
                    'email' => 'gesthum1@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $gesthum1->attachRole($rolGestHum);

                $gesthum2 = User::create( [
                    'name' => 'Gestión humana 2 de prueba',
                    'username' => 'gesthum2',
                    'email' => 'gesthum2@example.com',
                    'password'  => \Hash::make($pass)
                ]);
                $gesthum2->attachRole($rolGestHum);

                //5 usuarios faker
                //$USERS = factory(SGH\User::class)->times(5)->create();

		}

	}
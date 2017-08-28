<?php

use Illuminate\Database\Seeder;
use SGH\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $m1 = Menu::create([
            'MENU_LABEL' => 'Usuarios y roles',
            'MENU_ICON' => 'user-circle-o',
            'MENU_ORDER' => 0,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Usuarios',
            'MENU_URL' => 'auth/usuarios',
            'MENU_ICON' => 'user',
            'MENU_PARENT' => $m1->MENU_ID,
            'MENU_ORDER' => 0,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Roles',
            'MENU_URL' => 'auth/roles',
            'MENU_ICON' => 'male',
            'MENU_PARENT' => $m1->MENU_ID,
            'MENU_ORDER' => 1,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Permisos',
            'MENU_URL' => 'auth/permisos',
            'MENU_ICON' => 'address-card-o',
            'MENU_PARENT' => $m1->MENU_ID,
            'MENU_ORDER' => 2,
        ]);

        $m2 = Menu::create([
            'MENU_LABEL' => 'Geográficos',
            'MENU_ICON' => 'globe',
            'MENU_ORDER' => 1,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Países',
            'MENU_URL' => 'cnfg-geograficos/paises',
            'MENU_ICON' => 'circle',
            'MENU_PARENT' => $m2->MENU_ID,
            'MENU_ORDER' => 0,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Departamentos',
            'MENU_URL' => 'cnfg-geograficos/departamentos',
            'MENU_ICON' => 'circle',
            'MENU_PARENT' => $m2->MENU_ID,
            'MENU_ORDER' => 1,
        ]);
        Menu::create([
            'MENU_LABEL' => 'Ciudades',
            'MENU_URL' => 'cnfg-geograficos/ciudades',
            'MENU_ICON' => 'circle-o',
            'MENU_PARENT' => $m2->MENU_ID,
            'MENU_ORDER' => 2,
        ]);
    }
}

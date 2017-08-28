<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Menu extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = 'MENUS';
    protected $primaryKey =  'MENU_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'MENU_FECHACREADO';
    const UPDATED_AT = 'MENU_FECHAMODIFICADO';
    const DELETED_AT = 'MENU_FECHAELIMINADO';
    protected $dates = ['MENU_FECHACREADO','MENU_FECHAMODIFICADO','MENU_FECHAELIMINADO'];

    public $fillable = [
        'MENU_LABEL',
		'MENU_URL',
        'MENU_ICON',
        'MENU_PARENT',
        'MENU_ORDER',
		'MENU_ENABLED',
    ];

    public static $rules = [
        'MENU_LABEL'  => ['required', 'max:20', ],//'unique:MENUS,MENU_LABEL,'.$this->getKey().',MENU_ID'],
        'MENU_URL'    => ['max:300', ],//'unique:MENUS,MENU_URL,'.$this->getKey().',MENU_ID'],
        'MENU_ICON'   => ['string', 'max:300'],
        'MENU_PARENT' => 'numeric',
        'MENU_ORDER'  => ['required', 'numeric'],
		'MENU_ENABLED'=> 'bolean',
    ];

    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['MENU_ID'] == $line1['MENU_PARENT']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }

    public function optionsMenu()
    {
        return $this->where('MENU_ENABLED', 1)
            ->orderby('MENU_PARENT')
            ->orderby('MENU_ORDER')
            ->orderby('MENU_LABEL')
            ->get()
            ->toArray();
    }

    public static function menus()
    {
        $menus = new Menu();
        $data = $menus->optionsMenu();

        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
}

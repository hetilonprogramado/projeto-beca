<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public static function getMenus()
    {
        return Menu::where('status_id', 1) // só ativos
            ->orderBy('tipo')
            ->orderBy('id')
            ->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class FavoriteController extends Controller
{
    public function toggle(Menu $menu)
    {
        $user = auth()->user();

        if ($user->favoriteMenus()->where('menu_id', $menu->id)->exists()) {
            $user->favoriteMenus()->detach($menu->id);
            return response()->json(['status' => 'removed']);
        } else {
            $user->favoriteMenus()->attach($menu->id);
            return response()->json(['status' => 'added']);
        }
    }
}

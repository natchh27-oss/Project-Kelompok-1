<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Comment;


class MenuController extends Controller
{

     public function index(Request $request)
    {
        $search       = $request->search;
        $categoryName = $request->category;

        $menus = Menu::when($search, fn($q) => $q->where('name','like',"%$search%"))
                    ->when($categoryName, function($q) use ($categoryName) {
                        $category = Category::where('name', $categoryName)->first();
                        if ($category) {
                            $q->where('category_id', $category->id);
                        }
                    })
                    ->paginate(8);

        $categories = Category::all();

        return view('pages.menu', compact('menus','categories','search','categoryName'));
    }

    public function show($name)
    {
        $decodedName = urldecode($name);

        $menu = Menu::where('name', $decodedName)->firstOrFail();

        $comments = Comment::withCount('likes')
        ->with(['user', 'replies.user'])
        ->where('menu_id', $menu->id)
        ->whereNull('parent_id')
        ->latest()
        ->get();

        return view('pages.menu-show', compact('menu', 'comments '));
    }

}

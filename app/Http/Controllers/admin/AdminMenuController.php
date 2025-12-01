<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Menu;
use App\Models\Category;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/menu'), $imageName);
        }

        Menu::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'is_signature' => $request->is_signature ? 1 : 0
        ]);

        return redirect()->route('admin.menus.index')->with('success','Menu added');
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $menu->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/menu'), $imageName);
            $menu->image = $imageName;
        }

        $menu->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'is_signature' => $request->is_signature ? 1 : 0
        ]);

        return redirect()->route('admin.menus.index')->with('success', 'Menu updated!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Menu deleted!');
    }
}

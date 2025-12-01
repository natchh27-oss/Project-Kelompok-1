<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('photo')) {

            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $path = $request->file('photo')->store('profile', 'public');
        $user->profile_photo = $path;

        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function toggleFavorite(Menu $menu)
    {
        $user = auth()->user();

        if ($user->favoriteMenus()->where('menu_id', $menu->id)->exists()) {
            $user->favoriteMenus()->detach($menu->id);
            $message = 'Menu dihapus dari favorit';
        } else {
            $user->favoriteMenus()->attach($menu->id);
            $message = 'Menu ditambahkan ke favorit';
        }

        return back()->with('success', $message);
    }
}

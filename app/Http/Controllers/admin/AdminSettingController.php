<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSettingController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.settings.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        $user->name  = $request->name;
        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Profile berhasil diperbarui.');
    }

    public function password()
    {
        return view('admin.settings.password');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}

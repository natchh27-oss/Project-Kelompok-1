<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string',
        ]);

        Contact::create($data);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}

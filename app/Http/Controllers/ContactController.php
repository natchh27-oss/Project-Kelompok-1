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

        $whatsappNumber = '6283813667269';

        $text = "Halo Ploutos Coffee!%0A"
              . "Nama: " . urlencode($data['name']) . "%0A"
              . "Email: " . urlencode($data['email']) . "%0A"
              . "No. Telepon: " . urlencode($data['phone']) . "%0A"
              . "Pesan: " . urlencode($data['message']);

        $url = "https://wa.me/{$whatsappNumber}?text={$text}";

        return redirect()->away($url);
    }
}

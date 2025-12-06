<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        return view('pages.reservasi');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required',
        'people' => 'required|integer|min:1',
        'table_location' => 'required|in:Indoor,Outdoor',
        'notes' => 'nullable|string',
    ]);

    $reservation = Reservation::create($data);

    $telp = '62838136456';

    $message = "Halo, saya ingin melakukan reservasi di Ploutos Coffee.%0A%0A" .
        "Nama: {$data['name']}%0A" .
        "Nomor Telepon: {$data['phone']}%0A" .
        "Tanggal: {$data['date']}%0A" .
        "Jam: {$data['time']}%0A" .
        "Jumlah Orang: {$data['people']}%0A" .
        "Lokasi Meja: {$data['table_location']}%0A" .
        "Catatan: " . ($data['notes'] ?? "-") . "%0A%0A" .
        "Terima kasih.";

    return redirect()->away("https://wa.me/{$telp}?text={$message}");

    }
}

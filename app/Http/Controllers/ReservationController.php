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

        // Optional: kirim email ke admin
        // \Mail::to('admin@ploutos.com')->send(new ReservationReceived($reservation));

        return redirect()->back()->with('success', 'Reservasi berhasil dikirim! Admin akan menghubungi Anda.');
    }

}

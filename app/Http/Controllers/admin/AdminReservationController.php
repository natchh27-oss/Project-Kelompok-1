<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Reservation;

class AdminReservationController extends Controller
{
      public function index()
    {
        $reservations = Reservation::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->back()->with('success', 'Status reservasi berhasil diupdate.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation_WarongWarem;

class DisplayReservation extends Controller
{
    public function showData(Request $request)
    {
        // Pastikan user terautentikasi
        if (Auth::check()) {
            // Dapatkan data reservation dari tabel reservation
            $reservations = Reservation::all();

            // Mengembalikan data dalam format JSON
            return response()->json(['message' => 'Data Reservation', 'reservations' => $reservations]);
        }

        // Jika user tidak terautentikasi, kembalikan response Unauthorized
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}

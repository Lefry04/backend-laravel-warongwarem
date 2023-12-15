<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation_WarongWarem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservationWarongWaremController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'time' => 'required|date',
            'number_of_guests' => 'required|integer',
            'table_type' => 'required|in:indoor,outdoor,restaurant',
            'special_requests' => 'nullable|string',
            'phone_number' => 'required|string',
            'name' => 'required|string',
            'id_user' => 'required|exists:users,id',
            'status' => 'in:active,inactive,waiting',
        ]);


        \Log::info('Data yang Dikirim:', $request->all());

        // Simpan reservasi ke database
        $reservation = Reservation_WarongWarem::create($request->all());

        \Log::info('Data yang Disimpan:', $reservation->toArray());

        return response()->json($reservation, 201);
    }

    public function getData(Request $request)
    {
        // Validasi request jika diperlukan
        // ...

        // Dapatkan data reservasi
        $reservations = Reservation_WarongWarem::all();

        // Mengembalikan data dalam format JSON
        return response()->json(['message' => 'Data Reservasi', 'reservations' => $reservations]);
    }

    public function reserve(Request $request)
    {
        $ids = $request->input('ids');

        // Validasi data input jika diperlukan

        // Perbarui status menjadi "Active"
        Reservation_WarongWarem::whereIn('id_reservation', $ids)
            ->where('status', 'Waiting')
            ->update(['status' => 'Active']);

        return response()->json(['message' => 'Reserve successful']);
    }

    public function reject(Request $request)
    {
        $ids = $request->input('ids');

        // Validasi data input jika diperlukan

        // Perbarui status menjadi "Inactive"
        Reservation_WarongWarem::whereIn('id_reservation', $ids)
            ->where('status', 'Waiting')
            ->update(['status' => 'Inactive']);

        return response()->json(['message' => 'Reject successful']);
    }

    public function changeReservationTime(Request $request)
{
    $id = $request->input('id');
    $newTime = $request->input('new_time');

    // Validasi data input jika diperlukan
    $request->validate([
        'id' => 'required|exists:reservations_warongwarem,id_reservation',
        'new_time' => 'required|date',
    ]);

    try {
        // Perbarui waktu reservasi
        Reservation_WarongWarem::where('id_reservation', $id)
            ->where('status', 'Waiting') // Hanya ubah waktu jika status masih "Waiting"
            ->update(['time' => $newTime]);

        return response()->json(['message' => 'Reservation time changed successfully']);
    } catch (\Exception $e) {
        \Log::error('Error changing reservation time:', ['message' => $e->getMessage()]);
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Reservation_WarongWarem;
// use Illuminate\Support\Facades\Auth;

// class ReservationWarongWaremController extends Controller
// {

//     public function __construct()
//     {
//         $this->middleware('auth:sanctum');
//     }

//     public function store(Request $request)
//     {
//         try {
//             // Pastikan pengguna telah diotentikasi
//             if (Auth::check()) {
//                 // Mendapatkan user yang sedang login
//                 $user = Auth::user();

//                 // Memasukkan id_user ke dalam request
//                 $request->merge(['id_user' => $user->id]);

//                 // Validasi request
//                 $request->validate([
//                     'time' => 'required|date',
//                     'number_of_guests' => 'required|integer',
//                     'table_type' => 'required|in:indoor,outdoor,restaurant',
//                     'special_requests' => 'nullable|string',
//                     'phone_number' => 'required|string',
//                     'name' => 'required|string',
//                     'status' => 'in:active,inactive,waiting',
//                 ]);

//                 \Log::info('Data yang Dikirim:', $request->all());

//                 // Simpan reservasi ke database
//                 $reservation = Reservation_WarongWarem::create($request->all());

//                 \Log::info('Data yang Disimpan:', $reservation->toArray());

//                 return response()->json($reservation, 201);
//             } else {
//                 // Handle kasus ketika pengguna tidak diotentikasi
//                 return response()->json(['error' => 'Unauthorized'], 401);
//             }
//         } catch (\Exception $e) {
//             \Log::error('Error creating reservation:', ['message' => $e->getMessage()]);
//             return response()->json(['error' => 'Internal Server Error'], 500);
//         }
//     }
// }
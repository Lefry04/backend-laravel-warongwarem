<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    //
    public function index()
{
    $reservations = Reservation::all();

    return view('welcome', compact('reservations'));
}


    public function create(Request $request)
    {
        try {
            // membuat reservasi
            $reservation = Reservation::create([
                'customer_name' => $request->input('customer_name'),
                'date' => $request->input('date'),
                'time' => $request->input('time'),
            ]);

            return response()->json(['reservation' => $reservation], 201);
        } catch (\Exception $e) {
            \Log::error('Error creating reservation: ' . $e->getMessage());

            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            // Atur validasi
            'customer_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            // ...
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    } catch (\Exception $e) {
        \Log::error('Error creating reservation: ' . $e->getMessage());

        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}


    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            // Atur validasi
            'customer_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            // ...
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation_WarongWarem extends Model
{
    protected $table = 'reservations_warongwarem';
    protected $primaryKey = 'id_reservation';
    protected $fillable = [
        'time',
        'number_of_guests',
        'table_type',
        'special_requests',
        'phone_number',
        'name',
        'id_user',
        'status',
    ];

    // Define relasi dengan model User jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

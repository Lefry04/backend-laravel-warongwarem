<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationWarongwarem extends Model
{
    use HasFactory;

    protected $table = 'reservations_warongwarem';

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

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

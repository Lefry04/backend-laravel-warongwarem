<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'date',
        'time',
        // tambahkan kolom lainnya sesuai kebutuhan
    ];

    protected $table = 'reservations';

    protected $attributes = [
        'party_size' => 0,
    ];
}
